<?php
/**
A commenter **/

require('model/getDisplayQuery.php');

if ($_SESSION['logged'] == true) {

    $result = getDisplayQuery(array($_POST['query']));  // numero de la requete en param
    if (isset($result) AND $result != null) {
        require('view/displayQueryView.php');
    } else {
        echo 'pas de réééééééésultat';
    }

} else {
    require('view/homeView.php');
}
