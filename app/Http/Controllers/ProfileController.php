<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //return to view template
    public function index(){
        return view('admin.profile.index');
    }
}
