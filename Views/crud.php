   <?php
include 'config.php';
      
?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Admin --Etudiants</title>
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
       <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="../assets/css/crud-etudiant.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   </head>

   <body>
       <div class="container">
           <div class="table-responsive">
               <div class="table-wrapper">
                   <div class="table-title">
                       <div class="row">
                           <div class="col-xs-6">
                               <h2>Manage <b>Etudiant</b></h2>
                           </div>
                           <div class="col-xs-6">
                               <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter nouveau Etudiant</span></a>
                               <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>
                           </div>
                       </div>
                   </div>
                   <?php 
/*------------------------------------------------------DELETE------------------------------------------------------------------------------------*/

                    //DELETE USER
                   if(isset($_GET['id'])){
                    dbConnect();
                    
                    $deleteUser="DELETE FROM etudiant WHERE num_matr = :id";
    
                    $prepaDelete=$conn->prepare($deleteUser);
                    
                   
                    
                    $prepaDelete->bindValue(":id",$_GET['id'],PDO::PARAM_INT);//alaina id n'le olona vonoina
                    
                    $suppresion=$prepaDelete->execute();//vonoina le olona manana id nalaina
                    
                    	if ($suppresion == TRUE) {
		          echo "Record deleted successfully.";
	               }else{
		              echo "misy blem ehh" ;
	               }
                    }
/*------------------------------------------------------FIN DELETE------------------------------------------------------------------------------------*/

                   ?>





                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th>Nom</th>
                               <th>Prénom</th>
                               <th>Email</th>
                               <th>Mot de passe</th>
                               <th>matricule</th>
                               <th>Niveeau</th>
                               <th>genre</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
/*------------------------------------------------------READ------------------------------------------------------------------------------------*/

                //write the query to get data from etudiant table
                global $conn;
                dbConnect();
                $sql = "SELECT * FROM etudiant";

                //execute the query
                $result = $conn->query($sql);
			     if ($result->rowCount() > 0) {
				//output data of each row
				    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		                  ?>
                           <tr>
                               <td><?php echo $row['nom_etud']; ?></td>
                               <td><?php echo $row['pre_etud']; ?></td>
                               <td><?php echo $row['mail_etud']; ?></td>
                               <td><?php echo $row['mdp_etud']; ?></td>
                               <td><?php echo $row['num_matr']; ?></td>
                               <td><?php echo $row['Niveau']; ?></td>
                               <td><?php echo $row['sexe']; ?></td>
                               <td>
                                   <a href="update.php?id=<?php echo $row['num_matr']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                   <a href="crud.php?id=<?php echo $row['num_matr']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                               </td>
                           </tr>

                           <?php }
			}
/*------------------------------------------------------FIN READ------------------------------------------------------------------------------------*/

		?>
                       </tbody>
                   </table>
                   <div class="clearfix">
                       <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                       <ul class="pagination">
                           <li class="page-item disabled"><a href="#">Previous</a></li>
                           <li class="page-item"><a href="#" class="page-link">1</a></li>
                           <li class="page-item"><a href="#" class="page-link">2</a></li>
                           <li class="page-item active"><a href="#" class="page-link">3</a></li>
                           <li class="page-item"><a href="#" class="page-link">4</a></li>
                           <li class="page-item"><a href="#" class="page-link">5</a></li>
                           <li class="page-item"><a href="#" class="page-link">Next</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>


       <?php 
/*------------------------------------------------------INSERT------------------------------------------------------------------------------------*/
       	if(isset($_POST['submit'])) {
		// get variables from the form
        dbConnect();
		$nom = $_POST['nom_etud'];
		$prenom = $_POST['pre_etud'];
		$email = $_POST['mail_etud'];
		$password = $_POST['mdp_etud'];
		$genre = $_POST['sexe'];
        $matricule=$_POST['num_matr'];
        $niveau=$_POST['Niveau'];

		//write sql query

		$insertUser = "INSERT INTO etudiant (`nom_etud`, `pre_etud`, `mail_etud`, `mdp_etud`, `sexe`, `num_matr`, `Niveau`) VALUES(:nom,:prenom,:email,:password,:genre,:matricule,:niveau)";
        
        //prepare 
        $prepaInsert= $conn->prepare($insertUser);

		// execute the query

$insertion=$prepaInsert->execute(
    array(":nom"=>$nom,"prenom"=>$prenom,":email"=>$email,":password"=>$password,":genre"=>$genre,":matricule"=>$matricule,":niveau"=>$niveau));

		if ($insertion) {
			echo "Vos données ont bien été inserée";
		}else{
			echo "Vérifier que votre champ de saisie n'est pas vide";
		}

		

	       }
/*------------------------------------------------------FIN INSERT------------------------------------------------------------------------------------*/
       ?>


       <div id="addEmployeeModal" class="modal fade">
           <div class="modal-dialog">
               <div class="modal-content">
                   <form method="POST" action="crud.php">
                       <div class="modal-header">
                           <h4 class="modal-title">Ajouter etudiants</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                           <div class="form-group">
                               <label>Nom</label>
                               <input name="nom_etud" type="text" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>Prénom</label>
                               <input name="pre_etud" type="text" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>Email</label>
                               <input name="mail_etud" type="email" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>mdp</label>
                               <input type="password" name="mdp_etud" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>matricule</label>
                               <input type="number" name="num_matr" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>sexe</label>
                               <input type="radio" name="sexe" value="M">M
                               <input type="radio" name="sexe" value="F">F
                           </div>
                           <div class="form-group">
                               <label>niveau</label>
                               <input type="text" name="Niveau" class="form-control">
                           </div>
                       </div>
                       <div class="modal-footer">
                           <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                           <input type="submit" name="submit" class="btn btn-success" value="Add">
                       </div>
                   </form>
               </div>
           </div>
       </div>

       <!-- Edit Modal HTML -->
       <div id="editEmployeeModal" class="modal fade">
           <div class="modal-dialog">
               <div class="modal-content">
                   <form method="POST">
                       <div class="modal-header">
                           <h4 class="modal-title">Modifier Etudiant</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                           <div class="form-group">
                               <label>Nom</label>
                               <input type="text" class="form-control" required>
                           </div>
                           <div class="form-group">
                               <label>Email</label>
                               <input type="email" class="form-control" required>
                           </div>
                           <div class="form-group">
                               <label>Adresse</label>
                               <textarea class="form-control" required></textarea>
                           </div>
                           <div class="form-group">
                               <label>Téléphone</label>
                               <input type="text" class="form-control" required>
                           </div>
                       </div>
                       <div class="modal-footer">
                           <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                           <input type="submit" class="btn btn-info" value="Save">
                       </div>
                   </form>
               </div>
           </div>
       </div>


       <!-- Delete Modal HTML -->
       <div id="deleteEmployeeModal" class="modal fade">
           <div class="modal-dialog">
               <div class="modal-content">
                   <form>
                       <div class="modal-header">
                           <h4 class="modal-title">Supprimer étudiant</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                           <p>Vous êtes sûr de vouloir le/la supprimer?</p>
                           <p class="text-warning"><small>Cette action est irréverssible!</small></p>
                       </div>
                       <div class="modal-footer">
                           <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                           <input type="submit" class="btn btn-danger" value="Delete">
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </body>

   </html>
