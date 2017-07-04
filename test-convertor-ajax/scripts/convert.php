<?php
    
//курс гривні до фунту стрерлінгів 33,11

    $uah = 1;
    $usd = 0;
    $eur = 0;
    $gbp = 33.11;

    include_once 'get_currency.php';
    get_currency(ПриватБанк);

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

        switch ($currency_from) {
            case "usd":
                $quantity_from = $usd;
                break;
            case "eur":
                $quantity_from = $eur;
                break;
            case "gbp":
                $quantity_from = $gbp;
                break;
            case "uah":
                $quantity_from = $uah;
                break;
            default:
                echo "Не вибрано валюту";
                break;
        }

        switch ($currency_to) {
            case "uah":
                $quantity_to = $uah;
                break;
            case "gbp":
                $quantity_to = $gbp;
                break;
            case "eur":
                $quantity_to = $eur;
                break;
            case "usd":
                $quantity_to = $usd;
                break;
            default:
                echo "Не вибрано валюту";
                break;
        }
        if ($quantity) {
            $result = $quantity_from * $quantity / $quantity_to;

            $result = round($result, 2);
            $currency_from = strtoupper($currency_from);
            $currency_to = strtoupper($currency_to);

            echo "Результат: $result $currency_to за  $quantity $currency_from";

        } else {
            echo "Не вказано суму!";
        }

    }
?>