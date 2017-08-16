<?php

function assigning_currency($currency) {
    switch ($currency) {
        case 'usd':
            $currency = USD;
            return $currency;
        case 'uah':
            $currency = UAH;
            return $currency;
        case 'eur':
            $currency = EUR;
            return $currency;
    }

    return $currency;
}