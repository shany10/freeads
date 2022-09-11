<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CRUD;

class Entity extends Controller
{

    public $crud;

    function __construct()
    {
        $this->crud = new CRUD();
    }
    function call_creat() 
    {

    }

    function call_read() 
    {

    }

    function call_update() 
    {
        session_start();
        $id = $this->call_find()['id'];
        array_shift($_POST);
        if(array_key_first($_POST) == 'password') {
            $_POST['password'] = crypt($_POST['password'] , 'shany');
        }
        $this->crud->update('users' , $id , $_POST);
        $_SESSION['name'] = $this->call_find()['name'];
        header("Location: /home");
        die();
    }

    function call_delete() 
    {

    }

    function call_find() 
    {
        return $this->crud->find('users' , 'email', $_SESSION['email']);
    }
}

