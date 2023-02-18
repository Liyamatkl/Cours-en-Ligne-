@extends('Modele.welcome')
@section('link')
    <link rel="stylesheet" href="/styles/index.css">
@endsection
@section('title', 'AjouterSeance')
@section('contenu')
<h3>Ajouter un utilisateur</h3>
        <div>
        <form action="{{route('create.gestionnaire')}}" method="post">
            <br>
            <label for="date_debut">Date début </label><br>
            <input type="date" name="date_debut" value="{{old('date_debut')}}"> <br>

            <label for="date_fin">Date de fin </label><br>
            <input type="date" name="date_fin" value="{{old('date_fin')}}"><br>

<br><br>
             <input type="submit" class="btn btn-outline-primary" value="Valider">
             
            @csrf
        </form>
    </div>

@endsection

