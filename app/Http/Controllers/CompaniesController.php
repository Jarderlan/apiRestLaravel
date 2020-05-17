<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(){
        $companies = Company::all();
        return response()->json($companies);
    }

    public function show($id){
        $company = Company::find($id);
        if(!$company){
            return response()->json(['messaje' => 'Id Não Encontrado'], 404);
        }
        return response()->json($company);
    }

    public function store(Request $request){
        $company = new Company();
        $company->fill($request->all());
        $company->save();

        return response()->json($company, 201);
    }

    public function update(Request $request, $id){
        $company = Company::find($id);
        if(!$company){
            return response()->json(['message'=>'Registro Não Encontrado!'], 404);
        }
        $company->fill($request->all());
        $company->save();

        return response()->json($company);
    }

    public function destroy($id){
        $company = Company::find($id);
        if(!$company){
            return response()->json(['message'=>'Registro Não Encontrado!'], 404);
        }
        
        $company->delete();
    }
}
