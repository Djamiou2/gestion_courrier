<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
     public function index()
    {
        return view('Profils.index');
    }

    public function create()
    {
        return view('Profils.create');
    }

    public function edit(Profil $profil)
    {
        return view('Profils.edit', compact('profil'));
    }
}
