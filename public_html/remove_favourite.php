<?php
require_once('classes/login.php');
require_once('config/config.php');
$login = new Login();
$q = $_REQUEST["q"];
$user_id=$_SESSION['user_id'];
$db_connection = null;

if (!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)) {
             if (databaseConnection()) {
                    // get the picture id
                    $get_picture_id = $db_connection->prepare("SELECT picture_id FROM picture_sources WHERE picture_source = :picture_source");
                    $get_picture_id->bindValue(':picture_source', $q, PDO::PARAM_STR);
                    $get_picture_id->execute();
                    // get result row (as an object)
                    $result_row = $get_picture_id->fetchObject();
                    $picture_id=$result_row->picture_id;

                    $query_remove_fav = $db_connection->prepare("DELETE FROM user_favourites WHERE user_id=:user_id AND picture_id=:picture_id");
      				$query_remove_fav->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      				$query_remove_fav->bindValue(':picture_id', $picture_id, PDO::PARAM_INT);
      				$query_remove_fav->execute();
      				echo "This image has been successfully deleted from your favourites!"; 
                }
            } else {
             echo 'In order to be able to delete this image to your favourite gallery <br />you have to be logged in!<br /><a href="views/not_logged_in.php"><button type="button" class="btn btn-primary login_btn">Log In</button></a>';
            }



                
function databaseConnection()
    {
        // if connection already exists
        global $db_connection;
        if ($db_connection != null) {
            return true;
        } else {
            try {
                $db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                return true;
            } catch (PDOException $e) {
                 echo "Sorry! Database error!" . $e->getMessage();
            }
        }
        // default return
        return false;
    }

?>