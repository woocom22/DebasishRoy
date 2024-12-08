<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Mockery\Exception;

class ExperienceController extends Controller
{
    function addExperience(Request $request)
    {
        try {
            Experience::create([
                'duration'=>$request->input('duration'),
                'title'=>$request->input('title'),
                'designation'=>$request->input('designation'),
                'details'=>$request->input('details')
            ]);
            return response()->json([
                'success'=>'success',
                'message'=>'Experience added successfully!'
            ],200);
        }
        catch (Exception $exception){
            return response()->json([
                'success'=>'success',
                'message'=>'Experience not added!'
            ],200);
        }
    }
}
