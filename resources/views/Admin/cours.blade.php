

@extends('Modele.welcome')
@section('title', 'Liste Cours')
@section('contenu')
<h1>Liste des Cours</h1>
<h5 style="color:red">Pour éviter une possible erreur:</h5>
<p>AVANT DE SUPPRIMER UN COURS, VEILLEZ À CE QUE CELUI-CI N'EST PLUS AUCUNE SÉANCE ASSOCIÉE.</p>
    <table>
        <tr>
            <td style="color:red"> Id</td>
            <td style="color:red"> Intitule </td>
            <td style="color:red"> Crée le </td>
            <td style="color:red"> MAJ le</td>
             <td style="color: red"> Action n°1</td>
            <td style="color: red"> Action n°2</td>
        </tr>
@foreach($Users as $n)
        <tr>
            <td>{{$n->id}}</td>
            <td>{{$n->intitule}}</td>
            <td>{{$n->created_at}}</td>
            <td>{{$n->updated_at}}</td>
            <td><form action = "{{route('modifycoursform.admin',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-success" name= "btn" value="Modifier">
            @csrf
            </form>
</td>
            <td>
            <form action = "{{route('suppcoursform.admin',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Supprimer">
            @csrf
            </form></td>
        </tr>
            </tr>
@endforeach
    </table>
<br>
<a style="color: blue"href="{{route('recherchecoursform.admin')}}">Cliquez ici si vous souhaitez RECHERCHER un cours.</a>
<br>
    {{$Users->links()}}
@endsection


