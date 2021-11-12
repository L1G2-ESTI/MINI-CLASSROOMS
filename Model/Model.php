<?php
    class connect_bdd {
        protected function dbconnect() {
            try{
                $connexion = new PDO('mysql:host=127.0.0.1;dbname=CLASSROOMS','sergio', 'sergio22');
                return $connexion;
            }catch(PDOException $erreurs){
                die($erreurs->getMessage());
            }
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

        public function nomEtudiant($email){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT nom_etud , pre_etud, photo FROM Etudiant 
                        WHERE mail_etud = "'.$email.'" 
                    ' ;

                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function fetchCours(){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT * FROM Modules ' ;

                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function listeProf(){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT nom_prof,pre_prof,photoprof,nom_mat
                        FROM Professseur
                        NATURAL JOIN Modules 
                    ' ;
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    
/*--------------------------------------------------------------------------------------------------------------------------------------------*/
        public function etudiant(){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT * FROM Etudiant';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }


        public function CREATE($nom,$prenom,$email,$password,$genre,$matricule,$niveau){
            try{
                $bdd = $this->dbconnect();       
            $insertUser = 'INSERT INTO Etudiant (
            `nom_etud`,
            `pre_etud`, 
            `mail_etud`,
            `mdp_etud`,
            `sexe`, 
            `num_matr`,
            `Niveau`) VALUES(:nom,:prenom,:email,:password,:genre,:matricule,:niveau)';
            $prepaInsert= $bdd->prepare($insertUser);
            $insertion=$prepaInsert->execute(array(
                ":nom"=>$nom,
                ":prenom"=>$prenom,
                ":email"=>$email,
                ":password"=>sha1($password),
                ":genre"=>$genre,
                ":matricule"=>$matricule,
                ":niveau"=>$niveau));
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function DELETE() {
            try{
                $bdd = $this->dbconnect();
                $deleteUser="DELETE FROM etudiant WHERE num_matr = :id";
                $prepaDelete=$bdd->prepare($deleteUser);
                $prepaDelete->bindValue(
                ":id",$_GET['id'],PDO::PARAM_INT);
                $suppresion=$prepaDelete->execute(); 
            }catch(Exception $e){
                die($e->getMessage());
            }          
        }
    
        public function UPDATE($id,$nom,$prenom,$email,$password,$niveau){
           try{
            $bdd = $this->dbconnect();

            $UpdatetUser = "UPDATE etudiant SET `nom_etud`=:nom, `pre_etud`=:prenom, `mail_etud`=:email, `mdp_etud`=:password, `Niveau`=:niveau WHERE num_matr=:id";
            $prepaInsert= $bdd->prepare($UpdatetUser);

            $update=$prepaInsert->execute( array(
                ":nom"=>$nom,
                ":prenom"=>$prenom,
                ":email"=>$email,
                ":password"=>$password,
                ":niveau"=>$niveau,
                ":id"=>$id));
           }catch(Exception $e){
               die($e->getMessage());
           }
            
    }
        
}
?>
