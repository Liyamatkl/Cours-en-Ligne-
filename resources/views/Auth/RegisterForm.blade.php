@extends('Modele.accueil')
@section('title','Senregistrer')
@section('contenu')

<center>
<h1>S'enregistrer</h1>
<p>Merci d'entrer vos informations:</p>

<div style =" text-align: center ">
    <form method="post">
        
        <p>Nom:</p> <input type="text" name="nom" value="{{old('nom')}}">
        <br>
        <br>
        <p>Prenom: </p><input type="text" name="prenom" value="{{old('prenom')}}">
        <br>
        <br>
        <p>Login:</p> <input type="text" name="login" value="{{old('login')}}">
        <br>
        <br>
       <p> Mot de passe:</p> <input type="password" name="mdp">
        <br>
        <br>
        <p>Confirmation du Mot de passe:</p> <input type="password" name="mdp_confirmation">
        <br>
        <br>
        <input type="submit" value="Envoyer">
        @csrf
    </form>
    </center>
    </div>
@endsection
