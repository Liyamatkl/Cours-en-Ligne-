@extends('Modele.welcome')
@section('title', 'ValiderUser')
@section('contenu')
<h1>Liste des Utilisateurs en attente</h1>
    <table>
        <tr>
            <td> Id</td>
            <td> Nom </td>
            <td> Prenom </td>
            <td> Login</td>
            <td> Action n°1</td>
            <td> Action n°2</td>
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->id}}</td>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            <td>{{$n->login}}</td>
            
            <td><form action = "{{route('ValiderForm.user',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-success" name= "btn" value="Accepter">
            @csrf
            </form></td>
            <td><form action = "{{route('refuserform.admin',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Refuser">
            @csrf
            </form></td>
        </tr>


@empty
<p style="color:red"> Pas d'utilisateur en attente !</p>

    </table>
    @endforelse
    {{$Users->links()}}
@endsection