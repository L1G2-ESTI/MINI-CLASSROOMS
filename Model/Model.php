<?php
    class connect_bdd {
        protected function dbconnect() {
            try{
                $connexion = new PDO('mysql:host=127.0.0.1;dbname=CLASSROOMS',
                                    'sergio','sergio22');
                return $connexion;
            }catch(PDOException $erreurs){
                die($erreurs->getMessage());
            };
        }
    }

    class query_data extends connect_bdd {

        public function loginEtudiant($email,$password){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT 1 FROM Etudiant 
                        WHERE mail_etud = "'.$email.'" 
                        AND
                        mdp_etud = "'.$password.'"
                    ' ;

                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }
?>