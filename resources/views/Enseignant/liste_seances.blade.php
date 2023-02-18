@extends('Modele.welcome')
@section('title', 'Listecours')
@section('contenu')
<h1>Liste des séances pour le cours {{$Cours-> intitule}}</h1>
    <table>
        <tr>
            <td> Cour n°</td>
            <td> Date de début </td>
            <td> Date de fin </td>
            <td> Noter les présences </td>
        </tr>
@forelse($Seance as $n)
        <tr>
            <td>{{$n->cours_id}}</td>
            <td>{{$n->date_debut}}</td>
            <td>{{$n->date_fin}}</td>
            <td><form action = "{{route('listesetudiantassoc.enseignant',['id' => $n -> id, 'idd' => $Cours -> id ])}}" method="get">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
            
        </tr>


@empty
<p style="color:red"> Pas de séances !</p>

    @endforelse

    </table>
@endsection