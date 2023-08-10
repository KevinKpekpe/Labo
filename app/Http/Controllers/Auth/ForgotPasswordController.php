<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(){
        return view('auth.forgot-password');
    }
    public function forgotPasswordPost(Request $request){
        $request->validate(
            ['email' => 'required|email|exists:users']
        );

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("emails.forget-password",['token'=>$token],function($message) use ($request){
            $message->to($request->email);
            $message->subject("Reinitialisation du Mot de passe");
        });

        return redirect()->back()->with('success','Vous avez recu un email de recuperation');
    }
    public function resetPassword($token){
        return view('auth.new-password',['token' => $token]);
    }
    public  function resetPasswordPost(Request $request){
        $request->validate([
            'email'=> 'required|email|exists:users',
            'password'=>'required|string|min:6|confirmed',
            'password_confirmation'=>'required'
        ]);
        $updatePassword = DB::table('password_reset_tokens')
        ->where(['email' => $request->email,'token' => $request->token])->first();
        if(!$updatePassword){
            return redirect()->back()->with('error', 'Invalid');
        }
        User::where('email', $request->email)->update(['password' => bcrypt($request->password)]);

        DB::table('password_reset_tokens')->where(["email"=>$request->email])->delete();

        return redirect()->to(route('login'))->with('success', 'Password Reset Success');
    }
}
