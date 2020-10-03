<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require(dirname(__FILE__) . '/BBVA-PHP/Bbva.php');
use Illuminate\Support\Facades\Log;
use Bbva;

class BBVAController extends Controller
{
    //
    

    public function store(){


        $bbva = Bbva::getInstance('moiep6umtcnanql3jrxp', 'sk_3433941e467c4875b178ce26348b0fac');

        $tokenData = array(
            'holder_name' => 'Luis Pérez',
            'card_number' => '4111111111111111',
            'cvv2' => '123',
            'expiration_month' => '12',
            'expiration_year' => '23',
            'address' => array(
                'line1' => 'Av. 5 de Febrero No. 1',
                'line2' => 'Col. Felipe Carrillo Puerto',
                'line3' => 'Zona industrial Carrillo Puerto',
                'postal_code' => '76920',
                'state' => 'Querétaro',
                'city' => 'Querétaro',
                'country_code' => 'MX'));
        
        $token = $bbva->tokens->add($tokenData);

        return $token->id;
    }
}
