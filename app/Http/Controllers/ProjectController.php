<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    function page(Request $request)
    {

    }

    function projectData(Request $request)
    {
        return DB::table('projects')->first();
    }

    function addProjectData(Request $request)
    {
        try {
           Project::create([
               'title' => $request->input('title'),
               'previewLink' => $request->input('previewLink'),
               'thumbnailLink' => $request->input('thumbnailLink'),
               'details' => $request->input('details')
           ]);
           return response()->json([
               'success' => 'success',
               'message' => 'Project added successfully!'
           ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Project failed to add!'
            ],200);
        }
    }

}
