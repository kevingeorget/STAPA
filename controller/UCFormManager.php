<?php

require($_SERVER['DOCUMENT_ROOT']."/ProjetStapa/model/userRead.php");

$queryUser = (
    "SELECT * 
    FROM `utilisateur`
    WHERE `id_utilisateur` = 3");

$user = user_read($queryUser);

foreach ($user as $key => $value) {
    echo "{$key} => {$value} <br />";
}


$dataType = "client";

$title = "Administration des comptes ".$dataType;

$formTitle1 = "Créer un compte ".$dataType;
$formTitle2 = "Modifier un compte ".$dataType;
$formTitle3 = "Supprimer un compte ".$dataType;
$formTitle4 = "Rechercher un compte ".$dataType;

$inputBtn1 = "Créer";
$inputBtn2 = "Modifier";
$inputBtn3 = "Supprimer";
$inputBtn4 = "Rechercher";

$actionForm1 = "localhost://ProjetStapa/controller/FormManager.php";
$actionForm2 = "localhost://ProjetStapa/controller/FormManager.php";
$actionForm3 = "localhost://ProjetStapa/controller/FormManager.php";
$actionForm4 = "localhost://ProjetStapa/controller/FormManager.php";

$dataType = "utilisateur";
$h2Title = $title;
$actionForm = $actionForm2;
$formTitle = $formTitle2;
$inputBtn = $inputBtn2;

include($_SERVER['DOCUMENT_ROOT']."/ProjetStapa/vue/userFormView.php");


$h2Title = $title;
$actionForm = $actionForm3;
$formTitle = $formTitle3;
$inputBtn = $inputBtn3;

//require($_SERVER['DOCUMENT_ROOT']."/ProjetStapa/vue/customerFormView.php");