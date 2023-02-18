@extends('Modele.welcome')
@section('title', 'Résultat recherche ')
@section('contenu')
<h1>Résultat de la recherche </h1>
    <table>
        <tr>
            <td style="color:red"> Nom </td>
            <td style="color:red"> Prenom </td>
            <td style="color:red"> Numéro étudiant</td>
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->nom}}</td>
            <td>{{$n->prenom}}</td>
            <td>{{$n->noet}}</td>
    
        
        </tr>


@empty
<p style="color:red"> Aucun étudiant a été trouvé  !</p>

    @endforelse
    
@endsection