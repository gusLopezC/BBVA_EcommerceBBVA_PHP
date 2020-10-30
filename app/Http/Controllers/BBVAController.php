<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require(dirname(__FILE__) . '/BBVA-PHP/Bbva.php');
use Illuminate\Support\Facades\Log;
use Bbva;
use Redirect;


class BBVAController extends Controller
{
    //
    

    public function store(){


        $bbva = Bbva::getInstance('mfjdlip7ehwej8y0g7rv', 'sk_528cb60580bf4aa89c97ee9fdc7e7e07');

        $chargeRequest = array(
            'affiliation_bbva' => '275678',
            'amount' => 100,
            'description' => 'Cargo inicial a mi merchant',
            'currency' => 'MXN',
            'redirect_url' => 'https://www.promodescuentos.com/hot',
            'customer' => array(
                'name' => 'Juan',
                'last_name' => 'Vazquez Juarez',
                'email' => 'juan.vazquez@empresa.com.mx',
                'phone_number' => '554-170-3567')
        );
        
        $charge = $bbva->charges->create($chargeRequest);

        //return $charge->payment_method->url;

        return Redirect::to($charge->payment_method->url);
    }
}
