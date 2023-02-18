@extends('Modele.welcome')
@section('title','RechercheCours')
@section('contenu')

<h3>Recherche d'un Cours </h3>
<div>
    <p style="color: green">Faites votre recherche en utilisant ce formulaire</p>
    <form  action="{{route('recherchecours.admin')}}" method="post">
    	<br>
    
    		<label for="intitule">Nom du cours: </label><br>
            <input type="text" name="intitule" ><br> <br>


            <input type="submit" class="btn btn-outline-primary" value="Chercher">

        @csrf
    </form>
    
</div>

@endsection