@extends('Modele.welcome')
@section('link')
    <link rel="stylesheet" href="/styles/index.css">
@endsection
@section('title', 'Creer')
@section('contenu')
    <div class="container">
        <div class="content">
            <h1>Veuillez indiquer le cours que vous voulez ajouter: </h1>
            <br>
            <form method="post" action="{{route('create.admin')}}">
                <div>Nom du cours: <input type="text" name="intitule" value="{{old('intitule')}}"></div>
                <br>
            
                <input id="o" b type="submit" value="Valider"/>
                @csrf
            </form>
        </div>
        
    </div>

@endsection

