<?php

class Word
{
    const MIN_LEN = 3;
    const MAX_LEN = 10;

    private function get_letter()
    {
        return chr(97 + rand(0, 25));
    }

    public function create_word()
    {
        $word_len = rand(self::MIN_LEN, self::MAX_LEN);
        $word = '';
        for ($i=0; $i <= $word_len; $i++) {
            $word .= $this->get_letter();
        }
        return $word;
    }

}




