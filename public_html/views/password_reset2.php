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
}
.wrapper{
position:absolute;
top:5%;
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
    color:red;
    font-size: 175%;
}

</style>
<link rel="icon" type="image/png" href="http://www.myaffirmationlist.com/pics/heart.png">
</head>
<body>
<img src="pics/register_background.jpg" alt="Affirmation background" />
<div class="wrapper">
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



<?php if ($login->passwordResetLinkIsValid() == true) { ?>
<form method="post" action="password_reset.php" name="new_password_form">
    <input type='hidden' name='user_name' value='<?php echo $_POST['user_name']; ?>' />
    <input type='hidden' name='user_password_reset_hash' value='<?php echo $_POST['user_password_reset_hash']; ?>' />

    <label for="user_password_new"><?php echo WORDING_NEW_PASSWORD; ?></label>
    <input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

    <label for="user_password_repeat"><?php echo WORDING_NEW_PASSWORD_REPEAT; ?></label>
    <input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <input type="submit" name="submit_new_password" value="<?php echo WORDING_SUBMIT_NEW_PASSWORD; ?>" />
</form>
<!-- no data from a password-reset-mail has been provided, so we simply show the request-a-password-reset form -->
<?php } else { ?>
<form method="post" action="password_reset.php" name="password_reset_form">
    <label for="user_email"><?php echo WORDING_REQUEST_PASSWORD_RESET; ?></label>
    <input id="user_email" type="text" name="user_email" required />
    <input type="submit" name="request_password_reset" value="<?php echo WORDING_RESET_PASSWORD; ?>" />
</form>
<?php } ?>

<a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>

</div>
</body>
</html>