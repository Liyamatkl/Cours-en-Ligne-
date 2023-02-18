@extends('Modele.welcome')
@section('link')
    <link rel="stylesheet" href="/styles/index.css">
@endsection
@section('title', 'Seanceform')
@section('contenu')
<h3>Veuillez entrer les dates</h3>
        <div>
        <form action="{{route('create.gestionnaire', ['id' => $Users -> id])}}" method="post">
            <br>

            <p>Pour le cours n°{{$Users -> id}}</p>


            <label for="date_debut">Date de début </label><br>
            <input type="datetime-local" name="date_debut" value="{{old('date_debut')}}"> <br>

            <label for="date_fin">Date de fin </label><br>
            <input type="datetime-local" name="date_fin" value="{{old('date_fin')}}"> <br>

<br>
<br>
            <input type="submit" class="btn btn-outline-primary" value="Confirmer">

                
            @csrf
        </form>
    </div>

@endsection

