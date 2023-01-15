<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrandPostController extends Controller
{
    //return to view template
    public function index(){
        return view('admin.trend_post.index');
    }
}
