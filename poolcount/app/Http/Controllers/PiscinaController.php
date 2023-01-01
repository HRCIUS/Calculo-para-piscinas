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
       
        return view('dashboard', ["user"=>$user]);
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
        if($request->formato == 'circular'){
            $piscina -> comprimento = null;
        }else{
            $piscina -> comprimento = $request -> comprimento;
        }
        $piscina -> formato = $request -> formato;
        $piscina -> margem_em_cm = $request -> nivel;
        $piscina -> user_id = $user->id;
        $piscina->volume = 0;
        if($request -> formato == "circular" && $request -> alturaMenor != ""){
            $r = $request->largura/2;
            $v = pi() * ($r**2) * (($request->alturaMaior - $request->nivel) + ($request->alturaMenor- $request->margem_em_cm));
            $piscina -> volume = ($v/2)/1000000;

        }else if($request -> formato == "circular" && $request -> alturaMenor == ""){
            $r = $request->largura/2;
            $v = pi() * $r**2 * ($request->alturaMaior - $request->nivel);
            $piscina -> volume = $v/1000000;
        }else if($request -> formato == "quadrangular" && $request -> alturaMaior != "" && $request -> comprimento != ""){
            $v = (($request -> alturaMaior - $request->nivel) + ($request->alturaMenor - $request->nivel)) * $request->comprimento;
            $v = $v/2;
            $v = $v * $request->largura;
            $v = $v/1000000;
            $piscina->volume = $v;
        }else if($request -> formato == "quadrangular" && $request -> alturaMaior == "" && $request -> comprimento != ""){
            $v = $request->largura * $request->comprimento * ($request->alturaMaior - $request->nivel);
            $piscina->volume = $v/1000000;
        }
        $piscina->quant_total_cloro = (4 * $piscina->volume * 15)/1000;
        $piscina->quant_total_clarificante = (5 * $piscina->volume * 2)/1000;
        $piscina->controle_de_ph = (20 * $piscina->volume)/1000;
        $piscina->quant_total_sulfato = (30 * $piscina->volume * 3)/1000;

        $piscina->save();
        return redirect("/dashboard")->with("msg", "Cadastro realizado com sucesso");
    }
    public function piscinas()
    {
        $user = auth()->user();
        $piscinas = Piscina::where('user_id', "=", $user -> id)->get();
        return view("user.piscinas", ["piscinas" => $piscinas]);
    }
    public function detalhes($id)
    {
        $piscina = Piscina::findOrFail($id);
        return view("user.detalhes", ["piscina" => $piscina]);
    }
    public function destroy($id)
    {
        Piscina::findOrFail($id)->delete();
        return redirect('/piscinas')->with('msg', 'Exclusão realizada com sucesso');
    }
    public function edit($id)
    {
        $piscina = Piscina::findOrFail($id);
        return view('user.edit', ["piscina" => $piscina]);
    }
    public function update(Request $request)
    {
        $piscina = Piscina::findOrFail($request -> id) -> update($request->all());
        return redirect('/piscinas')->with('msg', 'Edição realizada com sucesso');
    }
}
