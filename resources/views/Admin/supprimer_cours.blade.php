@extends('Modele.welcome')
@section('title', 'SupprimerCours')
@section('contenu')
<p style="color: red">Voulez vous supprimer le cours {{$Users -> intitule}} ? </p >
    <form action="{{route('suppcours.admin', ['id' => $Users -> id])}}" method="post">
    <input type="submit" name="Oui" value="Oui">
        <input type="submit" name="Non" value="Non">
        @csrf
    </form>

@endsection
    
