<?php
/*
    ДЗ:
    1) пошук повторяющиїхся слів в масиві довжини n і виведення кількість їх повторень на екран
    2) Видалити з масиву довжини n одне значення і визначити чи буде він відсортованим по зрослтанням
    3) Видалити з масива слова які повторяютсья більше n раз
    4) Пошук макс і мін значення в мпасиві довжини n
    5) З двух масивів сформувати третій масив, який міститиме значення(ключі) які є в обох масивах

    !довжина масиву задається з клавіатури.
    !під час розробки не використовувати спец. функції
 */

// 1.
/*
function repeated_words($words_array) {

    function comparison($first_word, $second_word) {
        return ($first_word == $second_word) ? true : false;
    }

    sort($words_array);
    $repeat_count = 1;
    $result = array();
    $array_length = count($words_array);

    for ($i = 0; $i < $array_length; $i++) {

        if (comparison($words_array[$i], next($words_array))) {
            $repeat_count++;
            $result[$words_array[$i]] = $repeat_count;
        }
        else {
            $repeat_count = 1;
        }
    }
        // вивід результату
    foreach ($result as $k => $v) {
        echo "Кількіть повторень слова '" . $k . "' - " . $v ."</br>";
    }

    return $result;
}

$data = ['word4', 'word8', 'word','word', 'word2','word4','word4','word4','word4',]; // Тестовий масив
repeated_words($data);

*/


// 2.
/*
    $data2 = [1,5,8,6,11,85,20,3]; // Тестовий масив
    unset($data2[5]);
    var_dump($data2);
    sort($data2);
    var_dump($data2);
*/

// 3.

/*
$data_3 = ['word1', 'word2', 'word1', 'word3', 'word4', 'word5', 'word', 'word', 'word4']; // Тестовий масив

function remove_repeated_words($array, $quantity_repeat) {
    $info_array_iterations = array_count_values($array);
    foreach ($info_array_iterations as $key => $value) {
        if ($value == $quantity_repeat){
            unset($info_array_iterations[$key]);
        }
    }
    $result = array();
    foreach ($info_array_iterations as $key => $value) {
        $result[] = $key;
    }
    return $result;
}

var_dump(remove_repeated_words($data_3, 3));

*/

// 4.
/*
$data_4 = [1,2,3,4,5,6,]; // тестовий масив

function max_value($array){
    $array_length = count($array);
    for ($i = 0; $i < $array_length; $i++) {
        if ($array[$i] < next($array)) {
            unset($array[$i]);
        }
    }
    $array = array_values($array);
    $result = $array[0];
    return $result;
}

function min_value($array){
    $array_length = count($array);
    for ($i = 0; $i < $array_length; $i++) {
        if ($array[$i] > next($array)) {
            unset($array[$i]);
        }
    }
    $array = array_values($array);
    $result = $array[0];
    return $result;
}
var_dump(max_value($data_4));
var_dump(min_value($data_4));
*/

// 5.
/*
    $array_1 = ['one' => 1, 'two' => 2,];
    $array_2 = ['three' => 3, 'four' => 4,];

    $result = $array_1 + $array_2;
    var_dump($result);
    $result = array_merge($array_1, $array_2);
    var_dump($result);
*/

