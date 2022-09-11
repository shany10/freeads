<?php

namespace App\Http\Controllers;

use App\Http\Requests\annonce_request;
use App\Models\annonce;
use Illuminate\Http\Request;


class AnnonceController extends Controller
{
    function annonce()
    {
        return view('annonce');
    }

    function addAnnonce(annonce_request $request)
    {
        $valide = $request->validated();
        $annonce = new annonce();
        $annonce->titre = $valide['titre'];
        $annonce->description = $valide['description'];
        $annonce->photographie = $valide['photographie'];
        $annonce->prix = $valide['prix'];
        $annonce->save();
        return redirect()->route('home')->with('success', 'blabla');
    }

    function listAnnonce() 
    {
        $arr = annonce::all();
        return view('listAnnonce' , compact('arr'));
    }
}
