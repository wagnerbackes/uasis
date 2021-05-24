<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuariosFormRequest;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', ['usuarios'=>$usuarios]);
    }

    public function create(Request $request)
    {
        return view('usuarios.create');
    }

    public function store(UsuariosFormRequest $request)
    {
        $data = $request->except('_token');

        $data['senha'] = Hash::make($data['senha']);

        $usuario = Usuario::create($data);
        
        return redirect()->route('listar_usuarios')->with('mensagem',"<b>Usuário cadastrado!!</b> <br/>Nome: {$usuario->nome} - Status: {$usuario->status}");
    }

    public function destroy(Request $request)
    {
        return redirect()->route('listar_usuarios')->with('mensagem', "<b>Usuário removido com sucesso!!</b>");;
    }
}