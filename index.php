<?php

/*require($_SERVER['DOCUMENT_ROOT']."/ProjetStapa/controller/application.php");

$url = ''; // initialisation d'une variable URL

//controle de l'existe de la variable et dissociation en attribut selon le symbole /
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

var_dump($_GET);
var_dump($url);
var_dump($_SESSION);
*/

switch ($url[0])
{
    case(""):
    case("login"):
        if ($url[1] == "connecte") {
            echo "chargement du fichier : accueil profil connecte";
            break;
        } else if ($url[1] == "erreur_connexion") {
            echo "chargement du fichier ereur connexion";
            break;
        } else {
            require("./controler/homeManager.php");
            break; }
/*
    case("accueilLog"):
        if ($url[1] == "admin") {
            echo "chargement du fichier : accueil administrateur";
            break;
        } else if ($url[1] == "superviseur") {
            echo  "chargement du fichier : accueil superviseur";
            break;
        } else {
            echo  "chargement du fichier : accueil opérateur";
            break; }
    break;

    case("requete"):
        if ($url[1] <> "") {
            echo "chargement de la requête : ".$url[1];
            break;
        } else {
            echo "chargement de la page : choix de requete";
            break;
        }

    case("utilisateur"):
        if ($url[1] <> "creer") {
            echo "chargement du fichier : créer un profil utilisateur";
            break;
        } elseif ($url[1] <> "supprimer") {
            echo "chargement du fichier : supprimer un profil utilisateur";
            break;
        } elseif ($url[1] <> "modifier") {
            echo "chargement du fichier : modifier un profil utilisateur";
            break;
        } else {
            echo "chargement du fichier : afficher un profil utilisateur";
            break;
        }

        case("client"):
        if ($url[1] <> "creer") {
            echo "chargement du fichier : créer un profil client";
            break;
        } elseif ($url[1] <> "supprimer") {
            echo "chargement du fichier : supprimer un profil client";
            break;
        } elseif ($url[1] <> "modifier") {
            echo "chargement du fichier : modifier un profil client";
            break;
        } else {
            echo "chargement du fichier : afficher un profil client";
            break;
        }
*/
    default:
        echo "erreur 404";
}
