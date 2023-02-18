<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>@yield('title')</title>
    <style>
.etat {background-color: lightgreen;}
*{list-style: none}
table{
    border: 1px solid black;
    border-collapse:collapse;
}
td{
    border: 1px solid black;
    padding:7px;
}

a:hover {
  background-color: gold;
}

a {
  text-decoration: none;
  transition:0.3s;
} 

a:visited{
    color:#000;
}


*{
    padding:8px;
    margin: 0;
    font-family:fantasy,sans-serif;
    background-color: #FEE9AE;
    /* faebeb */
    
}
</style>
</head>
<body>

@auth
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid">
  <a class="navbar-brand" href="{{route('redirect')}}">CourEnLigne® </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    @auth
    <li class="nav-item">
        <a class="nav-link" style="color:red" href="{{route('redirect')}}">| Accueil |</a>
        </li>
        @endauth 
        @if(Auth::user()->type == 'gestionnaire')
      <li class="nav-item">
        <a class="nav-link disabled" href="">Action</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('enseignant.gestionnaire')}}">Enseignant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('etudiant.gestionnaire')}}">Etudiant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ptseance.gestionnaire')}}">Séance & Cours</a>
      </li>
      @endif
       @if(Auth::user()->type == 'admin')
      <li class="nav-item">
        <a class="nav-link disabled" href="">Partie Gestionnaire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: brown" href="{{route('gestionnaire.acceuil')}}">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('enseignant.gestionnaire')}}">Enseignant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('etudiant.gestionnaire')}}">Etudiant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ptseance.gestionnaire')}}">Séance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="">Partie Enseignant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: brown" href="{{route('enseignant.acceuil')}}">Accueil</a>
      </li>
       @endif
      @auth
      <li class="nav-item">
        <a class="nav-link" style="color: blue" href="{{route('logout')}}">| Se deconnecter |</a>
        </li>
        @endauth
    </ul>
    </div>
  </div>
</nav>


<p>Bonjour {{ Auth::user()->login}} </p>
@endauth
@guest
<center>
<h1>Bienvenue chez CourEnLigne®</h1>

<li> <a href= "">Se connecter</a></li>
<li><a href = "">S'inscrire</a></li>

</center>
@endguest


@yield('contenu')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
crossorigin="anonymous"></script>


@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if( session()->has('etat'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{session()->get('etat')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
