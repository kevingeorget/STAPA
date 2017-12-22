<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=STAPA;charset=utf8', $user='root', $pass='azerty');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video

$reponse = $bdd->query('SELECT `personnes`.`nom`, `personnes`.`prenom`, `resilie`.`date_resiliation`
    FROM `personnes` 
    LEFT JOIN `resilie` ON `resilie`.`id_personne` = `personnes`.`id_personne`
    WHERE (`resilie`.`date_resiliation` > "2016-01-01")
    ORDER BY `personnes`.`nom` ASC');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())

    echo $donnees['nom']." ".$donnees['prenom']."\n";

$reponse->closeCursor(); // Termine le traitement de la requête

?>