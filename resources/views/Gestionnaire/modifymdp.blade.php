@extends('Modele.welcome')
@section('title','Modifymdp')
@section('contenu')

<h3> Modifier mon mot de passe </h3>
<div>
    <form  action="{{route('Modifymdp.gestionnaire')}}" method="post">
    	<br>
    
    		<label for="mdp">Mot de passe actuel </label><br>
            <input type="password" name="mdp" placeholder="votre mot de passe"><br> <br>

            <label for="mdp">Nouveau mot de passe</label><br>
            <input type="password" name="newmdp" placeholder="nouveau mot de passe"><br> <br>

            <label for="mdp">Confirmez nouveau mot de passe</label><br>
            <input type="password" name="newmdp" placeholder="confirmez nouveau mot de passe"><br> <br>

            <input type="submit" class="btn btn-outline-primary" value="Modifier">

        @csrf
    </form>
</div>

@endsection