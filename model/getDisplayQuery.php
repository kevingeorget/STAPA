<?php

require_once('configAccessDb.php');
require_once('dbConnect.php');
require_once('getQuery.php');

function getDisplayQuery($queryNumber)
{
    $query = getQuery($queryNumber);
    $db = dbConnect();

    try {
        $queryResults = $db->prepare($query);
        $queryResults->execute();
        $result = $queryResults->fetch();
        $queryResults->closeCursor();
        return $result;

    } catch(Exception $e) {
        echo "<br />Erreur dans la requete :".$sql."<br /><pre>";
        echo "</pre><br />".$e->getMessage();
    }
}
