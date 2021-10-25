<?php
    class connect_bdd {
        protected function dbconnect() {
            try{
                $connexion = new PDO('mysql:host=127.0.0.1;dbname=','', '');
                return $connexion;
            }catch(PDOException $erreurs){
                die($erreurs->getMessage());
            };
        }
    }

    class query_data extends connect_bdd {

        // tous les methodes des requetes reliés à la BDD

    }

?>