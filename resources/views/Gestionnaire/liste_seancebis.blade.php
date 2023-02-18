@extends('Modele.welcome')
@section('title', 'ListeSeance')
@section('contenu')
<h1>Liste de toute les séances </h1>
    <table>
        <tr>
            <td> Cour n°</td>
            <td> Date de début </td>
            <td> Date de fin </td>
            <td> Liste des élèves présents </td>
        </tr>
@forelse($Seance as $n)
        <tr>
            <td>{{$n->cours_id}}</td>
            <td>{{$n->date_debut}}</td>
            <td>{{$n->date_fin}}</td>
            <td><form action = "{{route('listesetudiantbis.gestionnaire',['id' => $n -> id ])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
            
        </tr>


@empty
<p style="color:red"> Pas de séances !</p>

    @endforelse

    </table>
   {{$Seance->links()}}
@endsection