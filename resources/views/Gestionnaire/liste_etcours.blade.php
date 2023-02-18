@extends('Modele.welcome')
@section('title', 'Liste des cours associer à létudiant')
@section('contenu')
<h1>Liste des cours associer à l'étudiant {{$Etudiant->nom}} {{$Etudiant->prenom}}</h1>

    <table>
        <tr>
            <td style="color: red"> Intitule </td>
             <td style="color: red"> Nombre de présence </td>
             <td style="color: red"> Nombre d'absence </td>

    
        </tr>
@forelse($Cours as $n)
        <tr>
            <td>{{$n->intitule}}</td>
            <td><form action = "{{route('nbdepresence.gestionnaire',['id' => $n -> id, 'idd' => $Etudiant -> id ])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
            <td><form action = "{{route('nbdeabscence.gestionnaire',['id' => $n -> id, 'idd' => $Etudiant -> id ])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
        </tr>

@empty
<p style="color:red"> Pas de cours !</p>

    @endforelse
    </table>
@endsection