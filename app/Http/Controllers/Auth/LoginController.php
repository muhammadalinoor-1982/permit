<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $email = $request->email;
        $password = $request->password;

        $validData = User::where('email',$email)->first();
        $password_check = password_verify($password, @$validData->password);

        if($password_check == false)
        {
            session()->flash('message','invalid email or password');
            return redirect()->back();
        }
        if($validData->status == 'inactive')
        {
            session()->flash('message','You are not verified yet');
            return redirect()->back();
        }
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->route('login');
        }
    }
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
    /*protected $redirectTo = RouteServiceProvider::HOME;*/
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
