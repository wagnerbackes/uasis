@extends('layout')

@section('title')
Cursos
@endsection

@section('content')
    <!-- exibe mensagens se houver -->
    @if(isset($mensagem) && !empty($mensagem))
    <div class="alert alert-primary" role="alert">
            {!! $mensagem !!}
    </div>
    @endif

    <!-- botão para criar novo curso -->
    <a href="{{route('form_criar_curso')}}" class="btn btn-primary mb-2">Novo Curso</a>

    <!-- lista de cursos -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
            <th scope="row"> {{$curso->id}}</th>
                <td> {{$curso->nome}}</td>
                <td> {{$curso->status}}</td>
                <!--  ações -->
                <td>
                    <form method="post" action="cursos/{{$curso->id}}"
                    onsubmit="return confirm('Realmente deseja remover o curso {{$curso->nome}}?')">
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