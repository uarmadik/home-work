<?php

class SignUp
{
    const RECAPTCHA = [
        'url'     => 'https://www.google.com/recaptcha/api/siteverify',
        'private' => '6LempykUAAAAAAxsjjjLoKNrZ3SpU2Mcr8y-fhXd',
        'secret'  => '6LempykUAAAAAPxRubU3d74yK49aS9J-wGDb8BoY'
    ];
    var $error;
    var $_post;

    function validationCapcha()
    {
        $captcha = $this->_post['g-recaptcha-response'];
        if(!$captcha) {
            $this->error = 'Captcha not found!';
            return false;


        } else {
            $secretKey = self::RECAPTCHA['secret'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $response = file_get_contents(self::RECAPTCHA['url'].'?secret='.$secretKey.'&response='.$captcha.'&remoteip='.$ip);
            $result = json_decode($response, true);
            if (intval($result['success']) !== 1) {
                $this->error = "You are spammer ! Get the @$%K out!";
                return false;
            } else {
                $this->error = '';
                return true;
            }
        }
        return true;
    }

    function validationName()
    {
        if (strlen($this->_post['username']) >= 3) return true;
        else $this->error = 'Too short name!';

    }
    function validationPassword()
    {
        if ($this->_post['password'] !== $this->_post['confirm-password']) {
            $this->error = 'Password does not match';
        }
        else return true;
    }

    function validation()
    {
        return ($this->validationCapcha() &&
               $this->validationName() &&
               $this->validationPassword());
    }

    function setPost($post)
    {
        $this->_post = $post;
        foreach ($this->_post as &$one){
            $one = trim($one);
        }
    }
    function existing_name($user_name, $users_array)
    {
        $existing_name = '';
        foreach ($users_array as $key => $value){
            if ($user_name == $key) $existing_name = $key;
        }
        return $existing_name;
    }
}