<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function Logout(){
    	Auth::logout();
    	return Redirect()->route('login');

    }




}
 