@extends('Modele.welcome')
@section('title', 'Liste des étudiants ')
@section('contenu')
<h1>Liste des étudiants </h1>

    <table>
        <tr>
            <td> Nom </td>
            <td> Prenom </td>
            <td> Numéro étudiant</td>
            <td> Liste des présences</td>

        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            <td>{{$n->noet}}</td>
            <td><form action = "{{route('listecouretu.gestionnaire',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-success" name= "btn" value="Voir">
            @csrf
            </form>
</td>
            
    
        
        </tr>


@empty
<p style="color:red"> Pas d'étudiants !</p>

    @endforelse
      </table>
     {{$Users->links()}}
@endsection