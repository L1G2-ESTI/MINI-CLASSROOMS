<?php
    require_once("Model/Model.php");

    function authentification(){
        try{
            require("Views/login.php");
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    function loginEtudiant($email,$password){
        $query = new query_data();
        $log = $query->loginEtudiant($email,sha1($password)); 
        $user_info = $log->fetch();
        if(!(empty($user_info))){
            require("Views/list.php");
        }else{
            require('Views/login.php');   
        }
    }
?>