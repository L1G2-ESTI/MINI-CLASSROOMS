<?php
    class connect_bdd {
        protected function dbconnect() {
        $file="../login.json";//tedavina ny toerana misy le fichier JSON
        $contenu=file_get_contents($file);//alaina le fichier
        $obj=json_decode($contenu);//decoder en php le fichier json

        //declarena ho variable php le variable json 
        $host=$obj->host;
        $dbname=$obj->dbname;
        $user=$obj->user; 
        $pass=$obj->pass;
        try {
        // se connecter à mysql
        $connexion = new PDO("mysql:host=$host;dbname=$dbname","$user","$pass");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            exit();
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
    }
/*--------------------------------------------------------------------------------------------------------------------------------------------*/
    class etudiant {
            public function CREATE(){
        $bdd = $this->dbconnect();
                
		$nom = $_POST['nom_etud'];
		$prenom = $_POST['pre_etud'];
		$email = $_POST['mail_etud'];
		$password = $_POST['mdp_etud'];
		$genre = $_POST['sexe'];
        $matricule=$_POST['num_matr'];
        $niveau=$_POST['Niveau'];
                
        $insertUser = 'INSERT INTO etudiant (
        `nom_etud`,
        `pre_etud`, 
        `mail_etud`,
        `mdp_etud`,
        `sexe`, 
        `num_matr`,
        `Niveau`) VALUES(:nom,:prenom,:email,:password,:genre,:matricule,:niveau)';
        $prepaInsert= $connexion->prepare($insertUser);
    
        $insertion=$prepaInsert->execute( array(
            ":nom"=>$nom,
            ":prenom"=>$prenom,
            ":email"=>$email,
            ":password"=>$password,
            ":genre"=>$genre,
            ":matricule"=>$matricule,
            ":niveau"=>$niveau));
		if ($insertion) {
			return True;
		}else{
			return False;
		}
            }
        
        public function DELETE{
        $bdd = $this->dbconnect();
        $deleteUser="DELETE FROM etudiant WHERE num_matr = :id";
        $prepaDelete=$connexion->prepare($deleteUser);
        $prepaDelete->bindValue(
        ":id",$_GET['id'],PDO::PARAM_INT);//alaina id n'le olona vonoina
        $suppresion=$prepaDelete->execute();//vonoina le olona manana id nalaina
            
        if ($suppresion == TRUE) {
		  echo "SUPRIMER AVEC SUCCES";
	    }else{
		  echo "IL Y A UNE ERREUR" ;
	   }           
            
        }
        
        public function UPDATE{
        $bdd = $this->dbconnect();
            
		$nom = $_POST['nom_etud'];
		$prenom = $_POST['pre_etud'];
		$email = $_POST['mail_etud'];
		$password = $_POST['mdp_etud'];
        $niveau=$_POST['Niveau'];
        $id=$_POST['num_matr'];
            
		$UpdatetUser = "UPDATE etudiant SET `nom_etud`=:nom, `pre_etud`=:prenom, `mail_etud`=:email, `mdp_etud`=:password, `Niveau`=:niveau WHERE num_matr=:id";
        $prepaInsert= $connexion->prepare($UpdatetUser);

        $update=$prepaInsert->execute( array(
            ":nom"=>$nom,
            ":prenom"=>$prenom,
            ":email"=>$email,
            ":password"=>$password,
            ":niveau"=>$niveau,
            ":id"=>$id));
        if ($update) {
			return True;
		}else{
			return False;
		}
            
        }
        
    }
?>
