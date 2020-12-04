<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Checkout;
use App\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    public function getBills(){
        $bills=Checkout::with(['Client'])->get();

        return response()->json(['bills' => $bills], 200);
    }
    public function getUsage(){
        $usage=Balance::with(['Client'])->get();
        return response()->json(['usage' => $usage], 200);
    }
    public function storeBills(Request $request){

        $client=Client::with(['Balance'=> function($query) {
            $query->orderBy('id', 'DESC')->first();

        }])
        ->where('compte',$request['compte'])->orderBy('id', 'DESC')->first();
        if ($client){
            if (sizeof($client->balance)>0){
                $size=sizeof($client->balance);
//                return response()->json(['message' => $client->balance,'size'=>$size], 200);

                $bill=new Checkout();
                $bill->client_id=$client->id;
                $bill->cash=$request['cash'];
                $bill->date=Carbon::now();
                $bill->quantity=BillsController::computeBill($request['cash']);
                $bill->balance=$client->balance[$size-1]->balance;
                $bill->total=$client->balance[$size-1]->balance+BillsController::computeBill($request['cash']);
                $bill->save();

                $bal=new Balance();
                $bal->client_id=$client->id;
                $bal->date=Carbon::now();
                $bal->previous=$client->balance[$size-1]->balance;
                $bal->used=0;
                $bal->balance=$client->balance[$size-1]->balance+BillsController::computeBill($request['cash']);
                $bal->save();
                return response()->json(['message' => 'ok'], 200);
            }else{
                $bill=new Checkout();
                $bill->client_id=$client->id;
                $bill->cash=$request['cash'];
                $bill->date=Carbon::now();
                $bill->quantity=BillsController::computeBill($request['cash']);
                $bill->balance=0;
                $bill->total=BillsController::computeBill($request['cash']);
                $bill->save();

                $bal=new Balance();
                $bal->client_id=$client->id;
                $bal->date=Carbon::now();
                $bal->previous=0;
                $bal->used=0;
                $bal->balance=BillsController::computeBill($request['cash']);
                $bal->save();
                return response()->json(['message' => 'ok'], 200);
            }

        }else{
            return response()->json(['message' => 'not'], 200);
        }
        return response()->json(['bills' => $client], 200);
    }

    public  function  computeBill($cash){
        $netCash=$cash-(($cash*17)/100);
        $data=($netCash/350);
        $water=number_format((float)$data, 3, '.', '');
        return $water;


    }
    public function storeUsage(Request $request){
        $client=Client::with(['Balance'=> function($query) {
            $query->orderBy('id', 'DESC')->first();

        }])
        ->where('compte',$request['compte'])->orderBy('id', 'DESC')->first();

        if ($client){
            if (sizeof($client->balance)>0){
                $size=sizeof($client->balance);

                $bal=new Balance();
                $bal->client_id=$client->id;
                $bal->date=Carbon::now();
                $bal->previous=$client->balance[$size-1]->balance;
                $bal->used=$request['data'];
                $bal->balance=$client->balance[$size-1]->balance-$request['data'];
                $bal->save();
                return response()->json(['message' => 'ok','balance'=>$bal], 200);
            }
        }
    }
    public function getRealUsage($compte){
        $client=Client::where('compte',$compte)->first();
        if ($client){
            $usage=Balance::where('client_id',$client->id)->orderBy('id', 'DESC')->first();
            return response()->json(['usage' => $usage->balance], 200);
        }else{
            return response()->json(['usage' => "not"], 404);
        }
    }
    public function getRealUsageTest($compte){
        $client=Client::where('compte',$compte)->first();
        if ($client){
            $usage=Balance::where('client_id',$client->id)->orderBy('id', 'DESC')->first();
            return response()->json(['usage' => $usage->balance], 200);
        }else{
            return response()->json(['usage' => "not"], 404);
        }

    }
}
