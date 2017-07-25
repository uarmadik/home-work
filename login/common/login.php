<?php

require_once 'user.php';

class Login
{
    var $error;
    var $user = null;

    function __construct($post)
    {
        $this->user = new user($post);
    }

    function checkUser($exist_users)
    {
        foreach ($exist_users as $exist_user_name => $user_data) {

            if ($this->user->name == $exist_user_name) {
                if (password_verify($this->user->password, $user_data['password'])) {
                    $_SESSION['user_name'] = $this->user->name;
                    header("Location: /test/index.php");
                }

            } else {
                $this->error = 'Error name or password!';
            }
        }
    }

    function remember()
{
    $hour = time() + 3600 * 24 * 30;
    setcookie('user_name', $this->user->name, $hour);
    setcookie('password', $this->user->password, $hour);
    return true;
}

    static function logOut()
    {
        session_destroy();
        setcookie('user_name', null, (time()-3600));
        setcookie('password', null, (time()-3600));
        header("Location: /test/login.php");
    }

}