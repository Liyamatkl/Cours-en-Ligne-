@extends('Modele.welcome')
@section('title', 'Liste des cours ')
@section('contenu')
<h1>Liste de mes cours</h1>
    <table>
        <tr>
            <td style="color:red"> Intitule </td>
            <td style="color:red"> Liste des élèves </td>
            

        </tr>
@forelse($Cours as $n) 

        <tr>
            <td>{{$n->intitule}}</td>
            <td><form action = "{{route('listesinscrit.enseignant',['id' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Voir">
            @csrf
            </form></td>
        
        </tr>


@empty
<p style="color:red"> Pas de cours associés !</p>

    </table>
    @endforelse
    
@endsection