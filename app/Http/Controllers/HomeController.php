<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HeroProperty;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class HomeController extends Controller
{
    function page(Request $request)
    {

    }
    function heroData(Request $request)
    {
        return DB::table('hero_properties')->first();
//        return HeroProperty::where('user_id',$user_id)->get();
    }
    function aboutData(Request $request)
    {
        return DB::table('abouts')->first();
    }

    function socialData(Request $request){
        return DB::table('socials')->first();
    }


    // Extra section for insert, update, delete start

    function addHero(Request $request)
    {
        $user_id=$request->header('id');
        try {
            HeroProperty::create([
                'keyLine'=>$request->input('keyLine'),
                'title'=>$request->input('title'),
                'short_title'=>$request->input('short_title'),
                'img'=>$request->input('img'),
                'user_id'=>$user_id
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Hero Property Added Successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'status'=>'success',
                'message'=>'Hero Property Added Successfully'
            ],200);
        }
    }
    function addAboutData(Request $request){
        try {
            About::create([
                'title'=>$request->input('title'),
                'details'=>$request->input('details')
            ]);
            return response()->json([
               'status'=>'success',
               'message'=>'About Property Added Successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'status'=>'failed',
                'message'=>'About Property Added Successfully'
            ],200);
        }
    }

    function addSocialData(Request $request){
        try {
            Social::create([
                'twitterLink'=>$request->input('twitterLink'),
                'githubLink'=>$request->input('githubLink'),
                'linkedinLink'=>$request->input('linkedinLink')
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Social Property Added Successfully'
            ],200);
        }  catch (Exception $e) {
            return response()->json([
                'status'=>'failed',
                'message'=>'Social Property Added Successfully'
            ],200);
        }
    }
    // Extra section for insert, update, delete end

}
