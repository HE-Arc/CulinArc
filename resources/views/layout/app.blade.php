<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CulinArc</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('recipes.index') }}"><img src="{{ asset('images/culinarc_transp.png') }}" alt="Logo CulinArc" class="img-fluid logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                
                <!-- Connecté -->
                @if(Auth::check())
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('favorites') }}">Mes favoris</a>
                  </li>
                  <!-- Admin -->
                  @if(Auth::user()->is_admin === 1)
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('recipes.create') }}">Nouvelle recette</a>
                    </li>
                  @endif
                    <li class="nav-item">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                      <a class="nav-link" href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Se déconnecter
                      </a>
                    </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Créer un compte</a>
                @endif
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">À propos</a>
                </li>
              </ul>
            </div>
        </div>
    </nav>

    <!-- Begin page content -->
    <div class="container mt-3">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success') }}
            </div>
        @endif

        @yield("content")

        <!-- Include scripts -->
        @stack('scripts')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
