@extends('Modele.welcome')
@section('title', 'Résultat recherche ')
@section('contenu')
<h1>Résultat de la recherche </h1>
    <table>
        <tr>
             <td style="color:red"> Id</td>
            <td style="color:red"> Intitule </td>
            <td style="color:red"> Crée le </td>
            <td style="color:red"> MAJ le</td>
        </tr>
@forelse($Users as $n)
        <tr>
            <td>{{$n->id}}</td>
            <td>{{$n->intitule}}</td>
            <td>{{$n->created_at}}</td>
            <td>{{$n->updated_at}}</td>
        
        </tr>


@empty
<p style="color:red"> Pas de cours trouvés !</p>

    @endforelse

    </table>
    
@endsection