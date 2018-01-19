<?php
session_start();

require_once(dirname(__DIR__).'/STAPA/model/configAccessDb.php');
require_once(dirname(__DIR__).'/STAPA/model/dbConnect.php');


function loginCheck($login, $password)
{
    $db = dbConnect();

    $queryUser = (
        "SELECT *
        FROM `utilisateur`
        WHERE `login` = '$login'
        AND `password_utilisateur` = '$password'"
    );

    $statement = $db->prepare($queryUser);
    $statement->execute();

    $numberOfLines = $statement->rowCount();

    echo $numberOfLines;
    echo "<br />";

    $result = $statement->fetch();

    if ($numberOfLines == 1) {
        return array(
            'number_of_lines' => $numberOfLines,
            'user_id_type' => $result['id_type_utilisateur'],
            'user_firstname' => $result['prenom_utilisateur'],
            'user_name' => $result['nom_utilisateur']
        );
    }
}

/* TEST
$login = 'alex';
$password = 'azerty';

$data = loginCheck($login, $password);

print_r($data);
*/