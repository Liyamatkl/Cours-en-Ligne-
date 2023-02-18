@extends('Modele.welcome')
@section('title','Recherche')
@section('contenu')

<h3>Recherche d'un étudiant </h3>
<div>
    <form  action="{{route('recherche.gestionnaire')}}" method="post">
    	<br>
    
    		<label for="nom">Nom </label><br>
            <input type="text" name="nom" ><br> <br>

            <label for="prenom">Prenom </label><br>
            <input type="text" name="prenom" ><br> <br>

            <input type="submit" class="btn btn-outline-primary" value="Chercher">

        @csrf
    </form>
</div>

@endsection