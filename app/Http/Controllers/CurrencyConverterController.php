<?php

namespace App\Http\Controllers;

class CurrencyConverterController extends Controller
{
    public function __invoke()
    {
        $currencies = ['USD', 'INR', 'SGD', 'EUR', 'GBP', 'AUD', 'RUB', 'JPY', 'CAD'];
        foreach($currencies as $currency) {
            $req_url = 'https://api.exchangerate.host/latest?base=INR?symbols=USD,EUR,SGD,GBP,AUD,RUB,JPY,CAD';
            $response_json = file_get_contents($req_url);
            if(false !== $response_json) {
                try {
                    $response = json_decode($response_json);
                    if($response->success === true) {
                        dd($response);
                    }
                } catch(\Exception $e) {
                    // Handle JSON parse error...
                }
            }
        }
    }
}
