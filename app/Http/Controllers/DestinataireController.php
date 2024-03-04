<?php

namespace App\Http\Controllers;

use App\Models\Destinataire;
use Illuminate\Http\Request;

class DestinataireController extends Controller
{
      public function index()
    {
        return view('Destinataires.index');
    }

    public function create()
    {
        return view('Destinataires.create');
    }

    public function edit(Destinataire $destinataire)
    {
        return view('Destinataires.edit', compact('destinataire'));
    }
    public function show(Destinataire $destinataire)
    {
        return view('Destinataires.show', compact('destinataire'));
    }
}
