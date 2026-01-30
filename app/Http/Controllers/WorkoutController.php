<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WorkoutController extends Controller
{
    public function new(Request $request){
        try {
            
            $newWorkoutWhat=$request->input('what') ?? 1;
            $newWorkoutFar=$request->input('far') ?? 0;
            $newWorkoutTime=$request->input('time') ?? 0;
            $newWorkoutDesc=$request->input('comment') ?? "problems with saving";
            $newWorkoutDate=$request->input('date') ?? "2025-11-5";
            $newWorkoutBorg=$request->input('borg') ?? 6;

            //dd($newWorkoutBorg);
            //add to database
            DB::table('workouts')->insert([
                'activityId' => $newWorkoutWhat,
                'far' => $newWorkoutFar,
                'time' => $newWorkoutTime,
                'date' => $newWorkoutDate,
                'comment' => $newWorkoutDesc,
                'borg' => $newWorkoutBorg
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
            $workouts = DB::table('workouts')->get();

            return response()->json(['data' => $workouts, 'error' => "no error"]);
        } catch (\Exception $e) {
            return response()->json(['data' => null, 'error' => $e->getMessage()]);
        }
    }

    public function delete(Request $request){
        try {
            $id = filter_var($request->route('id'), FILTER_VALIDATE_INT);

            DB::table('workouts')->where('id', $id)->delete();
            
            return response()->json(['data' => "workout deleted", 'error' => "no error"]);
        } catch (\Exception $e) {
            response()->json(['data' => null, 'error' => $e->getMessage()]);
        }

    }
}