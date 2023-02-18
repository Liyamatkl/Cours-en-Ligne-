
@extends('Modele.welcome')
@section('title', 'Associercours')
@section('contenu')
<h1>Séléctionner un cours</h1>
    <table>
        <tr>
            <td> Intitule </td>
    
        </tr>
@forelse($Cours as $n)
        <tr>
            <td>{{$n->intitule}}</td>
            
            <td><form action = "{{route('associerform.gestionnaire',['id' => $n -> id] )}}" method="get">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Valider">
            @csrf
            </form></td>
        </tr>
        

@empty
<p style="color:red"> Pas de cours !</p>

    @endforelse
    </table>
    {{$Cours->links()}}
@endsection