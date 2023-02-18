@extends('Modele.welcome')
@section('link')
    <link rel="stylesheet" href="/styles/index.css">
@endsection
@section('title', 'ModifySeance')
@section('contenu')
<h3>Modifier la séance</h3>
        <div>
        <form action="{{route('modifyseance.gestionnaire', ['id' => $Users -> id])}}" method="post">
            <br>
            <label for="date_debut">Date début </label><br>
            <input type="datetime-local" name="date_debut" value="{{$Users->date_debut}}"> <br>

            <label for="date_fin">Date de fin </label><br>
            <input type="datetime-local" name="date_fin" value="{{$Users->date_fin}}"><br>

<br><br>
             <input type="submit" class="btn btn-outline-primary" value="Modifier">
             
            @csrf
        </form>
    </div>

@endsection

