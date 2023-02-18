@extends('Modele.welcome')
@section('title', 'SupprimerUtilisateur')
@section('contenu')
<p style="color: red">Voulez vous supprimer l'utilisateur {{$Users -> nom}} {{$Users -> prenom}} ? </p >
    <form action="{{route('suppuser.admin', ['id' => $Users -> id])}}" method="post">
    <input type="submit" name="Oui" value="Oui">
        <input type="submit" name="Non" value="Non">
        @csrf
    </form>

@endsection
    
