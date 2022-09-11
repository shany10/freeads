<?php

namespace App\Models;
// include_once './database/env.php';
use PDO;
use PDOException;
class CRUD  
{
    public $database;
    function __construct()
    {
        try {
            $this->database = new PDO("mysql:host=localhost;dbname=laravel",'shany','shany');            
        }
        catch(PDOException $e){
            print "Erreur:" . $e->getMessage();
            die;
        } 
    }

    public function create($table, $fields)
    {
        $virgul = '';
        $colonne_create = '';
        $colonne = '';
        $donne = '';

        foreach ($fields as $key => $value) {
            if ($key !== array_key_first($fields)) {
                $virgul = ', ';
            }

            $colonne_create = $colonne_create . $virgul . $key . " VARCHAR(100)";
            $colonne = $colonne . $virgul . $key;
            $donne = $donne . $virgul . "'$value'";
        }
        

        $requete = "INSERT INTO $table ($colonne) VALUES ($donne)";
        $requete = $this->database->prepare($requete);
        $requete->execute();

        $requete = "SELECT id FROM $table WHERE " .
            array_key_first($fields) . " = " .
            "'" . $fields[array_key_first($fields)] . "'";
        $requete = $this->database->prepare($requete);
        $requete->execute();
        $result = $requete->fetch();
        
        return $result['id'];
    }

    public function read($table, $id)
    {
        $requete = "SELECT * FROM $table 
                    WHERE id = '$id'"; 
        $requete = $this->database->prepare($requete);
        $requete->execute();
        $result = $requete->fetch();
        return $result;
    }

    public function update($table, $id, $fields)
    {

        $requete = "UPDATE $table SET ";
        $virgul = '';
        foreach($fields as $key => $value) {
            if($key !== array_key_first($fields)) {
                $virgul = ', '; 
            }
            $requete = $requete . $virgul . $key . ' = ' . "'$value'";
        }

        $requete = $requete . " WHERE id  = '$id'"; 
        $requete = $this->database->prepare($requete);
        return $requete->execute();
    }

    public function delete($table, $id)
    {
        $requete = "DELETE FROM $table WHERE id = '$id'";
        $requete = $this->database->prepare($requete);
        return $requete->execute();        
    }

    public function find($table, $colonne , $value)
    {
        $requete = "SELECT * FROM $table WHERE $colonne = '$value'";
        $requete = $this->database->prepare($requete);
        $requete->execute();
        $result = $requete->fetch();
        return $result;
    }

}