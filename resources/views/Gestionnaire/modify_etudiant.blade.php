@extends('Modele.welcome')
@section('title','ModifierEtudiant')
@section('contenu')

<h3> Modifier mon nom et prénom </h3>

<p>Modification des données de l'étudiant : {{$Users->nom}} {{$Users->prenom}}  </p>

<div>
        <form action="{{route('modifyetudiant.gestionnaire', ['id' => $Users -> id])}}" method="post">
            <br>
            <label for="nom">Nom </label><br>
            <input type="text" name="nom" value="{{$Users->nom}}" placeholder='nom'> <br>

            <label for="prenom">Prénom </label><br>
            <input type="text" name="prenom" value="{{$Users->prenom}}"placeholder='prénom'><br>

            <label for="noet">Numéro étudiant </label><br>
            <input type="text" name="noet" value="{{$Users->noet}}"placeholder='le n° commence par un u + 8 chiffres'><br>
<br><br>
             <input type="submit" class="btn btn-outline-primary" value="Modifier">
             
            @csrf
        </form>
    </div>

@endsection