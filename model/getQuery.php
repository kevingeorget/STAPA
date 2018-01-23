<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/projetweb_stapa/STAPA/model/configAccessDb.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/projetweb_stapa/STAPA/model/dbConnect.php');

function getQuery($queryNumber)
{
    $db = dbConnect();
    try {
        $queryResults = $db->prepare('SELECT requete_sql FROM requetes_usuelles WHERE numero_requete = ?');
        $queryResults->execute($queryNumber);
        $result = $queryResults->fetch();
        $queryResults->closeCursor();
        return $result['requete_sql'];

    } catch(Exception $e) {
        echo "<br />Erreur dans la requete<br />";
        echo $e->getMessage();
    }
}
