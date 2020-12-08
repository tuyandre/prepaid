<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Client;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function client(){
        return view('reports.client');
    }
    public function waterBill(){
        return view('reports.waterBill');
    }
    public function clientReport(Request $request){
        $client=Client::all();
        return view('reports.clientReport',['clients'=>$client]);
    }
    public function customClientReport(Request $request){
        $fromDate=$request['date1'];
        $toDate=$request['date2'];
        $client=Client::with('Checkout')->whereBetween('date',[$fromDate, $toDate])->get();
        return view('reports.clientReport',['clients'=>$client]);
    }
    public function waterBillReport(Request $request){
        $bill=Checkout::with('Client')->get();
        return view('reports.waterBillReport',['bills'=>$bill]);
    }
    public function customWaterBillReport(Request $request){
        $fromDate=$request['date1'];
        $toDate=$request['date2'];
        $bill=Checkout::with('Client')->whereBetween('date',[$fromDate, $toDate])->get();
        return view('reports.waterBillReport',['bills'=>$bill]);
    }
}
