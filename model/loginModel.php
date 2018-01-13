<?php
session_start();

require_once('configAccessDb.php');
require_once('dbConnect.php');
require_once('queryList.php');

function loginCheck($login, $password)
{
    $db = dbConnect();

    $req = $db->prepare($userLogin_Password);
    $req->execute();

    $numberOfLines = $req->rowCount();

    $result = $req->fetch();

    $userIdType = ($numberOfLines == 1) ? $result['id_type_utilisateur'] : null;
    // Transforme l'id du type utilisateur en type d'utilisateur
    return array(
        'number_of_lines' => $numberOfLines,
        'user_id_type' => $userIdType,
        'user_firstname' => $result['prenom_utilisateur'],
        'user_name' => $result['nom_utilisateur']
    );

