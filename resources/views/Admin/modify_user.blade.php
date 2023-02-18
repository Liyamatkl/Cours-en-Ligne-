@extends('Modele.welcome')
@section('link')
    <link rel="stylesheet" href="/styles/index.css">
@endsection
@section('title', 'ModifyUser')
@section('contenu')
<h1>Modifier un utilisateur</h1>
<h5 style="color: red">Utilisateur séléctionné: {{$Users->nom}} {{$Users->prenom}} </h5>

        <div>
        <form action="{{route('modifyuser.admin',['id' => $Users -> id])}}" method="post">
            <br>
            <label for="nom">Nom </label><br>
            <input type="text" name="nom" value="{{$Users->nom}}" placeholder='nom'> <br>

            <label for="prenom">Prénom </label><br>
            <input type="text" name="prenom" value="{{$Users->prenom}}"placeholder='prénom'><br>

            <label for="type">Nouveau Type </label><br>
            <select class="form-control" name="type" value="{{$Users->type}}">
            <option>enseignant</option>
            <option>gestionnaire</option>
            <option>admin</option>
            </select>

            <label for="login">Login </label><br>
            <input type="text" name="login" value="{{$Users->login}}"placeholder='login'><br>

            <label for="mdp">Nouveau Mot de passe </label><br>
            <input type="password" name="mdp"value="{{$Users->mdp}}"><br><br>

            <input type="submit" class="btn btn-outline-primary" value="Modifier">

                
            @csrf
        </form>
    </div>

@endsection

