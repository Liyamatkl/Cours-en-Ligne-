@extends('Modele.welcome')
@section('tilte', 'HomePage')
@section('contenu')

<h1 style="text-decoration: underline">Partie Étudiant</h1>

<ul>
        
        <li> <a href= "{{route('addform.gestionnaire')}}">Ajouter un étudiant</a></li>
        <li> <a href= "{{route('associerformbis.gestionnaire')}}">Associer un/des étudiant(s) à un cours</a></li>
        <li> <a href= "{{route('listeassocform.gestionnaire')}}">Liste des étudiants associés au cours/Supprimer l'association</a></li>
        <li> <a href= "{{route('listeet.gestionnaire')}}">Gestion des étudiants (Suppression/Modification)</a></li>
        <li> <a href= "{{route('rechercheform.gestionnaire')}}">Rechercher un étudiant</a></li>
        <li> <a href= "{{route('listeseancebis.gestionnaire')}}">Liste des présences des étudiants par séance</a></li>
        <li> <a href= "{{route('Listecoursbis.gestionnaire')}}">Liste des présences des étudiants par cours</a></li>
        <li> <a href= "{{route('listeetbis.gestionnaire')}}">Liste des présences détaillée par étudiants</a></li>

    


    </ul>

@endsection
