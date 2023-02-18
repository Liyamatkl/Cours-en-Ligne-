@extends('Modele.welcome')
@section('title', 'ListeSeance')
@section('contenu')
<h1>Liste de vos séances </h1>
<h5>Cours séléctionné: {{$Cours->intitule}}</h5>
<h3 style="color: red">Nombre total d'étudiants présent pour le cours {{$Cours-> intitule}}: {{$Total}} </h3>
    <table>
        <tr>
            <td> Seance n°</td>
            <td> Date de début </td>
            <td> Date de fin </td>
            <td> Liste des élèves présents </td>
            <td> Liste des élèves absents </td>
        </tr>
@forelse($Seance as $n)
        <tr>
            <td>{{$n->id}}</td>
            <td>{{$n->date_debut}}</td>
            <td>{{$n->date_fin}}</td>
            <td><form action = "{{route('listesetudiantpres.enseignant',['id' => $n -> id,  'idd' => $Cours -> id ])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
            <td><form action = "{{route('listesetudiantabs.enseignant',['id' => $n -> id,  'idd' => $Cours -> id ])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
            
        </tr>


@empty
<p style="color:red"> Pas de séances !</p>

    @endforelse

    </table>
   
@endsection