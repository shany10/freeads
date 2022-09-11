@extends('header')
<h1>La list des annonces</h1>

@foreach($arr as $value)
<h4>{{$value->titre}}</h4>
<p>{{$value->description}}</p>
<img src="img/{{$value->photographie}}" alt="photo" width="100" height="100">
<p>{{$value->prix}} £</p>
<br><br>
@endforeach

@extends('footer')