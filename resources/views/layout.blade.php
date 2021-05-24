<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
<div class="container">
    
  
<!-- header -->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">UA-Sistema</span>
      </a>  
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="/usuarios" class="nav-link {{ (request()->is('usuarios*')) ? 'active' : '' }}">Usuarios</a></li>
        <li class="nav-item"><a href="/cursos" class="nav-link {{ (request()->is('cursos*')) ? 'active' : '' }}">Cursos</a></li>
        <li class="nav-item"><a href="/alunos" class="nav-link {{ (request()->is('alunos*')) ? 'active' : '' }}">Alunos</a></li>
        <li class="nav-item"><a href="/logout" class="nav-link"></a>
        <li class="nav-item">
          <a class="nav-link" href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sair</a>
          <form id="logout-form" action="/logout" method="POST" class="d-none">@csrf</form>
        </li>
       
      </ul>
    </header>
  </div>
  <div class="container">
    <h1 class="text-center">@yield('title')</h1><hr/>

    @yield('content')
  </div>
</body>
</html>