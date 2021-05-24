@extends('layout')

@section('title')
Cadstro de Aluno
@endsection

@section('content')

{{$errors}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="/usuarios" class="btn btn-primary mb-2">Voltar</a>
        <form method="POST" id="formUsuario"> 
        @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:* </label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login: * </label>
                <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" aria-describedby="celularHelp">
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <select class="form-select" id="tipo" name="tipo">
                    <option selected value="administrador">Administrador</option>
                    <option value="usuario">Usuário</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status">
                    <option selected value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
                <div id="nomeHelp" class="form-text">Escolha o status.</div>
            </div>
            <button class="btn btn-success ">cadastrar</button>
        </form>
@endsection