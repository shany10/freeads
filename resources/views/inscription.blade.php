@extends('header')
<form action="/inscriptionController" method="POST">
    @csrf
    <label for="name">Name :</label>
    <input type="text" name="name" placeholder="name" require><br><br>
    <label for="email">Email :</label>
    <input type="email" name="email" placeholder="mail" require><br><br>
    <label for="pwd">Password : </label>
    <input type="password" name="pwd" placeholder="password" require><br><br>
    <label for="confirm">confirm your password : </label>
    <input type="password" name="confirm" placeholder="password" require>
    <input type="submit">
</form>
@extends('footer')