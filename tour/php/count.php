<?php

    $number_of_days = $_GET['number-of-days'];
    //$count_tour = $number_of_days * 100;

    $country = $_GET['country'];

    if ($_GET['discount']) {
        if ($country == 'Turkey') {
            $count_tour = $number_of_days * 100;
            $count_tour *= 0.95;
            echo "Вартість відпочинку у $country становить $count_tour USD";
        }
        else if ($country == 'Egypt') {
            $count_tour = 1.1 * $number_of_days * 100;
            $count_tour *= 0.95;
            echo "Вартість відпочинку у $country становить $count_tour USD";
        }
        else if ($country == 'Italy') {
            $count_tour = 1.2 * $number_of_days * 100;
            $count_tour *= 0.95;
            echo "Вартість відпочинку у $country становить $count_tour USD";
        }
        else {
            echo "Помилка!";
        }
    }
    else {
        if ($country == 'Turkey') {
            $count_tour = $number_of_days * 100;
            echo "Вартість відпочинку у $country становить $count_tour USD";
        }
        else if ($country == 'Egypt') {
            $count_tour = 1.1 * $number_of_days * 100;
            echo "Вартість відпочинку у $country становить $count_tour USD";
        }
        else if ($country == 'Italy') {
            $count_tour = 1.2 * $number_of_days * 100;
            echo "Вартість відпочинку у $country становить $count_tour USD";
        }

    }

