<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class SkillController extends Controller
{
    function addSkill(Request $request)
    {
        try {
            Skill::create([
                'name' => $request->input('name')
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Skill added successfully!'
            ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Skill added failed!'
            ],200);
        }
    }

    function skillData()
    {
        return DB::table('skills')->first();
    }
}
