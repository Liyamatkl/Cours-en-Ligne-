@extends('Modele.welcome')
@section('title', 'Résultat recherche ')
@section('contenu')
<h1>Résultat de la recherche </h1>
    <table>
        <tr>
            <td style="color: red"> Nom </td>
            <td style="color: red"> Prenom </td>
            <td style="color: red"> Type</td>
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            <td>{{$n->type}}</td>
        
        </tr>


@empty
<p style="color:red"> Pas d'utilisateurs trouvés !</p>

    @endforelse

    </table>
    
@endsection