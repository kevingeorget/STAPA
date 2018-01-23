<?php

require_once('configAccessDb.php');
require_once('dbConnect.php');

/*function getDisplayQuery($queryNumber)
{
    $query = getQuery($queryNumber);*/
    $db = dbConnect();

    try {
        $queryResults = $db->prepare("SELECT `personnes`.`nom`, `personnes`.`prenom`, `personnes`.`naissance`, `personnes`.`email`,
        `telephone`.`num_telephone`, `adresse`.`num_rue`, `adresse`.`rue`, `ville_cp`.`code_post`, `ville_cp`.`nom_commune`
        FROM `telephone`
        INNER JOIN `adresse` ON `adresse`.`id_ville` = `ville_cp`.`id_ville`
        INNER JOIN `habite` ON `habite`.`id_adresse` = `adresse`.`id_adresse`
        INNER JOIN `personnes` ON `habite`.`id_personne` = `personnes`.`id_personne`
        INNER JOIN `joindre` ON `joindre`.`id_personne` = `personnes`.`id_personne`
        INNER JOIN `telephone` ON `joindre`.`id_tel` = `telephone`.`id_tel`
        WHERE (`personnes`.`nom` <> '')
        ORDER BY `personnes`.`nom`
        ASC");
        $queryResults->execute();
        $result = $queryResults->fetchAll(PDO::FETCH_ASSOC);  // ---> permet de retourner un tableau assoc.
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        $queryResults->closeCursor();
        return $result;

    } catch(Exception $e) {
        echo "<br />Erreur dans la requete :".$sql."<br /><pre>";
        echo "</pre><br />".$e->getMessage();
    }
