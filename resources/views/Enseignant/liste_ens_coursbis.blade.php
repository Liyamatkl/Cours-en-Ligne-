@extends('Modele.welcome')
@section('title', 'Liste des cours ')
@section('contenu')
<h1>Voici les cours auxquelles vous êtes associés</h1>
    <table>
        <tr>
            <td style="color:red"> Mes Cours </td>
            <td style="color:red"> Liste de séances </td>
            

        </tr>
@forelse($Cours as $n) 

        <tr>
            <td>{{$n->intitule}}</td>
            <td><form action = "{{route('pointagepersoformbis.enseignant',['id' => $n -> id])}}" method="get">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
        
        </tr>


@empty
<p style="color:red"> Pas de cours associés !</p>

    </table>
    @endforelse
    
@endsection