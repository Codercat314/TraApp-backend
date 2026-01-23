<?php

//namespace App\Http\Controllers\api\v2;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller{
    public function new(Request $request){
        
        try {
            
            $newActivityName=$request->input('name');
            $newActivityFarBool=$request->input('farBool') ? 1 : 0;
            $newActivityTimeBool=$request->input('timeBool') ? 1 : 0;

            $newActivityFarUnit = $newActivityFarBool ? $request->input('farUnit') ?? "m" : 0;
        
            $newActivityTimeUnit = $newActivityTimeBool ? $request->input('timeUnit') ?? "min" : 0;
            
            
            

            //add to database
            DB::table('Activities')->insert([
                'name' => $newActivityName,
                'farBool' => $newActivityFarBool,
                'farUnit' => $newActivityFarUnit,
                'timeBool' => $newActivityTimeBool,
                'timeUnit' => $newActivityTimeUnit
                ]);
                /*
                */
                return response()->json(['data' => "successfully saved", 'error' => "no error"]);
        } catch (\Exception $e) {
            return response()->json(['data' => null, 'error' => $e->getMessage()]);
        }
    }
    public function getAll(){
        try {
            $activities = DB::table('Activities')->get();

            return response()->json(['data' => $activities, 'error' => "no error"]);
        } catch (\Exception $e) {
            return response()->json(['data' => null, 'error' => $e->getMessage()]);
        }
        
    }

    public function deleteActivity(Request $request){
        try {
            $id = filter_var($request->route('id'), FILTER_VALIDATE_INT);

            DB::table('Activities')->where('id', $id)->delete();
            
            return response()->json(['data' => "Activity deleted", 'error' => "no error"]);
        } catch (\Exception $e) {
            response()->json(['data' => null, 'error' => $e->getMessage()]);
        }

    }



}