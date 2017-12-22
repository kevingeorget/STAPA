<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=STAPA;charset=utf8', $user='root', $pass='azerty');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//on prepare la requete et les variables associées
$sql = 'SELECT `personnes`.*, `carte_abonnement`.*, `personnes`.`naissance`
    FROM `personnes`
    LEFT JOIN `carte_abonnement` ON `carte_abonnement`.`id_personne` = `personnes`.`id_personne`
    WHERE `carte_abonnement`.`date_fin_validite` > "2017-12-21" 
    AND `personnes`.`naissance` < "2000-01-01"';

//$datas = array('2016-09-11');

//on exécute la requete

try {
  $req = $bdd->prepare($sql);
  $req->execute();
   //on stocke le résultat dans un array
  $result = $req->fetchAll();
}
catch(Exception $e){
  echo "<br>Erreur dans la requete :".$sql."<br><pre>";
  print_r();
  echo "</pre><br>".$e->getMessage();
}

//affichage du résultat :
$nb0 = count($result);
echo "il y a $nb0 personnes mineurs avec un abonnement valide."."\n";