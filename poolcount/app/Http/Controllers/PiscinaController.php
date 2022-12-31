<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Piscina;
use Illuminate\Http\Request;
use mysqli;

class PiscinaController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function dashboard()
    {
        $user = auth()->user();
        $piscinas = Piscina::where('user_id', "=", $user -> id);
        return view('dashboard', ["user"=>$user, "piscinas" => $piscinas]);
    }
}
