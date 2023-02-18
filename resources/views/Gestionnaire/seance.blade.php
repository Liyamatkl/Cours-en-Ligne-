@extends('Modele.welcome')
@section('title', 'Listecours')
@section('contenu')
<h1>Liste des cours</h1>
    <table>
        <tr>
            <td> Cour n°</td>
            <td> Intitulé </td>
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->id}}</td>
            <td>{{$n->intitule}}</td>
            <td><form action = "{{route('createform.gestionnaire',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Créer">
            @csrf
            </form></td>
        </tr>


@empty
<p style="color:red"> Pas de cours !</p>


    @endforelse
    </table>
    {{$Users->links()}}
@endsection