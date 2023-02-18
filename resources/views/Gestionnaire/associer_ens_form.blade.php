@extends('Modele.welcome')
@section('title', 'Associercours')
@section('contenu')
<h1>Séléctionner un cours</h1>

<p>Enseignant séléctionné: {{$Users -> nom}} {{$Users -> prenom}}</p>
    <table>
        <tr>
            <td> Intitule </td>
    
        </tr>
@forelse($Cours as $n)
        <tr>
            <td>{{$n->intitule}}</td>
            
            <td><form action = "{{route('associerens.gestionnaire',['id' => $Users -> id , 'idd' => $n -> id])}}" method="post">
            <input type="submit" class="btn btn-outline-danger" name= "btn" value="Associer">
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
    
@endsection