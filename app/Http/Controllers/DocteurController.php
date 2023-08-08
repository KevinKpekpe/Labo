<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocteurController extends Controller
{
    public function index(){
        return view('docteur.index');
    }
}


