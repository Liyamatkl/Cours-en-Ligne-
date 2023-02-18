@extends('Modele.welcome')
@section('title', 'RefuserUser')
@section('contenu')
<p style="color: red">Voulez vous refuser l'inscription de l'utilisateur {{$Users -> nom}} {{$Users -> prenom}} ? </p >
    <form action="{{route('refuser.admin', ['id' => $Users -> id])}}" method="post">
    <input type="submit" name="Oui" value="Oui">
        <input type="submit" name="Non" value="Non">
        @csrf
    </form>

@endsection
    
