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
        $seo=DB::table('seo_properties')->where('pageName','=','contact')->first();
        return view('pages.contact',['seo'=>$seo]);
    }
    function contactRequest(Request $request){
        return DB::table('contacts')->first();
    }

    function addContact(Request $request){
        return DB::table('contacts')->insert($request->input());
    }
}
