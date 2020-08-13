<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function register(){
        $user=User::all();
        $count=$user->count();

        if ($count>0) {
            return view('auth.login');
        }else {

            return view('auth.admin.register');
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function store(Request $request){


        $data=$request->all();


        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $role = new Role();
        $role->name = "admin";
        $role->display_name = "Administrator";    // optional
        $role->description  = "Survey all activities of company";  // optional
        $role->save();

        $user=new User();
        $user->name=$request['name'];
        $user->role_id=$role->id;
        $user->email=$request['email'];
        $user->password=bcrypt($request['password']);
        $user->save();

        $user->attachRole($role);


        return response()->json(['auth' => "ok"], 200);

        return view('auth.login');
        // return view('home')->with('success','WELCOME TO YOUR DASHBOARD!');

    }
    public function updatePassword(Request $request){
        if (Auth::check())
        {
            $this->validate($request, [
                'password' => ['required','confirmed', 'string', 'min:8'],
            ],[
                'password.min' => ' The Password Length is Shortest At least 8 Characters.',
                'password.confirmed' => ' The Password must confimed.',

            ]);
            $user=User::find(Auth::user()->id);

            if (Hash::check($request['password_current'], Auth::user()->password)){
                $user->password=Hash::make($request['password']);
                $user->save();
                // return back()->with('success','Password Updated Successfull !');
                return response()->json(['message' => 'ok'], 200);

            }
            else {
                // return back()->with('error','Current password is not Correct !');
                return response()->json(['message' => 'not'], 200);
            }

        }
    }
    public function updateProfile(Request $request){

        if (Auth::check())
        {
            $user = User::find(Auth::user()->id);
            $user->name=$request['name'];
            $user->save();
            return response()->json(['message' => 'ok'], 200);
        }
        return response()->json(['message' => 'not'], 200);
    }
    public function updatePhoto(Request $request){

        if (Auth::check())
        {

            if($request->hasFile('photo')){

                $photo=$request->file('photo');
                $photoname =time().$photo->getClientOriginalName();
                //  Image::make($photo->getRealPath())->resize(300, 300)->insert(public_path('profiles'),$photoname);
                $photo->move(public_path('profiles'),$photoname);

                $user = User::find(Auth::user()->id);
                $user->profile = $photoname;
                $user->save();
                return response()->json(['message' => 'ok'], 200);
            }

            return response()->json(['message' => 'not'], 200);
        }
        return response()->json(['message' => 'not'], 200);
    }
}
