<?php

class Text extends Sentance
{
    function create_text($sentances_number)
    {
        $text = '';
        for ($i=0; $i < $sentances_number; $i++) {
            $text .= ($this->create_sentnce() . '.</br>');
        }
        return $text;
    }
}
