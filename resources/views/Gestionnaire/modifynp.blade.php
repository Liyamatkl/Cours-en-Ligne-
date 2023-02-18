@extends('Modele.welcome')
@section('title','Modifymdp')
@section('contenu')

<h3> Modifier mon nom et prénom </h3>
<div>
    <form  action="{{route('Modifymdpnp.gestionnaire')}}" method="post">
    	<br>
    
    		<label for="nom">Nouveau nom </label><br>
            <input type="text" name="nom" value="{{$Users->prenom}}"><br> <br>

            <label for="prenom">Nouveau prenom </label><br>
            <input type="text" name="prenom" value="{{$Users->prenom}}"><br> <br>

            <input type="submit" class="btn btn-outline-primary" value="Modifier">

        @csrf
    </form>
</div>

@endsection