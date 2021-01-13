<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function showdetails(){
     	return view('welcome', ['name' => 'Welcome']);
     }
}
