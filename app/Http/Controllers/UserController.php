<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('utilisateurs.index');
    }

    public function create()
    {
        return view('utilisateurs.create');
    }

    public function edit(User $user)
    {
        return view('utilisateurs.edit', compact('user'));
    }

}
