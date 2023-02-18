@extends('Modele.welcome')
@section('title', 'Liste des cours ')
@section('contenu')
<h1>Vous êtes associés au cours</h1>
    <table>
        <tr>
            <td style="color:red"> Mes Cours </td>
            <td style="color:red"> Liste des séances </td>
            

        </tr>
@forelse($Cours as $n) 

        <tr>
            <td>{{$n->intitule}}</td>
            <td><form action = "{{route('listeseance.enseignant',['id' => $n -> id])}}" method="get">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
        
        </tr>


@empty
<p style="color:red"> Pas de cours associés !</p>

    </table>
    @endforelse
    
@endsection