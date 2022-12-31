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
    public function cadastro()
    {
        return view('user.cadastro');
    }
    public function cadastrado(Request $request){
        $user = auth()->user();

        $piscina = new Piscina;

        $piscina -> nome = $request -> nome;
        $piscina -> local = $request -> local;
        $piscina -> alturaMax_em_cm = $request -> alturaMaior;
        $piscina -> alturamin_em_cm = $request -> alturaMenor;
        $piscina -> largura_em_cm = $request -> largura;
        $piscina -> formato = $request -> formato;
        $piscina -> margem_em_cm = $request -> nivel - $request->alturaMaior;
        $piscina -> user_id = $user->id;

        if($piscina -> formato == "circular" && $piscina -> alturamin_em_cm != ""){
            $r = $piscina->largura/2;
            $v = pi() * ($r**2) * (($piscina->alturaMax_em_cm - $piscina->margem_em_cm) + ($piscina->alturamin_em_cm- $piscina->margem_em_cm));
            $piscina -> volume = ($v/2)/1000000;

        }else if($piscina -> formato == "circular" && $piscina -> alturamin_em_cm == ""){
            $r = $piscina->largura/2;
            $v = pi() * $r**2 * $request->nivel;
            $piscina -> volume = $v/1000000;
        }else if($piscina -> formato == "quadrangular"){
        }
        return redirect("/dashboard")->with("msg", "Dados cadastrados com sucesso");
    }
}
