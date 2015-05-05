<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>myaffirmationlist.com Registration</title>
    <style type="text/css">
    
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        label {
            position: relative;
            vertical-align: middle;
            bottom: 1px;
        }
        input[type=text],
        input[type=password],
        input[type=submit],
        input[type=email] {
            display: block;
            margin-bottom: 15px;
        }
        input[type=checkbox] {
            margin-bottom: 15px;
        }

img {
    max-width:100%;
    margin:0px;
    height:auto;
    display:block;
    z-index:-1;
}
.wrapper{
position:absolute;
top:20%;
left: 10px;
font-family: "Gill Sans", Helvetica, serif;
font-size: 150%;
}

body,html{
margin:0px;
}

.wrapper a{

    text-decoration:none;
    color: Grey;
}

.wrapper a:hover{

    color: LightGrey;
}

.error_messages{
    position: absolute;
    top: 5%;
    left:10px;
    color:red;
    font-size: 175%;
}

</style>
<link rel="icon" type="image/png" href="http://www.myaffirmationlist.com/pics/heart.png">
</head>
<body>
<img src="http://www.myaffirmationlist.com/pics/register_background.jpg" alt="Affirmation background" />


<div class="error_messages">
<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error."<br />";
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message."<br />";
        }
    }
}
?>

<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error."<br />";
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message."<br />";
        }
    }
}
?>
</div>

<div class="wrapper">

<form method="post" action="http://www.myaffirmationlist.com/login_index.php" name="loginform">
    <label for="user_name"><?php echo 'Username/Email'; ?></label>
    <input id="user_name" type="text" name="user_name" required />
    <label for="user_pswd"><?php echo 'Password'; ?></label>
    <input id="user_pswd" type="password" name="user_pswd" autocomplete="off" required />
    <input type="checkbox" id="user_rememberme" name="user_rememberme" value="1" />
    <label for="user_rememberme"><?php echo 'Remember me (for 2 weeks)'; ?></label>
    <input type="submit" name="login" value="<?php echo 'Log In'; ?>" />
</form>

<a href="http://www.myaffirmationlist.com/views/registration.php"><?php echo '<p>Create new account</p>'; ?></a>
<a href="http://www.myaffirmationlist.com/password_reset.php"><?php echo '<p>I forgot my password</p>'; ?></a>
<a href="http://www.myaffirmationlist.com/index.php"><?php echo '<p>Back to the main page</p>'; ?></a>



</div>
</body>
</html>