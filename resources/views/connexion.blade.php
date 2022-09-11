@extends('header')
<form action="connexionController" method="POST">
@csrf
<label for="email">Email :</label>
<input type="email" name="email" placeholder="mail"><br><br>
<label for="pwd">Password : </label>
<input type="password" name="pwd" placeholder="password">
<input type="submit">
</form>
@extends('footer')

