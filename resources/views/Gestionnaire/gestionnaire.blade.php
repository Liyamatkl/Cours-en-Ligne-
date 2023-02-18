@extends('Modele.welcome')
@section('tilte', 'HomePage')
@section('contenu')
<h1 style="text-decoration: underline">Accueil du Gestionnaire</h1>
<ul>
        <li> <a href= "{{route('Modifymdp_form.gestionnaire')}}">Modifier mon mot de passe</a></li>
        <li> <a href= "{{route('Modifymdp_formnp.gestionnaire')}}">Modifier mes informations personnelles</a></li>
       
        <li> <a href= "{{route('listecours.gestionnaire')}}">Liste des cours</a></li>
    


    </ul>

@endsection
