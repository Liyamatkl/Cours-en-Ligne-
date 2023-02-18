@extends('Modele.welcome')
@section('title', 'Liste des cours')
@section('contenu')
<h1>Voir les étudiants associer aux cours</h1>

    <table>
        <tr>
            <td> Intitule </td>
            <td> Action </td>
    
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->intitule}}</td>
            
            <td><form action = "{{route('listeassoc.gestionnaire',['id' => $n -> id])}}" method="get">
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