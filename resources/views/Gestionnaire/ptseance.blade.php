@extends('Modele.welcome')
@section('tilte', 'HomePage')
@section('contenu')

<h1 style="text-decoration: underline">Partie Séance</h1>

<ul>
        
        <li> <a href= "{{route('createformbis.gestionnaire')}}">Creer une séance</a></li>
        <li> <a href= "{{route('listeseance.gestionnaire')}}">Gestion des séances (Suppression/Modification)</a></li>
        <li> <a href= "{{route('listecours.gestionnaire')}}">Liste des cours/Séances pour un cours</a></li>
        
    


    </ul>

@endsection
