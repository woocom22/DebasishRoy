<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Mockery\Exception;

class EducationController extends Controller
{
    function addEducation(Request $request){
        try {
            Education::create([
                'duration'=>$request->input('duration'),
                'institutionName'=>$request->input('institutionName'),
                'location'=>$request->input('location'),
                'degree'=>$request->input('degree'),
                'field'=>$request->input('field'),
                'details'=>$request->input('details')
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Education added successfully'
            ],200);
        }
        catch (Exception $e){
            return response()->json([
                'status'=>'success',
                'message'=>'Education failed to add'
            ],200);
        }

    }
}
