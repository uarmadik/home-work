<?php
function get_currency($bank_name) {
    // link to JSON format
    $currency_link = 'http://resources.finance.ua/ua/public/currency-cash.json';
    $currency_json = file_get_contents($currency_link);
    $file_content = json_decode($currency_json);
    $banks = $file_content -> organizations;

    foreach ($banks as $value) {
        $bank = $value->title;
        if ($bank == $bank_name) {
            $eur_usd_rub = $value->currencies;
            $EUR = $eur_usd_rub->EUR;
            $USD = $eur_usd_rub->USD;
            global $usd;
            global $eur;
            $usd = $USD->ask;
            $eur = $EUR->ask;
        }
    }
}