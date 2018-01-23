<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/projetweb_stapa/STAPA/model/dbConnect.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/projetweb_stapa/STAPA/model/getQuery.php');

function getDisplayQuery($queryNumber)
{
    $query = getQuery($queryNumber);
    $db = dbConnect();

    try {
        $queryResults = $db->prepare($query);
        $queryResults->execute();
        $result = $queryResults->fetchAll(PDO::FETCH_ASSOC);  // ---> permet de retourner un tableau assoc.
        $queryResults->closeCursor();
        return $result;

    } catch(Exception $e) {
        echo "<br />Erreur dans la requete<br />";
        echo $e->getMessage();
    }
}
