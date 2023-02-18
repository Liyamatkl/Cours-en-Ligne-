@extends('Modele.welcome')
@section('title', 'Liste des cours')
@section('contenu')
<h1>Liste des cours</h1>

    <table>
        <tr>
            <td> Intitule </td>
            <td> Créer le </td>
            <td> MAJ le </td>
            <td> Voir les listes de présence </td>
    
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->intitule}}</td>
            <td>{{$n->created_at}}</td>
            <td>{{$n->updated_at}}</td>
            <td><form action = "{{route('Listesetudiantbisbis.gestionnaire',['id' => $n -> id])}}" method="post">
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