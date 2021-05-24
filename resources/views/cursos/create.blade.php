@extends('layout')

@section('title')
Novo Curso
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="/cursos" class="btn btn-primary mb-2">Voltar</a>
        <form method="POST"> 
        @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp">
                <div id="nomeHelp" class="form-text">Insira o nome para o curso.</div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status">
                    <option selected value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
                <div id="nomeHelp" class="form-text">Escolha ativo para permitir a insersão dos alunos no curso.</div>
            </div>
            <button class="btn btn-success ">Salvar</button>
        </form>
@endsection