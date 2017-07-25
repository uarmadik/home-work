<?php

require_once 'user.php';

class Database
{
    const DB_NAME = 'data.db';
    var $content = null;

    function  setData($data, $users_array)
    {
        $user_name = $data['username'];
        unset($data['g-recaptcha-response'],
              $data['confirm-password'],
              $data['register_form'],
              $data['register-submit'],
              $data['username']
        );
        $password_hash = password_hash($data['password'],PASSWORD_DEFAULT);
        if ($password_hash) {
            $data['password'] = $password_hash;
        }
        $new_user[$user_name] = $data;
        if ($users_array) {
            $users = $users_array + $new_user;
        }
        else {
            $users = $new_user;
        }

        $result = file_put_contents(self::DB_NAME, serialize($users));
        return $result > 0;
    }

    function getUser()
    {
        $content = file_get_contents(self::DB_NAME, true);
        $users_array = unserialize($content);
        return $users_array;
    }

}