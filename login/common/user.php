<?php

class User
{
    var $name;
    var $password;

    function __construct($post)
    {
        $this->name = $post['username'];
        $this->password = $post['password'];
    }

    function getUserName()
    {
        return $this->name;
    }
    function getPassword()
    {
        return $this->password;
    }
}