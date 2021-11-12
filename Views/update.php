<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification Page</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>

<body>
    <form method="POST">
        <div>
            <div class="d-flex flex-column border container w-50 my-5">
                <div class="rounded bg-white mb-0 px-6 py-6">
                    <div classe="">
                        <h6 class="d-inline-block py-3 px-3 font-weight-bold h4">Modifier compte</h6>
                    </div>
                </div>
                <div class="bg-light px-4 lg:px-10 py-10 pt-0">
                    <form action="index.php?action=enregistrement&&id=<?= '.$row["num_matr"].'?>" method="POST">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Informations utilisateurs
                        </h6>
                        <?php
                        while ($row = $log->fetch()) {
                            echo '
                                <div class="d-flex flex-row">
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
                                            <label  class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                                Mot de passe
                                            </label>
                                            <label class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                                Niveau
                                            </label>
                                            <label class="block uppercase text-blueGray-600 text-xs p-3 font-bold mb-2" htmlFor="grid-password">
                                                Adresse
                                            </label>
                                        </div>
                                    </div>
                                    <div class="px-4">
                                        <div class="mb-3">
                                            <input type="text" class="border-0 p-3 my-1 ml-3 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="' . $row["nom_etud"] . '" name="nom_etud" />
                                            <input type="hidden" name="num_matr" value="' . $row["num_matr"] . '">
                                            <input type="text" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="' . $row["pre_etud"] . '" name="pre_etud" />
                                            <input type="email" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="' . $row["mail_etud"] . '" name="mail_etud" />
                                            <input type="text" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="' . $row["mdp_etud"] . '" name="mdp_etud" />
                                            <input type="text" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="' . $row["Niveau"] . '" name="mdp_etud" />
                                        </div>
                                        <input type="text" class="border-0 p-3 my-1 ml-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-100 ease-linear transition-all duration-150" value="' . $row["adresse"] . '" name="Niveau" />

                                    </div>
                                </div>
                           </div>
                       ';
                        }
                        ?>
                        <input class="btn btn-primary d-inline-block float-right px-4 mx-3 py-2 my-2 rounded shadow" type="submit" value="Enregistrer">
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>

</html>