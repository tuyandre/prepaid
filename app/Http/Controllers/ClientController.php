<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Checkout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Client;
class ClientController extends Controller
{
    public function getClients(){

        $client=Client::all();

        return response()->json(['clients' => $client], 200);
        //return view('roles.allRole');
    }
    public function generateCompte(){

        $number = mt_rand(110000000, 999999999);
        if (ClientController::checkCompte($number)) {
            return ClientController::generateCompte();
        }
        return $number;

    }
    public function checkCompte($number){
        return Client::whereCompte($number)->exists();
    }
    public function storeClient(Request $request){
       // User data validation

       $this->validate($request, [
           'name' => ['required', 'string', 'max:255'],
           'nid' => ['required'],
           'telephone' => ['required', 'string'],
           'district' => ['required', 'string'],
       ],[
           'name.required' => ' The  Client Name is Required.',
           'nid.required' => ' The  National Id is Required.',
           'telephone.required' => ' The  Telephone is Required.',
           'district.required' => ' The  District is Required.',
           'name.string' => ' The Client Name must be a text only.',
       ]);

      $compte=ClientController::generateCompte();

       $client=new Client();
       $client->name=$request['name'];
       $client->nid=$request['nid'];
       $client->compte=$compte;
       $client->telephone=$request['telephone'];
       $client->district=$request['district'];
       $client->sector=$request['sector'];
       $client->cell=$request['cell'];
       $client->date=Carbon::now();
       $client->save();


       return response()->json(['message' => "ok"], 200);

    }
    public function destroy( Request $request)
    {

        $client = Client::find($request->params['id']);
        if (!$client) {
            return response()->json(['message' => 'Invalid Client'], 404);
        }
        $client->delete();
        return response()->json(['message' => 'ok'], 200);

    }
    public function show(Request $request){
        $b = Client::find($request->params['id']);
            if (!$b) {
                return response()->json(['client' => 'Not found'], 404);
            }
            return response()->json(['client' => $b]);
        }

    public function update (Request $request){
        $this->validate($request, [
            'name' => 'required|',
            'telephone' => 'required',

        ],[
            'name.required' => ' The  Role display name is Required.',
            'telephone.required' => ' The Description is Required.',


        ]);

            $client = Client::find($request->input('id'));
            if(!$client){
                return response()->json(['message'=>'Invalid Client'],404);
            }
            $client->name = $request->input('name');
            $client->nid = $request->input('nid');
            $client->telephone = $request->input('telephone');
            $client->district = $request->input('district');
            $client->sector = $request->input('sector');
            $client->cell = $request->input('cell');
            try{
                $client->save();
            }catch (QueryException $exception){
                return response()->json(['ex'=>$exception->errorInfo],500);
            }
            return response()->json(['message' => "ok"], 200);
    }
    public function searchEngine(Request $request){
        $b = Client::where('compte',$request->params['compte'])->first();
        if ($b) {
            $bills = Checkout::with(['Client'])->where('client_id', $b->id)->orderBy('id', 'DESC')->get();
            $usage = Balance::with(['Client'])->where('client_id', $b->id)->orderBy('id', 'DESC')->get();
        }else{
            $bills=[];
            $usage=[];
        }
        return response()->json(['usage' => $usage,'bills'=>$bills], 200);
    }

}
