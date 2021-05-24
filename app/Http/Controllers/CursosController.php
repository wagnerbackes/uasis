<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursosFormRequest;
use App\Models\Curso;
use Illuminate\Http\Request;
use stdClass;

class CursosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){

        $cursos = Curso::all();

        $mensagem= $request->session()->get('mensagem');

        return view('cursos.index', ['cursos'=>$cursos, 'mensagem'=>  $mensagem]);
    }

    public function create(Request $request)
    {
        return view('cursos.create');
    }

    public function store(CursosFormRequest $request)
    {
        // $curso = Curso::create($request->all());
        $curso = Curso::create([
            'nome' => $request->nome,
            'status' => $request->status
        ]);

        return redirect()->route('listar_cursos')->with('mensagem',"<b>Curso criado!!</b> <br/>Nome: {$curso->nome} - Status: {$curso->status}");
    }

    public function destroy(Request $request)
    {
        Curso::destroy($request->id);

        return redirect()->route('listar_cursos')->with('mensagem', "<b>Curso removido com sucesso!!</b>");;
    }
}