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

        public function loginProf($email,$password){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT 1 FROM Professseur 
                        WHERE mail_prof= "'.$email.'" 
                        AND
                        mdp_prof = "'.$password.'"
                    ' ;

                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function loginAdmin($email,$password){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT 1 FROM administrateur 
                        WHERE mail_admin = "'.$email.'" 
                        AND
                        mdp_admin = "'.$password.'"
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