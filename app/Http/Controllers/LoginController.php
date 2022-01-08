<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(LoginRequest $request){
        if(auth()->attempt($request->validated())) 
        {
           return redirect()->route('home'); 
        }
        else{
            return view("login")->withErrors(['msg' => 'User not found!']);
        }
    }
}
