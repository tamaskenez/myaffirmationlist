<?php 

session_start();

if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once('libraries/password_compatibility_library.php');
}

require_once('config/config.php');
require_once('libraries/PHPMailer.php');
?>


<!DOCTYPE html>
<html>
<head>
<title>Registration - My Affirmation List</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  
.error_messages{
    color:red;
    font-size: 175%;
}

.messages{
    position:absolute;
    top:45%;
    left: 2%;
    color:red;
    font-size: 125%;
    font-weight: bold;
}
img {
    max-width:100%;
    margin:0px;
    height:auto;
    display:block;
    z-index:-1;
}
body,html{
margin:0px;
}
</style>
</head>
<body>
<?php
//declarations and constants
	$user_name = $user_email = $user_password_new = $user_password_repeat= "";
	$errors=array();
  $messages=array();
  $registration_successful=false;
  $verification_successful = false;


//if verification link in the mail is clicked
if (isset($_GET["id"]) && isset($_GET["verification_code"])) {
            if (dbConnection()) {
            // try to update user with specified information
            $query_update_user = $db_connection->prepare('UPDATE users SET user_active = 1, user_activation_hash = NULL WHERE user_id = :user_id AND user_activation_hash = :user_activation_hash');
            $query_update_user->bindValue(':user_id', intval(trim($_GET["id"])), PDO::PARAM_INT);
            $query_update_user->bindValue(':user_activation_hash', $_GET["verification_code"], PDO::PARAM_STR);
            $query_update_user->execute();

            //checks if it finds this data in the db and gives back the relevant message
            if ($query_update_user->rowCount() > 0) {
                $verification_successful = true;
                echo "<p class='error_messages'>Your registration was successful!<br/>Now you can log in.</p>";
                include ("views/not_logged_in.php");
            } else {
                echo "<p class='error_messages'>Your registration was not successful!<br/>Please try it again!</p>";
                include("views/registration.php");
            }
        }

	}
else {
	/*data validation*/
	//átalakítjuk a $_POST-olt értékeket, hogy védekezzünk az injection ellen
	 $user_name = test_input($_POST["user_name"]);
  	$user_email = test_input($_POST["user_email"]);
  	$user_password_new = test_input($_POST["user_password_new"]);
  	$user_password_repeat = test_input($_POST["user_password_repeat"]);
  	$captcha = test_input($_POST["captcha"]);

//validation of the input values
	if(empty($user_name) || strlen($user_name)<2 || strlen($user_name)>64 || !preg_match('/^[a-z\d]{2,64}$/i', $user_name)){
		$errors[]="<span class='error_message'>Invalid user name!<br /></span>";
	}
	if(empty($user_email) || !filter_var($user_email, FILTER_VALIDATE_EMAIL) || strlen($user_email) > 64){
		$errors[]= "<span class='error_message'>Invalid email address!<br /></span>";
	}
	if(empty($user_password_new) || empty($user_password_repeat) || strlen($user_password_new)<6){
		$errors[]= "<span class='error_message'>Invalid password!<br /></span>";
	}
	if($user_password_new !== $user_password_repeat){
		$errors[]= "<span class='error_message'>Password repeat doesn't match!<br /></span>";
	}
	if (empty($captcha) || strtolower($captcha) != strtolower($_SESSION['captcha'])) {
            $errors[] = "<span class='error_message'>The verification code (captcha) was wrong!<br /></span>";
        }
  if(dbConnection()){			
            $query_check_user_name = $db_connection->prepare('SELECT user_name, user_email FROM users WHERE user_name=:user_name OR user_email=:user_email');
            $query_check_user_name->bindValue(':user_name', $user_name, PDO::PARAM_STR);
            $query_check_user_name->bindValue(':user_email', $user_email, PDO::PARAM_STR);
            $query_check_user_name->execute();
            $result = $query_check_user_name->fetchAll();

                if (count($result) > 0) {
                for ($i = 0; $i < count($result); $i++) {
                    $errors[] = ($result[$i]['user_name'] == $user_name) ? "<span class='error_message'>This user name already exists!<br/>Please choose another one!</span>" : "<span class='error_message'>You have already registered with this mail address!<br/>Please try the password reminder function on the login page!</span>";
                }
                
     }
   }
     
    
	if($errors){
		foreach ($errors as $error) {
            echo $error."<br />";
        }
        include("views/registration.php");
    }	
    //ha nem volt hiba az adatok bevitelénél
    else{
    	
    	//password hash
      $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
      $user_password_hash = password_hash($user_password_new, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
      // generate random hash for email verification (40 char string)
      $user_activation_hash = sha1(uniqid(mt_rand(), true));

      // write new users data into database
      $query_new_user_insert = $db_connection->prepare('INSERT INTO users (user_name, user_password_hash, user_email, user_activation_hash, user_registration_ip, user_registration_datetime) VALUES(:user_name, :user_password_hash, :user_email, :user_activation_hash, :user_registration_ip, now())');
      $query_new_user_insert->bindValue(':user_name', $user_name, PDO::PARAM_STR);
      $query_new_user_insert->bindValue(':user_password_hash', $user_password_hash, PDO::PARAM_STR);
      $query_new_user_insert->bindValue(':user_email', $user_email, PDO::PARAM_STR);
      $query_new_user_insert->bindValue(':user_activation_hash', $user_activation_hash, PDO::PARAM_STR);
      $query_new_user_insert->bindValue(':user_registration_ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
      $query_new_user_insert->execute();
    	//verification email
      // id of new user
      $user_id = $db_connection->lastInsertId();

                if ($query_new_user_insert) {
                    // send a verification email
                    if (sendVerificationEmail($user_id, $user_email, $user_activation_hash)) {
                        // when mail has been send successfully
                        $messages[] = "<img src='pics/register_background.jpg' alt='Affirmation background' />
                        <p class='messages'>We have sent a verification email to your address!<br/>Please click on the verification link in the mail to be able to log in!</p>";
                        $registration_successful = true;
                    } else {
                        // delete this users account immediately, as we could not send a verification email
                        $query_delete_user = $db_connection->prepare('DELETE FROM users WHERE user_id=:user_id');
                        $query_delete_user->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                        $query_delete_user->execute();

                        $errors[] = "<p class='error_messages'>Sorry! We couldn't send you a verification mail!<br/>Please try to registrate again!</p>";
                        include("views/registration.php");
                    }
                } else {
                    $errors[] = "<p class='error_messages'>Sorry! Your registration have failed!<br/>Please try again!</p>";
                    include("views/registration.php");
                }
        if($errors){
            foreach ($errors as $error) {
            echo $error."<br />";
        }
        include("views/registration.php");
        } 
        if($messages){
            foreach ($messages as $message) {
            echo $message."<br />";
          }
        }

    }//eof else
}
	

	function test_input($data) {
      $data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}//end of test input function

	function dbConnection(){
	try {
			global $db_connection;
			$db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
			return true;
            // If an error is catched, database connection failed
            } catch (PDOException $e) {
                $errors[] = "<span class='error_message'>Database error!<br /></span>";
                return false;
            }    // set the PDO error mode to exception
    
	}//eof dbConnection function


function sendVerificationEmail($user_id, $user_email, $user_activation_hash)
    {
        $mail = new PHPMailer;

        // please look into the config/config.php for much more info on how to use this!
        // use SMTP or use mail()
        if (EMAIL_USE_SMTP) {
            // Set mailer to use SMTP
            $mail->IsSMTP();
            //useful for debugging, shows full SMTP errors
            //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            // Enable SMTP authentication
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;
            // Enable encryption, usually SSL/TLS
            if (defined(EMAIL_SMTP_ENCRYPTION)) {
                $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
            }
            // Specify host server
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            $mail->Port = EMAIL_SMTP_PORT;
        } else {
            $mail->IsMail();
        }

        $mail->From = EMAIL_VERIFICATION_FROM;
        $mail->FromName = EMAIL_VERIFICATION_FROM_NAME;
        $mail->AddAddress($user_email);
        $mail->Subject = EMAIL_VERIFICATION_SUBJECT;

        $link = EMAIL_VERIFICATION_URL.'?id='.urlencode($user_id).'&verification_code='.urlencode($user_activation_hash);

        // the link to your register.php, please set this value in config/email_verification.php
        $mail->Body = EMAIL_VERIFICATION_CONTENT.' '.$link;

        if(!$mail->Send()) {
            $this->errors[] = MESSAGE_VERIFICATION_MAIL_NOT_SENT . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }


?>
</body>
</html>