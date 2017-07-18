<?php
session_start();
    $user_name = 'User';

    if (isset($_SESSION['user_name']) && isset($_SESSION['user_password'])){
        if (($_POST['user_name']) == ($_SESSION['user_name']) &&
            ($_POST['user_password']) == ($_SESSION['user_password'])){
            $_SESSION['login'] = 'on';
            header("Location:http://home-work/test/");
            die();
        }
        echo <<<FORM
<!DOCTYPE html>
<head>
    <title>Test session</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Log In</h1>
<form method="POST">
    <input type="text" name="user_name" placeholder="Name..."></br></br>
    <input type="password" name="user_password" placeholder="Password"></br></br>
    <input type="submit">
</form>
</body>
FORM;
    }
    else {
        echo 'Error! You did not registered yet!';
        echo '</br><a href="http://home-work/test/">Back!</a>';
    }







