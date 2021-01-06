<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Checkout;
use App\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UssdController extends Controller
{
    public  function  checkBill($cash){
        $netCash=$cash-(($cash*17)/100);
        $data=($netCash/350);
        $water=number_format((float)$data, 3, '.', '');
        return $water;


    }
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
            $response  = "CON Welcome to Water prepaid System \n";
            $response .= "1. Buy Water \n";
            $response .= "2. Balance ";
        }
        elseif ($text == "1") {
            // when use response with option django
            $response = "CON Enter water meter";
        }
        elseif ($ussd_string_exploded[0] == 1 && $level == 2) {
            $compt=$ussd_string_exploded[1];
            $clien=Client::with(['Balance'=> function($query) {
                $query->orderBy('id', 'DESC')->first();

            }])
                ->where('compte',$compt)->orderBy('id', 'DESC')->first();
            if ($clien) {
                $response = "CON  Compte ya ".$clien->name." \n Enter Amount";
            }else{
                $response = "END Invalid Water meter";
            }

        }
        elseif ($ussd_string_exploded[0] == 1  && $level == 3) {
            $compte=$ussd_string_exploded[1];
            $amount=$ussd_string_exploded[2];
            $client=Client::with(['Balance'=> function($query) {
                $query->orderBy('id', 'DESC')->first();

            }])
                ->where('compte',$compte)->orderBy('id', 'DESC')->first();

            if ($client) {
                if (sizeof($client->balance) > 0) {
                    $size = sizeof($client->balance);
//                return response()->json(['message' => $client->balance,'size'=>$size], 200);

                    $bill = new Checkout();
                    $bill->client_id = $client->id;
                    $bill->cash = $amount;
                    $bill->date = Carbon::now();
                    $bill->quantity = UssdController::checkBill($amount);
//                    $bill->quantity = BillsController::computeBill($amount);
                    $bill->balance = $client->balance[$size - 1]->balance;
                    $bill->total = $client->balance[$size - 1]->balance + UssdController::checkBill($amount);;
                    $bill->save();

                    $bal = new Balance();
                    $bal->client_id = $client->id;
                    $bal->date = Carbon::now();
                    $bal->previous = $client->balance[$size - 1]->balance;
                    $bal->used = 0;
                    $bal->balance = $client->balance[$size - 1]->balance + UssdController::checkBill($amount);;
                    $bal->save();
//                return response()->json(['message' => 'ok'], 200);
                } else {
                    $bill = new Checkout();
                    $bill->client_id = $client->id;
                    $bill->cash = $amount;
                    $bill->date = Carbon::now();
                    $bill->quantity = UssdController::checkBill($amount);;
                    $bill->balance = 0;
                    $bill->total = UssdController::checkBill($amount);;
                    $bill->save();

                    $bal = new Balance();
                    $bal->client_id = $client->id;
                    $bal->date = Carbon::now();
                    $bal->previous = 0;
                    $bal->used = 0;
                    $bal->balance = UssdController::checkBill($amount);;
                    $bal->save();

//                return response()->json(['message' => 'ok'], 200);
                }
                $met = UssdController::checkBill($amount);
                $data = array(
                    "sender" => '+250781898344',
                    "recipients" => '+250' . $client->telephone,
                    "message" => "uguze amazi ya " . $amount . " Rwf baguhaye" . $met . " Litres"
                ,);
                $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
                $data = http_build_query($data);
                $username = "esperance";
                $password = "0781898344";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $result = curl_exec($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                if ($result) {
                    $response = "END Uguze amazi ya:" .$amount." rwf Mukanya urabona sms";
                }else{
                    $response = "END Uguze amazi ya:" .$amount." rwf";
                }

            }else{
                $response = "END Invalid water meter:" . $ussd_string_exploded[1];
            }
        }
        elseif ($text == "2") {
            // Our response a user respond with input 2 from our first level
            $response = "CON Enter your Water meter";
        }
        elseif ($ussd_string_exploded[0] == 2 && $level == 2) {
            $compte=$ussd_string_exploded[1];
            $client=Client::with(['Balance'=> function($query) {
                $query->orderBy('id', 'DESC')->first();

            }])
                ->where('compte',$compte)->orderBy('id', 'DESC')->first();

            if ($client) {
                if (sizeof($client->balance) > 0) {
                    $size = sizeof($client->balance);
                    $balas=$client->balance[$size - 1]->balance;
                    $response = "END  Your Balance:".$balas." Litres";
                }else{
                    $response = "END  Your water meter is New";
                }
            }else{
                $response = "END  Invalid Water Meter";

            }

        }
        // send your response back to the API
        header('Content-type: text/plain');
        echo $response;
    }
}
