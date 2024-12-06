<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class userController extends Controller
{
    function userRegister(Request $request){
        try {
            User::create([
                "name"=>$request->input('name'),
                "email"=>$request->input('email'),
                "password"=>$request->input('password'),
                "OTP"=>$request->input('OTP')
            ]);
            return response()->json([
                'status'=>'success',
                'message' => 'User created successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'status'=>'failed',
                'message' => 'User Registration Failed'
            ],200);
        }

    }
    function userLogin(Request $request){
        $count=User::where('email','=',$request->input('email'))
            ->where('password','=',$request->input('password'))
            ->select('id')->first();
        if($count!==null){
            $token=JWTToken::createToken($request->input('email'),$count->id);
            return response()->json([
                'status'=>'success',
                'message'=>'User logged in successfully'
            ],200)->cookie('token',$token,60*24*30);
        } else{
            return response()->json([
                'status'=>'failed',
                'message'=>'unauthorized'
            ],200);
        }
    }

    function SendOTPCode(Request $request){
        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count=User::where('email','=',$email)->count();
        if($count==1){
            // Send OTP to user mail
            Mail::to($email)->send(new OTPMail($otp));
            // Store OTP to user table
            User::where('email','=',$email)->update(['OTP'=>$otp]);
            return response()->json([
                'status'=>'success',
                'message'=>'OTP sent successfully'
            ],200);
        }
        else{
            return response()->json([
                'status'=>'failed',
                'message'=>'unauthorized'
            ],200);
        }

    }

    function VerifyOTP(Request $request)
    {
        $email=$request->input('email');
        $otp=$request->input('OTP');
        $count=User::where('email','=',$email)->where('otp','=',$otp)->count();

        if($count==1){
            // Database OTP Update
            User::where('email','=',$email)->update(['OTP'=>'0']);
            // Password Reset Token Issue
            $token=JWTToken::createTokenForPasswordReset($request->input('email'));
            return response()->json([
                'status'=>'success',
                'message'=>'User logged in successfully',
                'token'=>$token
            ],200);
        }
        else{
            return response()->json([
                'status'=>'failed',
                'message'=>'unauthorized'
            ],200);
        }
    }

    function ResetPassword(Request $request)
    {
        try {
            $email=$request->header('email');
            $password=$request->input('password');
            User::where('email','=',$email)->update(['password'=>$password]);
            return response()->json([
                'status'=>'success',
                'message'=>'Password reset successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'status'=>'failed',
                'message'=>'unauthorized'
            ],200);
        }
    }

}
