<?php

require_once('configAccessDb.php');
require_once('dbConnect.php');

function getLogResult($login, $password)
{
    $db = dbConnect();
    try {
        $req = $db->prepare("SELECT * FROM `utilisateur` WHERE login='$login' AND password_utilisateur='$password'");
        $req->execute();
        $numberOfLines = $req->rowCount();
        $result = $req->fetch();
        //$logged = (bool) $numberOfLines;
        $userIdType = ($numberOfLines == 1) ? $result['id_type_utilisateur'] : null;
        // Transforme l'id du type utilisateur en type d'utilisateur
        return array(
            'number_of_lines' => $numberOfLines,
            'user_id_type' => $userIdType,
            'user_firstname' => $result['prenom_utilisateur'],
            'user_name' => $result['nom_utilisateur']
        );
    } catch(Exception $e) {
        echo "<br>Erreur dans la requete :".$sql."<br><pre>";
        print_r();
        echo "</pre><br>".$e->getMessage();
    }
}
