<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffectationController extends Controller
{
    
    public function index() {
        return view("Affectations.index");
    }

    public function create() {
        return view("Affectations.create");
    }

}
