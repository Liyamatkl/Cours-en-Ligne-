@extends('Modele.welcome')
@section('title', 'Liste des cours')
@section('contenu')
<h1>Liste des cours</h1>

    <table>
        <tr>
            <td style="color:red"> Intitule </td>
            <td style="color:red"> Créer le </td>
            <td style="color:red"> MAJ le </td>
            <td style="color:red"> Voir les séances associée </td>
    
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->intitule}}</td>
            <td>{{$n->created_at}}</td>
            <td>{{$n->updated_at}}</td>
            <td><form action = "{{route('listeassoseance.gestionnaire',['id' => $n -> id])}}" method="get">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
        </tr>

@empty
<p style="color:red"> Pas de cours !</p>

    @endforelse
    </table>
    {{$Users->links()}}
@endsection