<?php
$number_from = $_GET['number_from'];
$number_to = $_GET['number_to'];
$operation = $_GET['operation'];
$result = '';

    if ((is_numeric($number_from)) && (is_numeric($number_to)) && !is_numeric($operation)) {
        if ($operation == 'adding') {
            $result = $number_from + $number_to;
        }
        if ($operation == 'subtracting') {
            $result = $number_from - $number_to;
        }
        if ($operation == 'multiplying') {
            $result = $number_from * $number_to;
        }
        if ($operation == 'dividing') {
            $result = $number_from / $number_to;
        }
        if ($operation == 'remainder') {
            $result = $number_from % $number_to;
        }
        if ($operation == 'logarithm') {
            $result = log($number_from, $number_to);
        }
    }
    else {
        echo "Помилка!";
        return;
    }

    echo $result;
