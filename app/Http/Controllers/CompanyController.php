<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;


class CompanyController extends Controller
{
    public function save(Request $req){
        $req->validate([
            'name'=>'required',
            'address'=>'required',
            'tin'=>'required'
        ]);
        
        $comp = Company::find(1); 
        $comp->name = $req->name;
        $comp->address = $req->address;
        $comp->tin = $req->tin; 
 
        $comp->save();
        return Company::all(); 
    }
    public function show(){
        return Company::all();  
    }

}
