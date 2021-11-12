<?php
require_once("Model/Model.php");


function acceuil()
{
    try {
        require("Views/acceuilPrincipal.php");
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


function authentification()
{
    try {
        require("Views/login.php");
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function loginEtudiant($email, $password)
{
    $query = new query_data();
    $log = $query->loginEtudiant($email, sha1($password));
    $nom = $query->nomEtudiant($email);
    $cours = $query->fetchCours();
    $user_nom = $nom->fetch();
    $user_info = $log->fetch();
    if (!(empty($user_info))) {
        session_start();
        $_SESSION["photo"] = $user_nom['photo'];
        $_SESSION["username"] = $user_nom["nom_etud"] . "<br>" . $user_nom["pre_etud"];
        require("Views/acceuilEtudiant.php");
    } else {
        require('Views/login.php');
    }
}

function loginProf($email, $password)
{
    $query = new query_data();
    $log = $query->loginProf($email, sha1($password));
    $user_info = $log->fetch();
    if (!(empty($user_info))) {
        require("Views/liste-cours.php");
    } else {
        require('Views/login.php');
    }
}

function loginAdmin($email, $password)
{
    $query = new query_data();
    $log = $query->loginAdmin($email, sha1($password));
    $user_info = $log->fetch();
    if (!(empty($user_info))) {
        $affichage = $query->etudiant();
        session_start();
        require("Views/crud.php");
    } else {
        require('Views/login.php');
    }
}

function listeProf()
{
    try {
        $query = new query_data();
        $log = $query->listeProf();
        session_start();
        require("Views/liste-prof.php");
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function Etudiant()
{
    try {
        session_start();
        $query = new query_data();
        $log = $query->etudiant();
        session_start();
        require("Views/crud.php");
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function AjoutEtudiant($nom, $prenom, $email, $password, $genre, $matricule, $niveau)
{
    try {
        $query = new query_data();
        $log = $query->CREATE($nom, $prenom, $email, $password, $genre, $matricule, $niveau);
        session_start();
    } catch (Exception $e) {
        die($e->getMessage());
    }
    header("Location:index.php?action=login");
}

function update($id)
{
    try {
        session_start();
        $query = new query_data();
        $log = $query->etudiantId($id);
        require("Views/update.php");
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
function modifierEtudiant($id, $nom, $prenom, $email, $password, $niveau, $adresse)
{
    try {
        $query = new query_data();
        $log = $query->UPDATE($id, $nom, $prenom, $email, $password, $niveau, $adresse);
        session_start();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
function supprimerEtudiant($id)
{
    try {
        $query = new query_data();
        $log = $query->DELETE($id);
        header("Locartion:../Views/crud.php");
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
