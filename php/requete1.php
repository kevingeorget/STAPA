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

$reponse = $bdd->query('SELECT `personnes`.`nom`, `personnes`.`prenom`, `personnes`.`naissance`, `personnes`.`email`,
 `telephone`.`num_telephone`, `adresse`.`num_rue`, `adresse`.`rue`, `ville_cp`.`code_post`, `ville_cp`.`nom_commune`
    FROM `ville_cp`
    LEFT JOIN `adresse` ON `adresse`.`id_ville` = `ville_cp`.`id_ville`
    LEFT JOIN `habite` ON `habite`.`id_adresse` = `adresse`.`id_adresse`
    LEFT JOIN `personnes` ON `habite`.`id_personne` = `personnes`.`id_personne`
    LEFT JOIN `joindre` ON `joindre`.`id_personne` = `personnes`.`id_personne`
    LEFT JOIN `telephone` ON `joindre`.`id_tel` = `telephone`.`id_tel`
    WHERE (`personnes`.`nom` <> "")
    ORDER BY `personnes`.`nom` ASC');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())

    echo $donnees['nom']." ".$donnees['prenom']." né(e) le : ".$donnees['naissance']." email : ".$donnees['email']." n° tel : ".
    $donnees['num_telephone']." habite au : ".$donnees['num_rue']." ".$donnees['rue']." ".$donnees['code_post']." ".$donnees['nom_commune']."\n";

$reponse->closeCursor(); // Termine le traitement de la requête

?>


