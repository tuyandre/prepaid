<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function Login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
//        return response()->json(['message' => 'ok'], 200);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
//            $credentials = $request->only('email', 'password');
//            if (Auth::attempt($credentials)) {
            return response()->json(['auth' => 'ok'], 200);
            //  return view('admin.admin');
        }else {
            return response()->json(['auth' => 'not'], 200);
        }
        return back()->withInput($request->only('email', 'remember'));
    }

}
