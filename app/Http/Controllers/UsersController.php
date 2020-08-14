<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    public function save(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required', 
        ]); 
        if ($req->id) { 
            $user = User::find($req->id);
        }else{
            $user = new User;
        }   
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = 'secrets'; 
        $user->save();
        return User::all(); 
    }
    public function delete(Request $req){
        $user = User::find($req->id);

        $user->delete();
    }
    public function show(){
        return User::all();  
    }

}
