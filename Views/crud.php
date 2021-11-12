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
                 <table class="table table-striped table-hover">
                     <thead>
                         <tr>
                             <th>Nom</th>
                             <th>Prénom</th>
                             <th>Email</th>
                             <th>Mot de passe</th>
                             <th>matricule</th>
                             <th>Niveau</th>
                             <th>Adresse</th>
                             <th>sexe</th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php
                            while ($row = $affichage->fetch()) {

                                echo '<tr>
                            <td>' . $row["nom_etud"] . '</td>
                            <td>' . $row["pre_etud"] . '</td>
                            <td>' . $row["mail_etud"] . '</td>
                            <td>' . $row["mdp_etud"] . '</td>
                            <td>' . $row["num_matr"] . '</td>
                            <td>' . $row["Niveau"] . '</td>
                            <td>' . $row["adresse"] . '</td>
                            <td>' . $row["sexe"] . '</td>
                            <td>
                                <a href="index.php?action=update&&id=' . $row["num_matr"] . '" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="index.php?action=supprimerEtudiant&&id=' . $row["num_matr"] . '" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>';
                            }

                            ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <div id="addEmployeeModal" class="modal fade">
         <div class="modal-dialog">
             <div class="modal-content">
                 <form method="POST" action="index.php?action=AjoutEtudiant">
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