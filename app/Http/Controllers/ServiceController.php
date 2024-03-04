<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('Services.index');
    }

    public function create()
    {
        return view('Services.create');
    }

    public function edit(Service $service)
    {
        return view('Services.edit', compact('service'));
    }
}
