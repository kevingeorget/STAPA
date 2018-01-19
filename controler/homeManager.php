<?php
session_start();

//echo "entree home"."<br />";


//var_dump($_SESSION);

//liste des fichiers controler appelable :
// require($_SERVER['DOCUMENT_ROOT'].'/ProjetStapa/view/navView.php');

//test des variables de session
if ($_SESSION['logged'] == true) {
    switch ($_SESSION['user_type']) {

        case ('1'):
            require "";
            
        case ('2'):
            require "./view/home.php";
            break;

        case ('3'):
            require "";
            break;

        default:
            echo "defaut view";
            break;
    }
} else {
    //echo "Accueil not logged";
    require "./view/home.php";
}


//isset($_SESSION['user_id_type'])
