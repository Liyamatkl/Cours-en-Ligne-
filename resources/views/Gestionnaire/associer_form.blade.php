@extends('Modele.welcome')
@section('title', 'Associer')
@section('contenu')
<h1>Séléctionner un/des étudiant(s)</h1>
<p>Cours séléctionné: {{$Cours -> intitule}}</p>

    <form method="post" action = "{{route('associer.gestionnaire',['id' => $Cours -> id])}}" >
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

<input type="submit" value="Associer">

</div>
@csrf
</form>
@endsection