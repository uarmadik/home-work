<?php

class Database
{
    const DB_NAME = 'data.db';
    var $content = null;

    function  setData($data)
    {
        unset($data['g-recaptcha-response']);
        unset($data['confirm-password']);
        unset($data['register_form']);
        unset($data['register-submit']);
        $password_hash = password_hash($data['password'],PASSWORD_DEFAULT);
        if ($password_hash) $data['password'] = $password_hash;

        $result = file_put_contents(self::DB_NAME, serialize($data));
        return is_numeric($result);
    }

    function getData()
    {
        $content = file_get_contents(self::DB_NAME, true);
        $this->content = unserialize($content);
        return $this->content;
    }
    function userExist($name)
    {
        if (is_null($this->content)){
            return false;
        }
    }

}