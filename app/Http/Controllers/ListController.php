<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
        //return to view template
        public function index(){
            return view('admin.list.index');
        }
}
