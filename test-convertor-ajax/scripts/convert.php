<?php

include_once 'get_currency.php';
    $currency_now = get_currency('ПриватБанк'); # тут буде масив з курсом usd eur rub
    $eur = $currency_now['eur'];
    $usd = $currency_now['usd'];

    define("UAH", 1);
    define("USD", $usd);
    define("EUR", $eur);

global $currency_from;
global $currency_to;

    $currency_from = $_GET['currency_from'];
    $currency_to = $_GET['currency_to'];
    $quantity = $_GET['quantity'];

    if ($currency_from == $currency_to) {
        echo "Виберіть різні валюти!";
    }
    elseif ($quantity < 0){
        echo "Сума не може бути від’ємною!";
    }
    else {
        include_once 'assigning_currency.php';

        $from = assigning_currency($currency_from); // присвоєння значення валюти чисельнику
        $to = assigning_currency($currency_to); // присвоєння значення валюти знаменнику


        if ($quantity) {
            $result = $from * $quantity / $to;

            $result = round($result, 2);
            $currency_from = strtoupper($currency_from);
            $currency_to = strtoupper($currency_to);

            echo "Результат: $result $currency_to за  $quantity $currency_from";

        } else {
            echo "Не вказано суму!";
        }

    }