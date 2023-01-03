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
        $piscina = Piscina::find($id);
        $v = 0;
        if($piscina -> formato == "circular" && $piscina -> alturamin_em_cm != ""){
            $r = $piscina->largura_em_cm/2;
            $v = pi() * ($r**2) * (($piscina->alturaMax_em_cm - $piscina->margem_em_cm) + ($piscina->alturamin_em_cm- $piscina->margem_em_cm));
            $v = ($v/2)/1000000;

        }else if($piscina -> formato == "circular" && $piscina -> alturamin_em_cm == ""){
            $r = $piscina->largura_em_cm/2;
            $v = pi() * $r**2 * ($piscina->alturaMax_em_cm - $piscina->margem_em_cm);
            $v = $v/1000000;
        }else if($piscina -> formato == "quadrangular" && $piscina -> alturamin_em_cm != "" && $piscina -> comprimento != ""){
            $v = (($piscina -> alturaMax_em_cm - $piscina->margem_em_cm) + ($piscina->alturamin_em_cm - $piscina->margem_em_cm)) * $piscina->comprimento;
            $v = $v/2;
            $v = $v * $piscina->largura_em_cm;
            $v = $v/1000000;
        }else if($piscina -> formato == "quadrangular" && $piscina -> alturamin_em_cm == "" && $piscina -> comprimento != ""){
            $v = $piscina->largura_em_cm * $piscina->comprimento * ($piscina->alturaMax_em_cm - $piscina->margem_em_cm);

        }

        $cloro = (4 * $v * 15)/1000;
        $clarificante = (6 * $v * 2)/1000;
        $controle_de_ph = (20 * $v)/1000;
        $sulfato = (30 * $v * 3)/1000;
        $calculos = ["v"=>$v, "cloro"=>$cloro, "clarificante"=>$clarificante, "ph"=>$controle_de_ph, "sulfato"=>$sulfato];
        return view("user.detalhes", ["piscina" => $piscina, "calculos" => $calculos]);
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
        $piscina = Piscina::find($request -> id) -> update($request->all());
        return redirect('/piscinas')->with('msg', 'Edição realizada com sucesso');
    }
}
