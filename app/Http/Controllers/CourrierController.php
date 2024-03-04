<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
    public function index()
    {
        return view('courriers.index');
    }

    public function create()
    {
        return view('courriers.create');
    }

    public function edit(Courrier $courrier)
    {
        return view('courriers.edit', compact('courrier'));
    }

    public function show(Courrier $courrier)
    {
        return view('courriers.show', compact('courrier'));
    }
}
