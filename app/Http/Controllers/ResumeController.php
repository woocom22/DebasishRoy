<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ResumeController extends Controller
{
    function page(Request $request){
        $seo=DB::table('seo_properties')->where('pageName','=','resume')->first();
        return view('pages.resume',['seo'=>$seo]);
    }

    function resumeLink(Request $request)
    {
        return DB::table('resumes')->first();
    }


    function educationData(Request $request)
    {
        return DB::table('education')->get();
    }

    function skillData(Request $request){
        return DB::table('skills')->get();
    }
    function languageData(Request $request){

    }

    function addResume(Request $request){
        try {
            Resume::create([
                'downloadLink'=>$request->input('downloadLink'),
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Resume added successfully!'
            ],200);
        }
        catch (Exception $exception){
            return response()->json([
                'status'=>'failed',
                'message'=>'Resume failed to add!'
            ],200);
        }
    }
}
