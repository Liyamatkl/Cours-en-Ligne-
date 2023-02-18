@extends('Modele.welcome')
@section('title', 'SupprimerSeance')
@section('contenu')
<p style="color: red">Voulez vous supprimer la séance du {{$Users -> date_debut}} ? </p >
    <form action="{{route('suppseance.gestionnaire', ['id' => $Users -> id])}}" method="post">
    <input type="submit" name="Oui" value="Oui">
        <input type="submit" name="Non" value="Non">
        @csrf
    </form>

@endsection
    
