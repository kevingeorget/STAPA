<?php
session_start();

require(dirname(__DIR__).'/STAPA/model/loginModel.php');

var_dump($_SESSION);
var_dump($_POST);


if (isset($_POST['submit']))
{
    echo "isset submit ok <br />";
    if (empty($_POST['login']) || empty($_POST['password'])) {
        echo "Identifiant ou mot de passe manquant";
    } else {
        echo "isset login et password ok <br />";
        $login = $_POST['login'];
        $password = $_POST['password'];
        $logResult = loginCheck($login, $password);

        if ($logResult['number_of_lines'] < 1)
        {
            echo 'Identifiant ou mot de passe incorrect';
            require(dirname(__DIR__).'/STAPA/view/home.php');

        } elseif ($logResult['number_of_lines'] > 1) {
            echo 'Erreur dans la base de données, contactez votre support informatique';
        } else {
            // Ici on affiche le template en fonction du type user
            $_SESSION['logged'] = true;

            switch ($logResult['user_id_type']) {
                case (1):
                    $_SESSION['user_type'] = '1';
                    break;
                case (2):
                    $_SESSION['user_type'] = '2';
                    break;
                case (3):
                    $_SESSION['user_type'] = '3';
                    break;
                default:
                    echo "Votre compte est mal paramétré. Merci de prendre contact avec votre support informatique";
                    break;
            }

        var_dump($_SESSION);
        header('location: /STAPA/login');
        }} 
} else {
        echo "erreur 404";
}