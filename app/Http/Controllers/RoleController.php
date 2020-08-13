<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    public function storeRoles(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|string|unique:roles',
            'display' => 'required|',
            'description' => 'required',
    
        ],[
            'name.min' => ' The  Member Name must be at least 4 characters.',
            'name.required' => ' The  Member Name is Required.',
            'name.string' => ' The Member Name must be a text only.',
            'name.unique'=>'name should be unique on Roles Database',
            'display.required' => ' The  Role display name is Required.',
            'description.required' => ' The Description is Required.',
        
    
        ]);
            $role = new Role();
            $role->name = $request['name'];
            $role->display_name = $request['display'];    // optional
            $role->description  = $request['description'];  // optional
            $role->save();

        return response()->json(['message' => "ok"], 200);
    }
    public function getRoles(){

        $role=Role::all();

        return response()->json(['roles' => $role], 200);
        //return view('roles.allRole');
    }

    public function destroy( Request $request)
    {

        $role = Role::find($request->params['id']);
        if (!$role) {
            return response()->json(['role' => 'Invalid budget'], 404);
        }
        $role->delete();
        return response()->json(['message' => 'ok'], 200);

    }

public function show(Request $request){
    $b = Role::find($request->params['id']);
        if (!$b) {
            return response()->json(['roles' => 'Not found'], 404);
        }
        return response()->json(['role' => $b]);
    }
    
public function update (Request $request){
    $this->validate($request, [
        'display' => 'required|',
        'description' => 'required',

    ],[
        'display.required' => ' The  Role display name is Required.',
        'description.required' => ' The Description is Required.',
    

    ]);

        $role = Role::find($request->input('id'));
        if(!$role){
            return response()->json(['message'=>'Invalid Role'],404);
        }
        $role->display_name = $request->input('display');
        $role->description = $request->input('description');
        try{
            $role->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['message' => "ok"], 200);
}


}
