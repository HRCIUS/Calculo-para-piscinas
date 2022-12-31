<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Piscina extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
