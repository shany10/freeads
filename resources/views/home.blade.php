@extends('header')
<a href="connexion">Deconnexion</a><br>
<a href="modification">Modification</a><br> 
<a href="annonce">Ajouter une annonce</a><br>
<a href="listAnnonce">La list des annonces</a><br>

@if(session()->has('success'))
<h2>Votre annonce a été deposéer avec succées</h2>
@endif
@foreach($posts as $value)
<h1>{{$value}}</h1>
@endforeach
@extends('footer')