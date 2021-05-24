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

    <a href="/alunos" class="btn btn-primary mb-2">Lista de Alunos</a>
        <form method="POST" id="formAluno"> 
        @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp">
                <div id="nomeHelp" class="form-text">Insira o nome completo do aluno.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:* </label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Insira o email do aluno.</div>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF: * </label>
                <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="cpfHelp">
                <div id="cpfHelp" class="form-text">Insira o cpf do aluno.</div>
            </div>
            <div class="mb-3">
                <label for="celular" class="form-label">Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" aria-describedby="celularHelp">
                <div id="celularHelp" class="form-text">Insira o celular do aluno.</div>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Genero:</label>
                <select class="form-select" id="genero" name="genero">
                    <option selected value="femenino">Femenino</option>
                    <option value="masculino">Masculino</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de nascimento:</label>
                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" aria-describedby="data_nascimentoHelp">
                <div id="data_nascimentoHelp" class="form-text">Insira a data de nascimento do aluno.</div>
            </div>
            @if (!empty($cursos))
            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso:</label>
                <select class="form-select" id="curso_id" name="curso_id">
                @foreach ($cursos as $curso)
                    <option value="{{$curso->id}}">{{$curso->nome}}</option>
                @endforeach
                </select>
            </div>
            @endif
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status">
                    <option selected value="ativo">Ativo</option>
                    <option value="aguardando">Aguardando</option>
                    <option value="trancado">Trancado</option>
                    <option value="desistente">Desistente</option>
                    <option value="transferido">Transferido</option>
                </select>
                <div id="nomeHelp" class="form-text">Escolha o status do aluno.</div>
            </div>
            <button class="btn btn-success ">Salvar</button>
        </form>

        <!-- Maskara para os campos do Formulário -->
        <script type="text/javascript">
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00', {reverse: true});
            $('#data_nascimento').mask('00/00/0000');
            $('#celular').mask('(00)00000-0000');
            $("#formAluno").submit(function() {
                $("#cpf").unmask();
            });
        });
        </script>

@endsection