@extends('Modele.welcome')
@section('link')
    <link rel="stylesheet" href="/styles/index.css">
@endsection
@section('title', 'ModifyCours')
@section('contenu')
    <div class="container">
        <div class="content">
            <h1>Modification d'un cours</h1>
            <h5 style="color: red">Cours séléctionné: {{$Users->intitule}}  </h5>
            <br>
            <br>
            <form method="post" action="{{route('modifycours.admin',['id' => $Users -> id])}}">
                <div>Nouveau nom: <input type="text" name="intitule" value="{{$Users->intitule}}"></div>
                <input id="o" b type="submit" value="Valider"/>
                @csrf
            </form>
        </div>
        
    </div>

@endsection

