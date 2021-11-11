<?php
     function dbConnect(){
        $file="../login.json";
        $contenu=file_get_contents($file);
        $obj=json_decode($contenu);
        global $conn;
        $host=$obj->host;
        $dbname=$obj->dbname;
        $user=$obj->user; 
        $pass=$obj->pass;
        global $conn;
        try {
  // se connecter à mysql
        $conn = new PDO("mysql:host=$host;dbname=$dbname","$user","$pass");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            exit();
                }
    }
