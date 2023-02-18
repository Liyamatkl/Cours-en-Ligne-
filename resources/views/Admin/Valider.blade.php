@extends('Modele.welcome')
@section('title', 'ValiderUser')
@section('contenu')
<p>Veuillez choisir un type l'utilisateur "{{$Users -> nom}}" ? </p>
    <form method="post" action="{{route('Valider.user', ['id' => $Users -> id])}}" >
    <label for="type">Type </label><br>
            <select class="form-control" name="type">
            <option>enseignant</option>
            <option>gestionnaire</option>
            </select>
            <br><br>
            <input type="submit"class="btn btn-outline-primary" value="Ajouter">
        @csrf
    </form>

@endsection