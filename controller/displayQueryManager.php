<?php
/**
A commenter **/

require('model/getDisplayQuery.php');

if ($_SESSION['logged'] == true) {

    $result = getDisplayQuery(array($_POST['query']));  // numero de la requete en param
    require('view/displayQueryView.php');

} else {
    require('view/homeView.php');
}
