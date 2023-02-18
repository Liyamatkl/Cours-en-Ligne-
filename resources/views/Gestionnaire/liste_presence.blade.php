@extends('Modele.welcome')
@section('title', 'ListeSeance')
@section('contenu')
<h1>Récapitulatif des présences pour le cours {{$Cours->intitule}}  </h1>
    <table>
        <tr>
            <td style="color:red"> ID de l'étudiant</td>
            <td style="color:red"> N° de la seance </td>
        </tr>
@forelse($Presence as $n)
        <tr>
            <td>{{$n->etudiant_id}}</td>
            <td>{{$n->seance_id}}</td>
            
            
        </tr>


@empty
<p style="color:red"> Pas de séances !</p>

    @endforelse
<h3 style="color:red">L'élève {{$Etudiant->nom}} {{$Etudiant->prenom}} a été présent au total {{$Total}} fois. </h3>
<p style="text-decoration: underline">Aperçu:</p>
    </table>
@endsection