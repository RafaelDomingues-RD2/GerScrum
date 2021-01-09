<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GerScrum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">
        <a class="navbar-brand" href="{{route('home')}}">GerScrum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            @auth
          <ul class="navbar-nav mr-auto">
            </li>
              <a class="nav-link" href="/categorias">Categorias</a>
            </li>
            <li>
              <a class="nav-link" href="/tarefas">Tarefas</a>
            </li>
          </ul>
          <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit(); ">Sair</a>
                    <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
                <li class="nav-item">
                    <span class="nav-link">{{auth()->user()->name}}</span>
                </li>
              </ul>
          </div>
          @endauth
        </div>
      </nav>
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>
