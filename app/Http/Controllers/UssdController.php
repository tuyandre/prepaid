<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UssdController extends Controller
{
    public function onlineUssdMenu(Request $request)
    {
        $sessionId   = $request->get('sessionId');
        $serviceCode = $request->get('serviceCode');
        $phoneNumber = $request->get('phoneNumber');
        $text        = $request->get('text');
        // use explode to split the string text response from Africa's talking gateway into an array.
        $ussd_string_exploded = explode("*", $text);
        // Get ussd menu level number from the gateway
        $level = count($ussd_string_exploded);
        if ($text == "") {
            // first response when a user dials our ussd code
            $response  = " Welcome to Water prepaid System \n";
            $response .= "1. Buy Water \n";
            $response .= "2. Balance ";
        }
        elseif ($text == "1") {
            // when use response with option django
            $response = "Enter water meter";
        }
        elseif ($ussd_string_exploded[0] == 1 && $level == 2) {
            $response = "Enter Amount";
        }
        elseif ($ussd_string_exploded[0] == 1  && $level == 3) {
            $response = "Payed Success";
        }
        elseif ($text == "2") {
            // Our response a user respond with input 2 from our first level
            $response = "Enter your Water meter";
        }
        elseif ($ussd_string_exploded[0] == 2 && $level == 2) {
            $response = "Enter Amount";
        }
        // send your response back to the API
        header('Content-type: text/plain');
        echo $response;
    }
}
