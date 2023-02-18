@extends('Modele.welcome')
@section('tilte', 'HomePage')
@section('contenu')

<h1 style="text-decoration: underline">Accueil de l'Admin</h1>

<ul>
        <li> <a href= "{{route('ValiderFormbis.user')}}">Accepter un utilisateur</a></li>
        <li> <a href= "{{route('formulaireajouteruser.admin')}}">Créer un utilisateur</a></li>
        <li> <a href= "{{route('createform.admin')}}">Créer un cours</a></li>
        <li> <a href= "{{route('listecours.admin')}}">Liste/Gestion des cours</a></li>
        <li> <a href= "{{route('listeuser.admin')}}">Liste/Gestion des utilisateurs</a></li>
        
    


    </ul>

@endsection
