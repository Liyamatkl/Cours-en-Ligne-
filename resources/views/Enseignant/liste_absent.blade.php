@extends('Modele.welcome')
@section('title', 'Liste des étudiants présents ')
@section('contenu')
<h1>Etudiants abscent pour la séance n° {{$Users->id}}</h1>
    <table>
        <tr>
            <td style="color:red"> Nom </td>
            <td style="color:red"> Prenom </td>
            <td style="color:red"> Numéro étudiant</td>
        </tr>

  @if (!$Abscence== null)      
@forelse($Abscence as $n)

@foreach($EtID as $c)
    @if(($c->id == $n -> etudiant_id))
        <tr>
            <td>{{$c->nom}}</td>
            <td>{{$c->prenom}}</td>
            <td>{{$c->noet}}</td>
            </td>
        
        </tr>
        @endif
   @endforeach     
@empty
<p style="color:red"> Pas d'étudiants absents  !</p>

    </table>
    @endforelse
<p> Total d'élève absent: {{$Total}}</p>

@endif
@endsection