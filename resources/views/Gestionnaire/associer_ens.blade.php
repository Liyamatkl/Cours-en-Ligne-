@extends('Modele.welcome')
@section('title', 'Associer')
@section('contenu')
<h1>Séléctionner un enseignant</h1>
    <table>
        <tr>
            <td> Nom </td>
            <td> Prenom </td>
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            
            <td><form action = "{{route('associerensform.gestionnaire',['id' => $n -> id] )}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Valider">
            @csrf
            </form></td>
        
        </tr>


@empty
<p style="color:red"> Pas d'étudiants !</p>

    @endforelse
    </table>
    {{$Users->links()}}
@endsection