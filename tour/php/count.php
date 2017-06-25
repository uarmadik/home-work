<?php
    $number_of_days = $_GET['number-of-days'];
    $country = $_GET['country'];
    $cost_day = 100;
    $discount = 0.05;
    $cost_tour = "temp";
    if (is_numeric($number_of_days) && ($number_of_days > 0) && $country) {
        if ($country == 'turkey') {
            $cost_tour = $cost_day * $number_of_days;
        }
        elseif ($country == 'egypt') {
            $cost_tour = $cost_day * $number_of_days * 1.1;
        }
        elseif ($country == 'italy') {
            $cost_tour = $cost_day * $number_of_days * 1.2;
        }
    }
    else {
        echo "Помилка! Всі поля повинні бути вибрані.";
        return;
    }
    if ($_GET['discount']) {
        $cost_tour *= 1 - $discount;
    }
    echo "Вартість даного туру становить $cost_tour USD";