@extends('Modele.accueil')
@section('title','Connexion')
@section('contenu')
<center>
<h1>Connexion</h1>
<p>Merci d'entrer vos identifiants:</p>

    <form method="post">
        Login: <input type="text" name="login" value="{{old('login')}}">
        <br>
        <br>
        MDP: <input type="password" name="mdp">
        <br>
        <br>
        <input type="submit" value="Envoyer">
        @csrf
    </form>
    <br>
    <li>Vous n'êtes pas inscrits ? <a href="{{route('register')}}">Créer un compte</a></li>

    </center>
@endsection
