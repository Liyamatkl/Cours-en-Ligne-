@extends('Modele.welcome')
@section('title', 'ListeSeance')
@section('contenu')
<h1>Récapitulatif des absences pour le cours {{$Cours->intitule}}  </h1>
     
<h3 style= "color:red">L'élève {{$Etudiant->nom}} {{$Etudiant->prenom}} a été absent au total {{$Total}} fois. </h3>
    </table>
@endsection