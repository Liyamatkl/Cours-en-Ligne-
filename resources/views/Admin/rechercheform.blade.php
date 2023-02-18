@extends('Modele.welcome')
@section('title','Recherche')
@section('contenu')

<h3>Recherche d'un utilisateur </h3>
<div>
    <p style="color: green">Faites votre recherche en utilisant un des formulaires</p>
    <form  action="{{route('recherchenom.admin')}}" method="post">
    	<br>
    
    		<label for="nom">Nom </label><br>
            <input type="text" name="nom" ><br> <br>


            <input type="submit" class="btn btn-outline-primary" value="Chercher">

        @csrf
    </form>
    <br>
    <form  action="{{route('rechercheprenom.admin')}}" method="post">
    	<br>

            <label for="prenom">Prenom </label><br>
            <input type="text" name="prenom" ><br> <br>

            <input type="submit" class="btn btn-outline-primary" value="Chercher">

        @csrf
    </form>
     <br>
    <form  action="{{route('recherchelogin.admin')}}" method="post">
    	<br>
    
    		<label for="login">Login </label><br>
            <input type="text" name="login" ><br> <br>


            <input type="submit" class="btn btn-outline-primary" value="Chercher">

        @csrf
    </form>
</div>

@endsection