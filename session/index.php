<?php
session_start();
if ((!$_SESSION) || ($_SESSION['login'] == 'off')){
    $user_name = 'User';
    echo 'Hello ' . $user_name;
    echo <<<LogBtn
</br></br><a href="login.php">Log In</a>
</br>     <a href="register.php">Register</a>

LogBtn;
}

elseif ($_SESSION && ($_SESSION['login'] == 'on')){
    require_once 'logout.php';
    echo 'Hello, <b>' . $_SESSION['user_name'] . '</b>';

}
