@extends('Modele.welcome')
@section('tilte', 'HomePage')
@section('contenu')
<h1 style="text-decoration: underline">Accueil de l'Enseignant</h1>
<ul>
        <li> <a href= "{{route('Modifymdp_form.enseignant')}}">Modifier mon mot de passe</a></li>
        <li> <a href= "{{route('Modifymdp_formnp.enseignant')}}">Modifier mes informations personnelles</a></li>
        <li> <a href= "{{route('listesinscritform.enseignant')}}">Liste des inscrits dans un cours</a></li>
        <li> <a href= "{{route('listeassocenscours.enseignant')}}">Mes cours/Pointage</a></li>
        <li> <a href= "{{route('listeassoccoursbis.enseignant')}}">Listes des présences/absences</a></li>

    


    </ul>

@endsection
