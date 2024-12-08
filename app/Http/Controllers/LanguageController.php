<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class LanguageController extends Controller
{
    function addLanguage(Request $request)
    {
        try {
            Language::create([
                'name'=>$request->input('name'),
            ]);
            return response()->json([
                'success' => 'success',
                'message' => 'Language added successfully!'
            ],200);
        }
        catch (Exception $exception){
            return response()->json([
                'success' => 'fail',
                'message' => 'Language added failed!'
            ],200);
        }
    }

    function languageData(Request $request)
    {
        return DB::table('languages')->first();
    }
}
