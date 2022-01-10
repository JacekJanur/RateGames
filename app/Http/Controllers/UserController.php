<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($user_id)
    {
        return view('user-profile')->with('user', User::find($user_id));;
    }
}
