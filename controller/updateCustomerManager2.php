<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/projetweb_stapa/STAPA/model/getDisplayQuery.php");

if ($_SESSION['logged'] == true AND isset($_GET['id_personne'])) {
    $result = getDisplayQuery([1]);  // requete 1 (recupérer les abonnés)

    $customer = [];

    foreach ($result as $value) {
        if ($value['id_personne'] == $_GET['id_personne']) {
            array_push($customer, $value);
        }
    }

    echo json_encode($customer);

} else {
    echo json_encode(['lol' => 'mdr']);

}
