<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myaffirmationlist.com Registration</title>
    <style type="text/css">
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
        }
        img.background {
            max-width:100%;
            margin:0px;
            height:auto;
            display:block;
            position: absolute;
            top:0px;
            z-index: -1;
            }
       
        .wrapper{
            position:relative;
            top:10px;
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
        .error_message{
            color:#CC0000;
            font-size: 150%;
            padding: 3px;
        }

</style>
<link rel="icon" type="image/png" href="http://www.myaffirmationlist.com/pics/heart.png">
</head>
<body>

<img class="background" src="http://www.myaffirmationlist.com/pics/register_background.jpg" alt="Affirmation background" />

<div class="wrapper">
<form method="post" action="http://www.myaffirmationlist.com/registration_main.php" name="registerform">
    <label for="user_name">User name<p style='font-size:55%;'>Please include only letters and numbers!</p></label>
    <input id="user_name" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name"  />

    <label for="user_email">User's email<p style='font-size:55%;'>Please provide a real email address, you'll be able to reset your password with this address!<br />Your email address will be used solely for password reset.<br /> Under no circumstances will your email address be provided to any third parties.<br />No newsletters will be sent without your permission!</p></label>
    <input id="user_email" type="email" name="user_email"  />

    <label for="user_password_new">Password<p style='font-size:55%;'>[min. 6 characters]</p></label>
    <input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}"  autocomplete="off" />

    <label for="user_password_repeat">Please repeat your password!</label>
    <input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}"  autocomplete="off" />

    
    <label>Please enter these characters:</label>
    <img src="http://www.myaffirmationlist.com/tools/showCaptcha.php" alt="captcha" />
    <input type="text" name="captcha"  />

    <input type="submit" name="register" value="Create account" />
</form>


    <a href="index.php">Back to the main page</a>
</div>
</body>
</html>