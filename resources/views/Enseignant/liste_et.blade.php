@extends('Modele.welcome')
@section('title', 'Liste des étudiants ')
@section('contenu')
<h1>Etudiants associés à la séance n° {{$Seance->id}}</h1>
<h5>Cours sélectionné {{$Cours->intitule}}</h5>
    
<form method="post" action = "{{route('pointageperso.enseignant',['id' => $Seance -> id, 'idd' => $Cours -> id])}}" >
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

<input type="submit" value="Présent">

</div>
@csrf
</form>
@endsection
