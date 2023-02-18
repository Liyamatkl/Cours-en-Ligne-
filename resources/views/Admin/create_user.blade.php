@extends('Modele.welcome')
@section('link')
    <link rel="stylesheet" href="/styles/index.css">
@endsection
@section('title', 'CreerUser')
@section('contenu')
<h3>Créer un utilisateur</h3>
        <div>
        <form method="post" action="{{route('ajouteruser.admin')}}" >
            <br>
            <label for="nom">Nom </label><br>
            <input type="text" name="nom" value="{{old('nom')}}" placeholder='nom'> <br>

            <label for="prenom">Prénom </label><br>
            <input type="text" name="prenom" value="{{old('prenom')}}"placeholder='prénom'><br>

            <label for="prenom">Type </label><br>
            <select class="form-control" name="type">
            <option>enseignant</option>
            <option>gestionnaire</option>
            <option>admin</option>
            </select>

            <label for="login">Login </label><br>
            <input type="text" name="login" value="{{old('login')}}"placeholder='login'><br>

            <label for="mdp">Mot de passe </label><br>
            <input type="password" name="mdp"placeholder='mot de passe'><br>

            <label for="nom">Confirmez votre mot de passe </label><br>
            <input type="password" name="mdp_confirmation"placeholder='confirmez votre mot de passe' size="20"><br><br>

            <input type="submit" class="btn btn-outline-primary" value="Ajouter">

                
            @csrf
        </form>
    </div>

@endsection

