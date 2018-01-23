<?php

require_once('model/configAccessDb.php');
require_once('model/dbConnect.php');

function getLogResult($login, $password)
{
    $db = dbConnect();
    try {
        $queryResults = $db->prepare("SELECT * FROM `utilisateur` WHERE login='$login' AND password_utilisateur='$password'");
        $queryResults->execute();
        $numberOfLines = $queryResults->rowCount();
        $result = $queryResults->fetch();

        $userIdType = ($numberOfLines == 1) ? $result['id_type_utilisateur'] : null;

        $queryResults->closeCursor();
        return array(
            'number_of_lines' => $numberOfLines,
            'user_id_type' => $userIdType,
            'user_first_name' => $result['prenom_utilisateur'],
            'user_name' => $result['nom_utilisateur']
        );
    } catch(Exception $e) {
        echo "<br />Erreur dans la requete<br />";
        echo $e->getMessage();
    }
}
