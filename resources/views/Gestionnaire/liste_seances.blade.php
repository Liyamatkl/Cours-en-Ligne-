@extends('Modele.welcome')
@section('title', 'Listecours')
@section('contenu')
<h1>Liste des séances</h1>


    <table>
        <tr>
            <td> Seance n°</td>
            <td> Cour n°</td>
            <td> Date de début </td>
            <td> Date de fin </td>
            <td> Action n°1 </td>
            <td> Action n°2 </td>
        </tr>
@forelse($Seance as $n)
        <tr>
            <td>{{$n->id}}</td>
            <td>{{$n->cours_id}}</td>
            <td>{{$n->date_debut}}</td>
            <td>{{$n->date_fin}}</td>
           <td><form action = "{{route('modifyseanceform.gestionnaire',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-success" name= "btn" value="Modifier">
            @csrf
            </form>
</td>
<td><form action = "{{route('suppseanceform.gestionnaire',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Supprimer">
            @csrf
            </form>
</td>
            
        </tr>


@empty
<p style="color:red"> Pas de séances !</p>

    @endforelse

    </table>
    {{$Seance->links()}}
@endsection