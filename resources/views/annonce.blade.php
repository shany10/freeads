@extends('header')

<form action="addAnnonce" method="POST">
    @csrf
    <div class="form-group">
        <label for="titre">Titre de l'annonce</label><br>
        <input type="text" name="titre" class="form-control" id="exampleInputEmail1" aria-describedby="titre"><br>
    
        <br>
    </div>
    <div class="form-group">
        <label for="description">Description de l'annonce</label><br>
        <textarea name="description" cols="30" rows="10"></textarea><br>
        @if( $errors -> has('description') )
        <span>{{ $errors->first('description') }}</span><br>
        @endif
        <br>
    </div>
    <div class="form-group">
        <label for="photographie">Photographie de l'annonce</label><br>
        <input type="file" name="photographie"><br>
        @if( $errors -> has('photographie') )
        <span>{{ $errors->first('photographie') }}</span><br>
        @endif
        <br>
    </div>
    <div class="form-group">
        <label for="prix">Prix de l'annonce</label><br>
        <input type="text" name='prix'><br>
        @if( $errors -> has('prix') )
        <span>{{ $errors->first('prix') }}</span><br>
        @endif
        <br>
    </div>
    <button type="submit" class="btn btn-primary">ajouter</button>
</form>

@extends('footer')