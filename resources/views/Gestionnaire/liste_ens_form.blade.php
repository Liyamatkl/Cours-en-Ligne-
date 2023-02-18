@extends('Modele.welcome')
@section('title', 'Liste des étudiants ')
@section('contenu')
<h1>Liste des enseignants associés au cours {{$Users->intitule}}</h1>
    <table>
        <tr>
            <td> Nom </td>
            <td> Prenom </td>
            <td> Action</td>
        </tr>
@forelse($Associer as $n)
        <tr>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            <td><form action = "{{route('supprimerens.gestionnaire',['id' => $n -> id, 'idd' => $Users -> id ])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Supprimer">
            @csrf
            </form></td>
            </td>
        
        </tr>


@empty
<p style="color:red"> Pas d'enseignants !</p>

    @endforelse

    </table>
@endsection