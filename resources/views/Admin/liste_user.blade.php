@extends('Modele.welcome')
@section('title', 'Liste des Utilisateurs ')
@section('contenu')
<h1>Liste de tous les utilisateurs</h1>
<center><h5>Filtrer par:</h5><a type="button" href="{{route('listeuserens.admin')}}" class="btn btn-info">Enseignant</a>
<a type="button" href="{{route('listeusergest.admin')}}" class="btn btn-warning">  Gestionnaire</a> <a type="button" href="{{route('listeuser.admin')}}" class="btn btn-secondary">Intégrale</a></center>
    <table>
        <tr>
            <td style="color: red"> Nom </td>
            <td style="color: red"> Prenom </td>
            <td style="color: red"> Login </td>
            <td style="color: red"> Type</td>
            <td style="color: red"> Action n°1</td>
            <td style="color: red"> Action n°2</td>
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            <td>{{$n->login}}</td>
            <td>{{$n->type}}</td>
            <td><form action = "{{route('modifyuserform.admin',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-success" name= "btn" value="Modifier">
            @csrf
            </form>
</td>
            <td>
            <form action = "{{route('suppuserform.admin',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Supprimer">
            @csrf
            </form></td>
        </tr>


@empty
<p style="color:red"> Pas d'utilisateurs !</p>

    @endforelse

    </table>
<br>
<a style="color: blue"href="{{route('rechercheform.admin')}}">Cliquez ici si vous souhaitez RECHERCHER un utilisateur.</a>



    {{$Users->links()}}
@endsection