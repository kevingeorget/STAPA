<?php

/* A commenter... */
session_start();
require('model/model.php');


if (isset($_POST['submit'])) {
    if (empty($_POST['login']) || empty($_POST['password'])) {
    echo "Erreur sur l'identifiant ou le mot de passe";

    } else {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $logResult = getLogResult($login, $password);

        if ($logResult['number_of_lines'] < 1) {
            $_SESSION['user_type'] = 'unlogged';
            echo 'Identifiant ou mot de passe incorrect';
            require('view/logView.php');

        } elseif ($logResult['number_of_lines'] > 1) {
            echo 'Erreur dans la base de données, contactez votre support informatique';

        } else {
            // Ici on affiche le template en fonction du type user
            $_SESSION['logged'] = true;

            switch ($logResult['user_id_type']) {
                case 1 : $_SESSION['user_type'] = 'user';
                break;
                case 2 : $_SESSION['user_type'] = 'operator';
                break;
                case 3 : $_SESSION['user_type'] = 'administrator';
                break;
                default: echo "Votre compte est mal paramétré. Merci de prendre contact avec votre support informatique";
                break;
            }
            require('view/navView.php');
        }
    }
} else {
    echo 'coucou';
}
