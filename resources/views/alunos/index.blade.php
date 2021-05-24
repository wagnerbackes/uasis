@extends('layout')

@section('title')
Alunos
@endsection

@section('content')
    <!-- exibe mensagens se houver -->
    @if(isset($mensagem) && !empty($mensagem))
    <div class="alert alert-primary" role="alert">
            {!! $mensagem !!}
    </div>
    @endif

    <!-- botão para cadastrar novo aluno -->
    <a href="{{route('form_criar_aluno')}}" class="btn btn-primary mb-2">Cadastrar Aluno</a>

    <!-- lista de alunos -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">RA</th>
                <th scope="col">Nome</th>
                <th scope="col">Status</th>
                <th scope="col">Curso</th>
                <th scope="col">Ações</th>
            </tr>
            <tr>
            <form action="alunos" id="filtro">
                @csrf                
                <th scope="col"><input class="form-control" type="text" id="ra_filtro" name="ra_filtro" value="{{$ra_filtro}}"></th>
                <th scope="col"><input class="form-control" type="text" id="nome_filtro" name="nome_filtro" value="{{$nome_filtro}}"></th>
                <th scope="col"><input class="form-control" type="text" id="status_filtro" name="status_filtro" value="{{$status_filtro}}"></th>
                <th scope="col"><input class="form-control" type="text" id="curso_filtro" name="curso_filtro" value="{{$curso_filtro}}"></th>
                <th scope="col">
                <button class="btn btn-success">Filtrar</button>
                <input type="reset" class='btn btn-warning'value="X">
                </th>
                </form>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
            <th scope="row"> {{$aluno->ra}}</th>
                <td> {{$aluno->nome}}</td>
                <td> {{$aluno->status}}</td>
                <td> Curso</td>
                <!--  ações -->
                <td>
                    <form method="post" action="alunos/{{$aluno->ra}}"
                    onsubmit="return confirm('Realmente deseja remover o aluno {{$aluno->nome}}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                </td>
                <!-- End Ações -->
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection