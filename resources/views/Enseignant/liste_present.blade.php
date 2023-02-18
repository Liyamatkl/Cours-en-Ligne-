@extends('Modele.welcome')
@section('title', 'Liste des étudiants présents ')
@section('contenu')
<h1>Etudiants présents pour la séance n° {{$Users->id}}</h1>
    <table>
        <tr>
            <td style="color:red"> Nom </td>
            <td style="color:red"> Prenom </td>
            <td style="color:red"> Numéro étudiant</td>
        </tr>
        @if (!$Seance->isEmpty())  
@forelse($Seance as $n)
        <tr>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            <td>{{$n->noet}}</td>
            </td>
        
        </tr>
        
@empty
<p style="color:red"> Pas d'étudiants présents !</p>

    </table>
    @endforelse
<p> Total d'élève présent: {{$Total}}</p>
@else <h3 style="color: red">L'appel n'a pas encore été fait</h3>
@endif
@endsection