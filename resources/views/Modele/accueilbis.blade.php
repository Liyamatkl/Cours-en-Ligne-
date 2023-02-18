<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>@yield('title')</title>
    <style>
a:hover {
  background-color: gold;
}

a {
  text-decoration: none;
  transition:0.3s;
  font-size: 30px; 

} 

a:visited{
    color:#000;
}

*{
    padding:8px;
    margin: 0;
    font-family:fantasy,sans-serif;
}

body{
  background-image: url('image.jpeg');
  background-size: cover;
}






</style>




</head>
<body>
    <center>
<div><h1>Bienvenue sur CourEnLigne®</h1></div>
<br>
<br>
<br>
<br>
<br>
<br>
<a style="color: white" href="{{route('login')}}">Se connecter</a>
<br>
<br>
<br>
<br>
<a style="color: white" href="{{route('register')}}">S'enregistrer</a>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><p style="font-size: 10px; color:grey ">© 2022 UPEC, Tous droits réservés</p>
</center>
</body>
</html>
