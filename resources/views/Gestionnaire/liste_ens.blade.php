@extends('Modele.welcome')
@section('title', 'Liste des cours')
@section('contenu')
<h1>Voir les enseignants associés aux cours</h1>

    <table>
        <tr>
            <td> Intitule </td>
            <td> Action </td>
    
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->intitule}}</td>
            
            <td><form action = "{{route('listeassocens.gestionnaire',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
        </tr>

 <!-- @if ($errors-> all())
    return Redirect::to('gestionnaire.accueil')
    @endif -->
@empty
<p style="color:red"> Pas de cours !</p>

    @endforelse
    </table>
    {{$Users->links()}}
@endsection