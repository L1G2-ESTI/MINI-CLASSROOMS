<!DOCTYPE html>

<?php include "config.php"; ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification Page</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

</head>

<?php

       	if(isset($_POST['save'])) {
		// get variables from the form
        dbConnect();
		$nom = $_POST['nom_etud'];
		$prenom = $_POST['pre_etud'];
		$email = $_POST['mail_etud'];
		$password = $_POST['mdp_etud'];
        $niveau=$_POST['Niveau'];
        $id=$_POST['num_matr'];

		//write sql query

		$UpdatetUser = "UPDATE etudiant SET `nom_etud`=:nom, `pre_etud`=:prenom, `mail_etud`=:email, `mdp_etud`=:password, `Niveau`=:niveau WHERE num_matr=:id";
        
        //prepare 
        $prepaInsert= $conn->prepare($UpdatetUser);

		// execute the query

        $update=$prepaInsert->execute(
        array(":nom"=>$nom,":prenom"=>$prenom,":email"=>$email,":password"=>$password,":niveau"=>$niveau,":id"=>$id));

		if ($update) {
			echo "Vos données ont bien été inserée";
		}else{
			echo "Vérifier que votre champ de saisie n'est pas vide";
		}

		

	       }
?>

<body>
    <form method="POST">
        <div>
            <div class="d-flex flex-column border container w-50 my-5">
                <div class="rounded bg-white mb-0 px-6 py-6">
                    <div classe="">
                        <h6 class="d-inline-block py-3 px-3 font-weight-bold h4">Modifier compte</h6>
                        <button class="btn btn-primary d-inline-block float-right px-4 mx-3 py-2 my-2 rounded shadow" type="submit" name="save">
                            Enregistrer
                        </button>
                        <button class="btn btn-danger d-inline-block float-right px-4 py-2 my-2 rounded shadow" type="button" name="annuler">
                            Annuler
                        </button>
                    </div>
                </div>
                <div class="bg-light px-4 lg:px-10 py-10 pt-0">
                    <form>
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Informations utilisateurs
                        </h6>
                        <div class="d-flex flex-row">
                            <?php
              
                if(isset($_GET['id'])){
                try{
                global $conn;
                dbConnect();
                $sql = "SELECT * FROM etudiant WHERE num_matr=:id";
                $prepaSelect = $conn->prepare($sql);
                $prepaSelect->bindValue(":id",$_GET['id'],PDO::PARAM_INT);
                $prepaSelect->execute();
                $data = $prepaSelect->fetch();
		                  ?>
                            <div class="px-4">
                                <div class="form-group mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                        Nom
                                    </label>
                                    <label class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                        Prenom
                                    </label>
                                    <label class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                        Email
                                    </label>
                                    <label class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                        Mot de passe
                                    </label>
                                    <label class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                        Sexe
                                    </label>
                                    <label class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                        Niveau
                                    </label>
                                </div>
                            </div>

                            <div class="px-4">
                                <div class="mb-3">
                                    <input type="text" class="border-0 p-3 my-1 ml-3 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="<?php echo $data['nom_etud']; ?>" name="nom_etud" />
                                    <input type="hidden" name="num_matr" value="<?php echo $data['num_matr'];; ?>">
                                    <input type="text" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="<?php echo $data['pre_etud']; ?>" name="pre_etud" />
                                    <input type="email" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="<?php echo $data['mail_etud']; ?>" name="mail_etud" />
                                    <input type="text" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="<?php echo $data['mdp_etud']; ?>" name="mdp_etud" />
                                    <div class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150">
                                        <label>sexe</label>
                                        <input type="radio" name="sexe" value="M" <?php if($data['sexe'] == 'M'){ echo "checked";} ?>>M
                                        <input type="radio" name="sexe" value="F" <?php if($data['sexe'] == 'F'){ echo "checked";} ?>>F
                                    </div>
                                    <input type="text" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="<?php echo $data['Niveau']; ?>" name="Niveau" />

                                </div>
                            </div>
                            <?php
               
                
                }catch(PDOExeption $e)
                {
        die('Erreur'.$e->getMessage());
                };
    };
			
?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
