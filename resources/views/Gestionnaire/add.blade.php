@extends('Modele.welcome')
@section('link')
    <link rel="stylesheet" href="/styles/index.css">
@endsection
@section('title', 'AjouterUser')
@section('contenu')
<h3>Ajouter un utilisateur</h3>
        <div>
        <form action="{{route('add.gestionnaire')}}" method="post">
            <br>
            <label for="nom">Nom </label><br>
            <input type="text" name="nom" value="{{old('nom')}}" placeholder='nom'> <br>

            <label for="prenom">Prénom </label><br>
            <input type="text" name="prenom" value="{{old('prenom')}}"placeholder='prénom'><br>

            <label for="login">Numéro étudiant </label><br>
            <input type="text" name="noet" value="{{old('noet')}}"placeholder='le n° commence par un u + 8 chiffres'><br>
<br><br>
             <input type="submit" class="btn btn-outline-primary" value="Ajouter">
             
            @csrf
        </form>
    </div>

@endsection

