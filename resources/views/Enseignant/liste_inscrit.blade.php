@extends('Modele.welcome')
@section('title', 'Liste des étudiants incrits au cours ')
@section('contenu')
<h1>Etudiants associés au cours {{$Cours->intitule}}</h1>

    <table>
        <tr>
            <td style="color:red"> Nom </td>
            <td style="color:red"> Prenom </td>
            <td style="color:red"> Numéro étudiant</td>
    

        </tr>
@forelse($Etudiant as $n)
        <tr>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            <td>{{$n->noet}}</td>

</td>
            
    
        
        </tr>


@empty
<p style="color:red"> Pas d'étudiants !</p>

    @endforelse
      </table>
@endsection