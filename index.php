<?php

//require($_SERVER['DOCUMENT_ROOT']."/ProjetStapa/controller/application.php");

var_dump($_GET); //instruction de controle de la variable GET enregistrée

$url = ''; // initialisation d'une variable URL

//controle de l'existe de la variable et dissociation en attribut selon le symbole /
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

var_dump($url);


if (($url[0] == "login") && ($url[1] == "utilisateur")) {
    echo "ok parse url";
} else
{
    //require(__DIR__.'/controller/errorManager.php');
    echo "not reconnu";
}

var_dump(__DIR__);