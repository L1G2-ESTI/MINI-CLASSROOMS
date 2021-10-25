<?php
    require_once("Model/Model.php");

    function acceuil(){
        try{
            require("Views/login.html");
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
?>