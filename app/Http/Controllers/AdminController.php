<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function logout(){
        Session::flush();
        return redirect('/login')->with('success','Logged out Successfully'); 
    }
}
