<?php

namespace App\Http\Controllers;

use App\Models\Expediteurs;
use Illuminate\Http\Request;

class ExpediteursController extends Controller
{
    public function index()
    {
        return view('Expediteur.index');
    }

    public function create()
    {
        return view('Expediteur.create');
    }

    public function edit(Expediteurs $expediteur)
    {
        return view('Expediteur.edit', compact('expediteur'));
    }

    public function show(Expediteurs $expediteurs)
    {
        return view('Expediteur.show', compact('expediteur'));
    }
}
