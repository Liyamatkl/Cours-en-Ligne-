@extends('Modele.welcome')
@section('title', 'SupprimerEtudiant')
@section('contenu')
<p style="color: red">Voulez vous supprimer l'étudiant {{$Users -> nom}} {{$Users -> prenom}} ? </p >
    <form action="{{route('suppetudiant.gestionnaire', ['id' => $Users -> id])}}" method="post">
    <input type="submit" name="Oui" value="Oui">
        <input type="submit" name="Non" value="Non">
        @csrf
    </form>

@endsection
    
