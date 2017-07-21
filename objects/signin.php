<?php

class SignIn
{
    var $error;
    var $_post;
    var $user_name;
    var $user_password;

    function checkUser($name_from_db, $password_from_db)
    {
        if($this->user_name == $name_from_db){
            if(password_verify($this->user_password, $password_from_db)) return true;
        } else {
            $this->error = 'Error name or password!';
            return false;
        }
    }

    function setPost($post)
    {
        $this->_post = $post;
    }

    function getUserName()
    {
        $this->user_name = $this->_post['username'];
        return $this->_post['username'];
    }
    function getPassword()
    {
        $this->user_password = $this->_post['password'];
        return $this->_post['password'];
    }
    function remember()
    {
        $_SESSION['user_name'] = $this->user_name;
        header("Location:http://home-work/test/");
    }
    function logOut()
    {
        unset($_SESSION['user_name']);
        session_destroy();
        header("Location:http://home-work/test/");
    }

}