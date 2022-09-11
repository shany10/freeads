@extends('header')
<form action="Entity_update" method="POST">
    @csrf
    <label for="name">name</label>
    <input type="text" name="name" placeholder="name">
    <input type="submit" value="save">
</form>
<form action="Entity_update" method="POST">
    @csrf
    <label for="password">Password : </label>
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="save">
</form>
@extends('footer')