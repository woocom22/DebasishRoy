<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ContactController extends Controller
{
    function page(Request $request)
    {

    }
    function contactRequest(Request $request){
        return DB::table('contacts')->first();
    }

    function addContact(Request $request){
        try {
            Contact::create([
                'fullName'=>$request->input('fullName'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'message'=>$request->input('message')
            ]);
            return response()->json([
                'success'=>'success',
                'message'=>'Thanks for contacting us!'
            ],200);
        }
        catch (Exception $e){
            return response()->json([
                'success'=>'failed',
                'message'=>'Contact add failed!'
            ],200);
        }
    }
}
