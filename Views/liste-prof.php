<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>liste</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/liste-prof.css">
        <link rel="stylesheet" href="assets/css/prof.css">
    </head>
    <body>
        <header>
            <div class="container">
                <nav>
                    <ul>
                        <li>logo</li>
                        <li><a href="#">les Professeurs</a></li>
                        <li><a href="#">Emploi du temps</a></li>
                        <li>
                            <?php
                            echo '<div>
                                <img src="'.$_SESSION['photo'].'"
                                class="img-profil" width="25px" height="25px"
                             </div>';
                            ?>
                        </li>
                    </ul>
                </nav>	
            </div>
        </header>
        
        <div class="container">
            <div class="row">
            <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Matières</h6>
                                <a class="ml-auto" data-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="specialism">
                                <div class="widget-content">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="specialism1">
                                        <label class="custom-control-label" for="specialism1">Mathématiques</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="specialism2">
                                        <label class="custom-control-label" for="specialism2">Français</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="specialism3">
                                        <label class="custom-control-label" for="specialism3">Base de données</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="specialism4">
                                        <label class="custom-control-label" for="specialism4">HTML/CSS</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="specialism5">
                                        <label class="custom-control-label" for="specialism5">Anglais</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Sexe</h6>
                                <a class="ml-auto" data-toggle="collapse" href="#gender" role="button" aria-expanded="false" aria-controls="gender"><i class="fas fa-chevron-down"></i></a>
                            </div>
                            <div class="collapse show" id="gender">
                                <div class="widget-content">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="gender1">
                                        <label class="custom-control-label" for="gender1">Homme</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="gender2">
                                        <label class="custom-control-label" for="gender2">Femme</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="widget border-0">
                            <div class="widget-add">
                                <img class="img-fluid" src="images/add-banner.png" alt=""></div>
                        </div>
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