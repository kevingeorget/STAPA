<?php

require_once('model/configAccessDb.php');
require_once('model/dbConnect.php');
require_once('model/getQuery.php');

function getDisplayQuery($queryNumber)
{
    $query = getQuery($queryNumber);
    $db = dbConnect();

    try {
        $queryResults = $db->prepare($query);
        $queryResults->execute();
        $result = $queryResults->fetchAll();
        $queryResults->closeCursor();
        return $result;

    } catch(Exception $e) {
        echo "<br />Erreur dans la requete :".$sql."<br /><pre>";
        echo "</pre><br />".$e->getMessage();
    }
}
