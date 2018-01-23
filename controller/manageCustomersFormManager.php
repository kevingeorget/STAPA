<?php
require('model/getDisplayQuery.php');

if ($_SESSION['logged'] == true) {
    $result = getDisplayQuery([1]);  // requete 1 (recupérer les abonnés)
    require('view/manageCustomersFormView.php');

} else {
    require('view/homeView.php');
}
