<?php
    session_start();
    if (($_POST['user_name']) && ($_POST['user_password'])){
        $_SESSION['user_name'] = $_POST['user_name'];
        $_SESSION['user_password'] = $_POST['user_password'];
        $_SESSION['login'] = 'on';

        header("Location: http://home-work/test/");
        die();
    }
    echo <<<RisterForm
<!DOCTYPE html>
<head>
    <title>Test session</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Register</h1>
<form method="POST">
    <input type="text" name="user_name" placeholder="Name..."></br></br>
    <input type="password" name="user_password" placeholder="Password"></br></br>
    <input type="submit">
</form>
</body>

RisterForm;




