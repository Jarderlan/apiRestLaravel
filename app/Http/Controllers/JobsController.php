<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobsController extends Controller
{
    public function index(){
        $jobs = Job::with('company')->get();
        return response()->json($jobs);
    }

    public function show($id){
        $job = Job::find($id);
        if(!$job){
            return response()->json(['message' => 'Id Não Encontrado'], 404);
        }
        return response()->json($job);
    }

    public function store(Request $request){
        $job = new Job();
        $job->fill($request->all());
        $job->save();

        return response()->json($job, 201);
    }

    public function update(Request $request, $id){
        $job = Job::find($id);
        if(!$job){
            return response()->json(['message'=> 'Registro não encontrado'], 404);
        }
        $job->fill($request->all());
        $job->save();

        return response()->json($job);
    }
    public function destroy($id){
        $job = Job::find($id);
        if(!$job){
            return response()->json(['message'=>'Registro Não Encontrado!'], 404);
        }
        $job->delete();
    }
}
