<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>liste</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/liste-prof.css">
    </head>
    <body> 
        <div class="container">
            <div class="row">
            <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget border-0">
                            <div class="logo-head">
                                <h3>Mini Classroom</h3>
                            </div>
                        </div>
                        <nav>
                            <ul>
                                <li class="nav-menu"><a href="acceuilEtudiant.html">Mes Cours</a></li>
                                <li class="nav-menu"><a href="publication.html">Publication</a></li>
                                <li class="nav-menu"><a href="liste-cours.html">Modules</a></li>
                                <li class="nav-menu"><a href="calendrier.html">Calendrier</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row mb-4">
                        <div class="col-12">
                            <center><h2 class="mb-0">Les <span class="text-primary">professeurs</span></h2></center>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            while($infoProf=$log->fetch()){

                                echo '<div class="col-sm-6 col-lg-4 mb-4">
                                        <div class="candidate-list candidate-grid">
                                            <div class="candidate-list-image">
                                                <img class="img-fluid" src="'.$infoProf["photoprof"].'">
                                            </div>
                                        <div class="candidate-list-details">
                                            <div class="candidate-list-info">
                                                <div class="candidate-list-title">
                                                    <h5><a href="#">'.$infoProf["nom_prof"]." ".$infoProf["pre_prof"].'</a></h5>
                                                </div>
                                                <div class="candidate-list-option">
                                                    <ul class="list-unstyled">
                                                        <li><i class="fas fa-filter pr-1"></i>Professeur de <b>'.$infoProf["nom_mat"].'</b></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>