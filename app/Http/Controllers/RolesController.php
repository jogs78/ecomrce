<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function cliente(){
        return view('Cliente');
    }
    public function contador(){
        return view('contador');
    }
    public function encargado(){
        return 'encargado';
    }
    public function supervisor(){
        return 'supervisor';
    }
    public function vendedor(){
        return 'vendedor';
    }
}
