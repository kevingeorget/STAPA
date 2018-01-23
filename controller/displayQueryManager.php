<?php
/**
A commenter **/

require(__DIR__ . '/../model/getDisplayQuery.php');

if ($_SESSION['logged'] == true) {
    if (isset($_POST['query'])) {
        $result = getDisplayQuery(array($_POST['query']));  // numero de la requete en param
        if (isset($result) AND $result != null) {
            require('view/displayQueryView.php');
        } else {
            echo 'ERREUR DE LA REQUETE OU AUCUN RESULTAT';
            require('view/displayQueriesFormView.php');
        }
    } else {
        require('view/displayQueriesFormView.php');
    }
} else {
    require('view/homeView.php');
}
