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
            $USD = $eur_usd_rub->USD;
            $EUR = $eur_usd_rub->EUR;
            $RUB = $eur_usd_rub->RUB;

            $result = array('eur' => $EUR->ask, 'usd' => $USD->ask, 'rub'=>$RUB->ask,);

            return $result;
        }
    }
}

//var_dump(get_currency('ПриватБанк'));