<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class UserController extends Controller
{
    public function getUsers(){

        $user=User::with(['Role'])->get();

        return response()->json(['users' => $user], 200);
        //return view('roles.allRole');
    }
    public function storeUser(Request $request){
        $id=$request['role'];
       $role=Role::find($id);

       // User data validation

       $this->validate($request, [
           'name' => ['required', 'string', 'max:255'],
           'role' => ['required'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:8'],
       ],[
           'name.required' => ' The  Member Name is Required.',
           'role.required' => ' The  Role is Required.',
           'email.required' => ' The  Email is Required.',
           'password.required' => ' The  password is Required.',
           'name.string' => ' The Member Name must be a text only.',
           'email.unique'=>'Email used please use other email',
           'email.email'=>'Email should be email format please try again',
           'password.min' => ' Minimun lenth for password is 8 character.',
       
   
       ]);

       $user=new User();
       $user->name=$request['name'];
       $user->role_id=$request['role'];
       $user->email=$request['email'];
       $user->password=bcrypt($request['password']);
       $user->save();

       // Assign Role to the new User
       $user->attachRole($role);

       return response()->json(['message' => "ok"], 200);

    }
    public function destroy( Request $request)
    {

        $user = User::find($request->params['id']);
        if (!$user) {
            return response()->json(['message' => 'Invalid User'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'ok'], 200);

    }
}
