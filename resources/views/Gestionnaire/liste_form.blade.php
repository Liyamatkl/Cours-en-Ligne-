@extends('Modele.welcome')
@section('title', 'Liste des étudiants ')
@section('contenu')
<h1>Liste des étudiants associés au cours {{$Users->intitule}}</h1>
<p style="color:green">Sélectionner pour supprimer l'association au cours "{{$Users->intitule}}"</p>
    <form method="post" action = "{{route('supprimer.gestionnaire',[ 'id' => $Users -> id ])}}" >
<div class="input-group">

@forelse($Etudiant as $n)
       <div class="form-check">
  <input class="form-check-input" type="checkbox" value="{{$n->id}}" id="flexCheckDefault" name="Etudiant[{{$n->id}}]">
  <label class="form-check-label" for="flexCheckDefault">
     {{$n->nom}} {{$n->prenom}} {{$n->noet}}
  </label>
        
@empty
<p style="color:red"> Pas d'étudiants !</p>


    @endforelse


<br>
<br>
@if (!$Etudiant->isEmpty()) 
<input type="submit" value="Supprimer">
@endif
</div>
@csrf
</form>

@endsection