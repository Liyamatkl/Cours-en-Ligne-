@extends('Modele.welcome')
@section('tilte', 'HomePage')
@section('contenu')

<h1 style="text-decoration: underline">Partie Enseignant</h1>

<ul>
    
        <li> <a href= "{{route('associerensformbis.gestionnaire')}}">Associer un enseignant à un cours</a></li>
        <li> <a href= "{{route('listeassocensform.gestionnaire')}}">Liste des enseignants associés au cours/Suppression de l'association enseignant-cours</a></li>

    


    </ul>

@endsection
