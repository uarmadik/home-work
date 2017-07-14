<?php
function read_file($path_to_file)
{
    $serialize_data = file_get_contents($path_to_file);
    $censore_words = unserialize($serialize_data);
    return $censore_words;
}

function write_file($path_to_file, $censore_words)
{
    $data = serialize($censore_words);
    if(file_put_contents($path_to_file, $data)) return true;
}

function manage_censore_words($path_to_file, $operation, $word)
{


    $array_words = read_file($path_to_file);

    switch ($operation){
        case 'add_word':
            foreach ($array_words as $value){
                if ($value == $word) {
                    echo '\'' . $word . '\' already exist';
                    return $array_words;
                };
            }
            $array_words[] = $word;
            break;
        case 'remouve_word':
            $count_words_to_remouve = 0;
            foreach ($array_words as $key => $value){
                if ($value == $word) {
                    unset($array_words[$key]);
                    $count_words_to_remouve++;
                }
            }
            if ($count_words_to_remouve > 0) echo '\'' . $word . '\' remouved';
            else echo '\'' . $word . '\' not found!';

            break;
    }
    sort($array_words);

    write_file($path_to_file, $array_words);

    return $array_words;
}


//var_dump(manage_censore_words('censore_words.txt','add_word', 'point'));
//var_dump(manage_censore_words('censore_words.txt', 'remouve_word', 'template'));


