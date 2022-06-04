<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $currencyCodes = [
            'AUD' => 'AUD - Australian dollar',
            'BRL' => 'BRL - Brazilian dollar',
            'CAD' => 'CAD - Canadian dollar',
            'CZK' => 'CZK - Czech koruna',
            'DKK' => 'DKK - Danish krone',
            'EUR' => 'EUR - Euro',
            'HKD' => 'HKD - Hong Kong dollar',
            'HUF' => 'HUF - Hungarian forint',
            'INR' => 'INR - Indian rupee',
            'ILS' => 'ILS - Israeli',
            'JPY' => 'JPY - Japanese yen',
            'MYR' => 'MYR - Malaysian ringgit',
            'MXN' => 'MXN - Mexican peso',
            'TWD' => 'TWD - New Taiwan dollar',
            'NZD' => 'NZD - New Zealand dollar',
            'NOK' => 'NOK - Norwegian krone',
            'PHP' => 'PHP - Philippine peso',
            'PLN' => 'PLN - Polish złoty',
            'GBP' => 'GBP - Pound sterling',
            'RUB' => 'RUB - Russian ruble',
            'SGD' => 'SGD - Singapore dollar',
            'SEK' => 'SEK - Swedish krona',
            'CHF' => 'CHF - Swiss franc',
            'THB' => 'THB - Thai baht',
            'USD' => 'USD - United States dollar'
        ];

        public function __construct()
        {
        	# code...
        }
}
