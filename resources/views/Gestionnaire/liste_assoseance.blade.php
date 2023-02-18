@extends('Modele.welcome')
@section('title', 'Listeséance')
@section('contenu')
<h1>Liste des séances pour le cours {{$Cours-> intitule}}</h1>

    <table>
        <tr>
            <td style="color:red"> Cour n°</td>
            <td style="color:red"> Date de début </td>
            <td style="color:red"> Date de fin </td>
        </tr>
@forelse($Seance as $n)
        <tr>
            <td>{{$n->cours_id}}</td>
            <td>{{$n->date_debut}}</td>
            <td>{{$n->date_fin}}</td>
            
        </tr>


@empty
<p style="color:red"> Pas de séances !</p>

    @endforelse

    </table>
    {{$Seance->links()}}
@endsection