<?php
require($_SERVER['DOCUMENT_ROOT'].'/ProjetStapaKevin/model/model.php');

$logResult = getLogResult($login, $password);

if ($logResult['number_of_lines'] != 1) {
    echo 'Identifiant ou mot de passe incorrect';
    require($_SERVER['DOCUMENT_ROOT'].'/ProjetStapaKevin/index.php');

// TODO: erreur si lignes >= 2

} else {
    // Ici on affiche le template en fonction du type user
    $_SESSION['logged'] = true;

    switch ($logResult['user_id_type']) {
        case 1 : $_SESSION['user_type'] = 'User';
        break;
        case 2 : $_SESSION['user_type'] = 'Operator';
        break;
        case 3 : $_SESSION['user_type'] = 'Administrator';
        break;
        default: echo "Votre compte est mal paramétré. Merci de prendre contact avec votre support informatique";
        break;
    }
    require('navManager.php');
}
