<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CRUD as ControllersCRUD;
use App\Mail\testMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\New_;
use App\Models\UserModel;
use App\Models\User;

class indexController extends Controller
{
    function showIndex()
    {
        return view("index");
    }

    function showConnexion()
    {
        return view("connexion");
    }

    function showInscription()
    {
        return view("inscription");
    }

    function inscriptionController()
    {

        if ($_POST['pwd'] !== $_POST['confirm']) {
            echo "vos mots de passes ne sont pas identique";
            return view('inscription');
        }
        session_start();
        User::factory()
        ->count(1)
        ->create();
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        Mail::to($_SESSION['email'])->send(new testMail($_SESSION['name']));

        header("Location: /home");
        die();
    }

    function connexionController() {
        $value = User::where('email', $_POST['email'])
                ->where('password' , crypt($_POST['pwd'] , 'shany'))
                ->get();   
                    
        if($value == '[]') {
            echo 'Votre identité est invalide';
            return view('connexion');
        }
        session_start();
        foreach($value as $val) {
            $_SESSION['name'] = $val->name;
            $_SESSION['email'] = $val->email;
        }
        header("Location: /home");
        die();
    }

    function showHome()
    {
        session_start();
        $posts = [
            $_SESSION['name'],
            $_SESSION['email']
        ];
        return view('home', compact('posts'));
    }

    function showModification() {
        return view('modification');
    }
}
