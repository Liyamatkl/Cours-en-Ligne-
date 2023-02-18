@extends('Modele.welcome')
@section('title', 'Listecours')
@section('contenu')
<h1>Liste des séances pour le cours {{$Cours-> intitule}}</h1>
<h2>Etudiant séléctionné: {{$Etudiant-> nom}} {{$Etudiant-> prenom}}</h2>

    <table>
        <tr>
            <td> Cour n°</td>
            <td> Date de début </td>
            <td> Date de fin </td>
            <td> Noté présent </td>
        </tr>
@forelse($Seance as $n)
        <tr>
            <td>{{$n->cours_id}}</td>
            <td>{{$n->date_debut}}</td>
            <td>{{$n->date_fin}}</td>
            <td><form action = "{{route('pointageperso.enseignant',['id' => $Cours -> id,'idd' => $Etudiant -> id, 'iddd' => $n -> id ])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Présent">
            @csrf
            </form></td>
            
        </tr>


@empty
<p style="color:red"> Pas de séances !</p>

    @endforelse

    </table>
   
@endsection