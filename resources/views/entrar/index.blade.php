@extends('loggin')

@section('title')
Acesso ao Sistema - UA-SIS
@endsection

@section('content')
    <!-- exibe mensagen de erro se houver -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- lista de alunos -->
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">Login</label>
            <input type="text" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>
    </form>
@endsection