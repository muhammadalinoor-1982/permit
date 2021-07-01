<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustPrivController extends Controller
{
    public function custSignIn()
    {
        $data['title'] = 'SignIn';
        return  view('Frontend.SignIn.SignIn',$data);
    }
    public function custSignUp()
    {
        $data['title'] = 'SignUp';
        return  view('Frontend.SignUp.SignUp',$data);
    }
    public function custStore(Request $request){
        DB::transaction(function ()use($request){
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required|unique:users,email'
            ]);
            $verification_code = rand(0000,9999);
            $user=new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->verification_code = $verification_code;
            $user->save();

            $data = array(
                'email' => $request->email,
                'verification_code' => $verification_code
            );

            Mail::send('Frontend.EmailVerification.EmailVerification',$data, function ($message) use($data){
                $message->from('aupuchowdhhhury@gmail.com','Permit Verification Test Mail');
                $message->to($data['email']);
                $message->subject('Please verify your email');
            });

        });

        session()->flash('message','A Verification code has been send to your email address, please check your email and verify it..!!!');
        return redirect()->route('EmailVerification');
    }
    public function EmailVerification()
    {
        $data['title'] = 'EmailVerification';
        return  view('Frontend.Verify.Verify',$data);
    }
    public function verifyStore(Request $request){
        $checkData = User::where('email',$request->email)->where('verification_code',$request->verification_code)->first();
        if($checkData){
            $checkData->status = 'active';
            $checkData->save();
            session()->flash('message','Your account has been send varified, please signin');
            return redirect()->route('custSignIn');
        }else{
            session()->flash('message','Your email or verification code is invalid');
            return redirect()->back();
        }
    }
}
