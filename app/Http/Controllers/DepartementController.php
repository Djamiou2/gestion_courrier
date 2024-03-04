<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        return view('Departements.index');
    }

    public function create()
    {
        return view('Departements.create');
    }

    public function edit(Departement $departement)
    {
        return view('Departements.edit', compact('departement'));
    }
}
