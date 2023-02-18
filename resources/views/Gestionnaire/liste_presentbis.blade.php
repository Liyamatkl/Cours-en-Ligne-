@extends('Modele.welcome')
@section('title', 'Liste des étudiants présents ')
@section('contenu')
<h1>Etudiants présents pour le cours {{$Cours->intitule}}</h1>
    
        
@foreach($Seance as $n)
<p>Sceance n°{{$n->id}}</p>
<table>
<tr>
            <td style="color:red"> Nom </td>
            <td style="color:red"> Prenom </td>
            <td style="color:red"> Numéro étudiant</td>
            <td style="color:red"> Statut</td>
        </tr>

    @forelse($Etudiant as $e)

<tr>
    @php
    $total = $e->etudiants_sea()->where('cours_id',$Cours->id)->where('id',$n->id)->count();
@endphp
    
            <td> {{$e->nom}} </td>
            <td>{{$e->prenom}} </td>
            <td> {{$e->noet}}</td>
            @if($total==0)
            <td> Absent</td>
            @else
            <td> Présent</td>
            @endif
        </tr>

    @empty
<p style="color:red"> Pas d'étudiant associé à cette séance !</p>


    @endforelse

        
    </table>
    <br>
    <br>
    @endforeach
@endsection