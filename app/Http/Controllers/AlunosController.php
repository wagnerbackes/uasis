<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunosFormRequest;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){

        $fra        = $request->query('ra_filtro');
        $fnome      = $request->query('nome_filtro');
        $fstatus    = $request->query('status_filtro');
        $fcurso     = $request->query('curso_filtro');


        $alunos =DB::table('alunos');

        if (!empty($fra)) {
           $alunos->where('ra', 'like', '%'.$fra);
        } 
        if (!empty($fnome)) {
            $alunos->where('nome', 'like', '%'.$fnome .'%');
        }
        if (!empty($fstatus)) {
            $alunos->where('status', 'like', '%'.$fstatus .'%');
        }
      
        $alunos = $alunos->get();
            
        return view('alunos.index')
        ->with('alunos', $alunos)
        ->with('ra_filtro', $fra)
        ->with('nome_filtro', $fnome )
        ->with('status_filtro', $fstatus)
        ->with('curso_filtro', $fcurso);

        return view('alunos.index', ['alunos'=>$alunos]);
    }

    public function create(Request $request)
    {
        $cursos = DB::table('cursos')
                ->where('status', '=', 'ativo')
                ->orderBy('nome')
                ->get();

        return view('alunos.create', ['cursos'=>$cursos] );
    }

    public function store(AlunosFormRequest $request)
    {
        $alunoDados = $request->all();

        //convertendo data para o formato do MYSQL
        $data = strtotime( $alunoDados['data_nascimento'] ); 
        $alunoDados['data_nascimento'] = date( 'Y-m-d H:i:s', $data ); 

        $aluno = Aluno::create($alunoDados);

        return redirect()->route('listar_alunos')->with('mensagem',"<b>Aluno cadastrado!!</b> <br/>Nome: {$aluno->nome} - Status: {$aluno->status}");
    }

    public function destroy(Request $request)
    {
        // var_dump($request->ra);
        var_dump(DB::table('alunos')->where('ra', '=', $request->ra)->delete());

        return redirect()->route('listar_alunos')->with('mensagem', "<b>Aluno removido com sucesso!!</b>");;
    }
}