<?php

class Sentance extends Word
{
    const MIN_LEN = 3;
    const MAX_LEN = 6;

    function create_sentnce()
    {
        $sentance_len = rand(self::MIN_LEN, self::MAX_LEN);
        $sentance = '';
        for ($i=0; $i <= $sentance_len; $i++) {
            $sentance .= ($this->create_word() . ' ');
        }
        return $sentance;
    }
}