<?php
SELECT COLUMN_NAME
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME='NomDeLaTable'


$requete1 = "SELECT `personnes`.`id_personne` AS 'ID Abonné', `personnes`.`nom` AS 'Nom', `personnes`.`prenom` AS 'Prénom', `personnes`.`naissance` AS 'Date de Naissance', `personnes`.`email` AS 'Adresse email',
`telephone`.`num_telephone` AS 'Téléphone', CONCAT(`adresse`.`num_rue`, ' ', `adresse`.`rue`, ' ', `ville_cp`.`code_post`, ' ', `ville_cp`.`nom_commune`) AS 'Adresse'
    FROM `ville_cp`
    LEFT JOIN `adresse` ON `adresse`.`id_ville` = `ville_cp`.`id_ville`
    LEFT JOIN `habite` ON `habite`.`id_adresse` = `adresse`.`id_adresse`
    LEFT JOIN `personnes` ON `habite`.`id_personne` = `personnes`.`id_personne`
    LEFT JOIN `joindre` ON `joindre`.`id_personne` = `personnes`.`id_personne`
    LEFT JOIN `telephone` ON `joindre`.`id_tel` = `telephone`.`id_tel`
    WHERE (`personnes`.`nom` <> '')
    GROUP BY`personnes`.`id_personne`
    ORDER BY `personnes`.`nom`
    ASC";


$requete2 = 'SELECT `personnes`.*, `carte_abonnement`.*, `personnes`.`naissance`
    FROM `personnes`
    LEFT JOIN `carte_abonnement` ON `carte_abonnement`.`id_personne` = `personnes`.`id_personne`
    WHERE `carte_abonnement`.`date_fin_validite` > "2017-12-21"
    AND `personnes`.`naissance` > "2000-01-01"';


$requete3 = "SELECT `personnes`.`nom`, `personnes`.`prenom`, `carte_abonnement`.`date_fin_validite`
    FROM `personnes`
    LEFT JOIN `carte_abonnement` ON `carte_abonnement`.`id_personne` = `personnes`.`id_personne`
    WHERE (`carte_abonnement`.`date_fin_validite` > '2017-12-21')
    ORDER BY `personnes`.`nom`
    ASC";


//Afficher les propriétés d’usagers (Nom, Prénom, Adresse complète, Téléphone, Date de naissance)
$requete1bis = "SELECT personnes.prenom AS 'PRENOM' ,personnes.nom AS 'NOM', date_format(personnes.naissance ,'%d/%m/%Y') AS 'DATE DE NAISSANCE'
    ,concat( adresse.num_rue,' ',adresse.rue,' ',ifnull(adresse.residence, ''),ifnull(adresse.batiment, ''))
    AS 'ADRESSE',ville_cp.nom_commune AS 'VILLE',ville_cp.code_post AS 'CODE POSTAL',telephone.num_telephone AS 'NUMERO DE TELEPHONE'
    ,type_telephone.denom_typ_tel AS 'TYPE DE TELEPHONE' FROM personnes
    INNER JOIN joindre ON personnes.id_personne = joindre.id_personne
    INNER JOIN telephone ON joindre.id_tel = telephone.id_tel
    INNER JOIN type_telephone ON telephone.id_type_tel = type_telephone.id_type_tel
    INNER JOIN habite ON personnes.id_personne = habite.id_personne
    INNER JOIN adresse ON habite.id_adresse = adresse.id_adresse
    INNER JOIN ville_cp ON adresse.id_ville = ville_cp.id_ville";
    /* DESACTIVER LES BALISES POUR CHERCHER UNE PERSONNE PRECISE */
    # where nom = 'Bouzigon'
    # and prenom = 'Matthieu'
    /*regroupe les lignes qui ont la même valeur*/
    # GROUP BY nom'


// Afficher le nombre d’usagers mineurs ayants un abonnement en cours de validite
$requete2bis = "SELECT year(now()), count(distinct carte_abonnement.id_personne) AS 'POUR L ANNEE' AS 'MINEURS AVEC ABO VALIDE'
    FROM carte_abonnement
    inner join personnes on carte_abonnement.id_personne = personnes.id_personne
    left join resilie on carte_abonnement.id_abonnement = resilie.id_abonnement
    //CONDITIONS pour NE PRENDRE EN COMPTE QUE DES PERSONNES DE MOINS DE 18
    ANS AVEC DES ABONNEMENTS QUI N’ONT PAS EXPIRE ET NON RESILIE */
    where personnes.naissance > (now() - interval 18 year)
    and carte_abonnement.date_fin_validite > now()
    and date_resiliation is null";


# Afficher la liste des usagers ayant des abonnements en cours de validité
$requete3bis = "SELECT personnes.id_personne, personnes.prenom, personnes.nom, date_format(personnes.naissance ,'%d/%m/%Y'),concat( num_rue
,' ',rue,' ',ifnull(residence, ''),ifnull(batiment, '')),nom_commune,code_postFROM carte_abonnement AS 'USAGER N°' AS 'PRENOM' AS 'NOM' AS 'DATE DE NAISSANCE' AS 'ADRESSE' AS 'VILLE'
AS 'CODE POSTAL'INNER JOIN personnes ON carte_abonnement.id_personne = personnes.id_personne
INNER JOIN habite ON personnes.id_personne = habite.id_personne
INNER JOIN adresse ON habite.id_adresse = adresse.id_adresse
INNER JOIN ville_cp ON adresse.id_ville = ville_cp.id_ville
LEFT JOIN resilie ON carte_abonnement.id_abonnement = resilie.id_abonnement
/*CONDITIONS POUR NE PRENDRE EN COMPTE QUE DES PERSONNES AVEC DES
ABONNEMENTS QUI N'ONT PAS EXPIRE ET NON RESILIE */
WHERE carte_abonnement.date_fin_validite > now() AND resilie.date_resiliation is null
group by personnes.id_personne
ORDER BY personnes.id_personne";

// Afficher la liste des usagers ayant des abonnements en cours de validité et classée par commune
$requete4bis = "SELECT nom_commune,code_post,personnes.id_personne,personnes.prenom,personnes.nom,date_format(personnes.naissance ,'%d/%m/%Y')
,concat( num_rue,' ',rue,' ',ifnull(residence, ''),ifnull(batiment, '')) AS 'VILLE' AS 'CODE POSTAL' AS 'USAGER N°' AS 'PRENOM' AS 'NOM' AS 'DATE DE NAISSANCE' AS 'ADRESSE'
FROM carte_abonnement
INNER JOIN personnes ON carte_abonnement.id_personne = personnes.id_personne
INNER JOIN habite ON personnes.id_personne = habite.id_personne
INNER JOIN adresse ON habite.id_adresse = adresse.id_adresse
INNER JOIN ville_cp ON adresse.id_ville = ville_cp.id_ville
LEFT JOIN resilie ON carte_abonnement.id_abonnement = resilie.id_abonnement
/*CONDITIONS POUR NE PRENDRE EN COMPTE QUE DES PERSONNES AVEC DES
ABONNEMENTS QUI N’ONT PAS EXPIRE ET NON RESILIE */
WHERE carte_abonnement.date_fin_validite > now() AND resilie.date_resiliation is null
/* GROUPE PAR PERSONNE ET PAR VILLE */
group by personnes.id_personne, ville_cp.nom_commune
ORDER BY nom_commune";

// Afficher le nombre d’abonnements en cours de validité pour chacun des types d’abonnements
$requete5bis = "SELECT carte_abonnement.id_type_ab,type_abonnement.denom_ab,count( if(carte_abonnement.date_fin_validite > now(),
if(resilie.date_resiliation is null,type_abonnement.denom_ab,null),null)) ABONNEMENTS EN COURS DE VALIDITE',year(now())
AS 'N°' AS 'TYPE ABONNEMENT' AS 'NOMBRE D' AS 'ANNEE' FROM type_abonnement
INNER JOIN carte_abonnement ON carte_abonnement.id_type_ab = type_abonnement.id_type_ab
LEFT JOIN resilie ON carte_abonnement.id_abonnement = resilie.id_abonnement
group by carte_abonnement.id_type_ab
ORDER BY carte_abonnement.id_type_ab";


//Afficher le chiffre d’affaires réalisé sur l’année en cours pour chacun des types d’abonnements
set @annee = year(now()); /* VALEUR MODIFIABLE POUR OBTENIR LES CHIFFRES D'AFFAIRE DES AUTRES ANNEES */
/*------------------------------------------------------------------------------------------------------*/
$requete6bis = "SELECT carte_abonnement.id_type_ab,type_abonnement.denom_abas 'N° ABONNEMENT'AS 'TYPE ABONNEMENT'
/* somme des tarifs d'abonnements + somme des duplicatas - somme des résiliations */,concat((
(sum(if( year(carte_abonnement.date_paiement) = @annee, if(prix_duplicata != 0, 0,histo_tarif_abo.tarif),0)))
+ (sum(if(year(duplicata.date_duplicata) = @annee, duplicata.prix_duplicata, 0)))
- (sum(if(year(resilie.date_resiliation) = @annee, if(prix_duplicata != 0, 0, resilie.montant_remb)
,0)))),'€') AS 'CHIFFRE D AFFAIRE TOTAL SUR L ANNEE'
, @annee AS 'ANNEE'
from carte_abonnement
inner join type_abonnement on carte_abonnement.id_type_ab = type_abonnement.id_type_ab
inner join histo_tarif_abo on carte_abonnement.id_type_ab = histo_tarif_abo.id_type_ab
left join duplicata on carte_abonnement.id_abonnement = duplicata.id_abonnement
left join resilie on carte_abonnement.id_abonnement = resilie.id_abonnement
/*CONDITIONS POUR SELECTIONNER LES TARIFS CORRESPONDANTS A L'ANNEE CHOISIE*/
where (year(histo_tarif_abo.date_prise_effet) = @annee )
group by type_abonnement.denom_ab
order by carte_abonnement.id_type_ab";


// Afficher les informations du représentant légal d’un usager donné. ##
set @id_mineur = ""; /* ID DE LA PERSONNE MINEURE
/*---------------------------------------------------------------*/
$requete7 = "SELECT personnes.id_personne AS 'USAGER N°', concat(personnes.prenom, ' ',personnes.nom) AS 'USAGER' ,concat(year(now()) - year(personnes.naissance), ' ans')
AS 'AGE' ,concat(representant.prenom, ' ',representant.nom) AS 'REPRESENTANT',concat( r_adresse.num_rue,' ',r_adresse.rue,' ',
ifnull(r_adresse.residence, ''),ifnull(r_adresse.batiment, ''))AS 'ADRESSE REPRESENTANT',r_ville_cp.nom_commune AS 'VILLE REPRESENTANT',r_ville_cp.code_post
AS 'CODE POSTAL REPRESENTANT',representant.email AS 'E-MAIL REPRESENTANT',r_telephone.num_telephone AS 'N° de TELEPHONE TUTEUR',r_type_telephone.denom_typ_tel
AS 'TYPE de TELEPHONE REPRESENTANT'/* table 'personne' pour les informations du mineur */
FROM personnes
INNER JOIN joindre ON personnes.id_personne = joindre.id_personne
INNER JOIN telephone ON joindre.id_tel = telephone.id_tel
INNER JOIN type_telephone ON telephone.id_type_tel = type_telephone.id_type_tel
INNER JOIN habite ON personnes.id_personne = habite.id_personne
INNER JOIN adresse ON habite.id_adresse = adresse.id_adresse
INNER JOIN ville_cp ON adresse.id_ville = ville_cp.id_ville
/* table 'personne' renommée 'représentant' pour associer les informations du tuteur au mineur */
left join personnes as representant on personnes.id_personne_1 = representant.id_personne
inner join joindre as r_joindre on representant.id_personne = r_joindre.id_personne
inner join telephone as r_telephone on r_joindre.id_tel = r_telephone.id_tel
inner join type_telephone as r_type_telephone on r_telephone.id_type_tel = r_type_telephone.id_type_tel
inner join habite as r_habite on representant.id_personne = r_habite.id_personne
inner join adresse as r_adresse on r_habite.id_adresse = r_adresse.id_adresse
inner join ville_cp as r_ville_cp on r_adresse.id_ville = r_ville_cp.id_ville
where personnes.id_personne = @id_mineur
group by r_telephone.num_telephone";


// Afficher le nombre d’usagers par année et par établissement scolaire ###
$requete8bis = "SELECT year(descend_point.date_debut_descent), list_etablissement.id_etablissement, list_etablissement.denomination_etablissement
,count(descend_point.date_debut_descent)
as 'ANNEE' AS 'N° ETAB' AS 'ETABLISSEMENT' AS 'NOMBRE USAGERS'
FROM descend_point
inner join passe on descend_point.id_arret = passe.id_arret
left join list_etablissement on passe.id_etablissement = list_etablissement.id_etablissement
inner join carte_abonnement on descend_point.id_abonnement = carte_abonnement.id_abonnement
GROUP BY ANNEE, list_etablissement.denomination_etablissement
order by ANNEE desc, passe.id_etablissement
";

//Afficher l’historique complet des abonnements pour un usager donné
set @id_usager = ""; /* ID de l'USAGER Pour lequel on Veut Vérifier l HISTORIQUE */
/*---------------------------------------------------------------*/
$requete9bis = "SELECT concat(prenom,' ',nom) AS 'USAGER' ,type_abonnement.denom_ab AS 'TYPE ABO' ,carte_abonnement.id_abonnement
AS 'N° ABO' ,date_format(carte_abonnement.date_paiement ,'%d/%m/%Y') AS 'DATE D ACHAT' ,date_format(carte_abonnement.date_fin_validite ,'%d/%m/%Y')
AS 'DATE FIN VALIDITE' ,carte_abonnement.moyen_paiement AS 'MOYEN PAIEMENT' ,ifnull(count(duplicata.id_duplicata),0)
AS 'NB DUPLICATAS' ,ifnull(sum(duplicata.prix_duplicata),0) AS 'COUT DUPLICATAS (€)' ,ifnull(date_format(resilie.date_resiliation,'%d/%m/%Y'),'pas de resiliation')
AS 'DATE RESILIATION' ,ifnull(sum(resilie.montant_remb),0) AS 'MONTANT REMBOURSE (€)'
FROM carte_abonnement
inner join personnes on carte_abonnement.id_personne = personnes.id_personne
inner join type_abonnement on carte_abonnement.id_type_ab = type_abonnement.id_type_ab
left join duplicata on carte_abonnement.id_abonnement = duplicata.id_abonnement
left join resilie on carte_abonnement.id_abonnement = resilie.id_abonnement
WHERE carte_abonnement.id_personne = @id_usager
group by carte_abonnement.id_abonnement
order by carte_abonnement.id_abonnement";


//Afficher l’ensemble des points de montée et de descente pour un usager donné ayant un abonnement scolaire
set @id_usager = ""; /* ID de l'USAGER AVEC UN ABONNEMENT SCOLAIRE POUR LEQUEL ON VEUT VERIFIER L HISTORIQUE DES POINTS DE MONTEE/DESCENTE */
/* la colonne 'ACTION' sert à différencier les points enregistrés lors de la souscription de ceux saisis au cours d'une modification */
/* selectionne les points de montée de la personne */
/*---------------------------------------------------------------*/
$requete10bis = "SELECT * from((select concat(pers1.prenom, ' ', pers1.nom) AS 'USAGER' ,monte_point.id_abonnement
AS ABONNEMENT ,concat('Point de MONTEE - arret n° ',monte_point.id_arret) AS 'POINTS' ,monte_point.date_debut_monte
AS ENREGISTREMENT ,if(monte_point.date_debut_monte = cart1.date_paiement,'souscription','modification') AS 'AU COURS DE'
FROM monte_point
inner join carte_abonnement AS cart1 on monte_point.id_abonnement = cart1.id_abonnement
inner join personnes AS pers1 on cart1.id_personne = pers1.id_personne
where cart1.id_type_ab = 3 and pers1.id_personne = @id_usager)"

UNION
/*selectionne les points de descente de la personne et les ajoute à la suite via la fonction 'union' */
("SELECT concat(pers2.prenom, ' ', pers2.nom) AS 'USAGER' ,descend_point.id_abonnement AS ABONNEMENT ,concat('Point de DESCENTE - arret n° ',descend_point.id_arret)
AS 'POINTS' ,descend_point.date_debut_descent AS ENREGISTREMENT ,if(descend_point.date_debut_descent = cart2.date_paiement,'souscription','modification') AS 'AU COURS DE'
FROM descend_point
inner join carte_abonnement AS cart2 on descend_point.id_abonnement = cart2.id_abonnement
inner join personnes AS pers2 on cart2.id_personne = pers2.id_personne
WHERE cart2.id_type_ab = 3 and pers2.id_personne = @id_usager)) AS a
/* ordonne les resultats par n° d'abonnement puis par date d’enregistrement des points */
order by ABONNEMENT, ENREGISTREMENT";


// Afficher les noms des usagers ayant un abonnement scolaire en cours de validité, classés par point de montée
set @type = 3 /* CHANGER LE TYPE POUR VOIR LES USAGER CLASSES PAR POINT DE MONTEE D'UN AUTRE TYPE D'ABONNEMENT */;
$requete11bis = "SELECT monte_point.id_arret AS 'POINTS DE MONTEE' ,concat(personnes.prenom, ' ', personnes.nom) AS 'USAGER'
,type_abonnement.denom_ab AS 'TYPE ABONNEMENT'
FROM monte_point
inner join carte_abonnement on monte_point.id_abonnement = carte_abonnement.id_abonnement
inner join personnes on carte_abonnement.id_personne = personnes.id_personne
inner join type_abonnement on carte_abonnement.id_type_ab = type_abonnement.id_type_ab
LEFT JOIN resilie ON carte_abonnement.id_abonnement = resilie.id_abonnement
WHERE carte_abonnement.id_type_ab = @type
AND carte_abonnement.date_fin_validite > now()
AND resilie.date_resiliation is null
group by monte_point.id_arret, USAGER
order by monte_point.id_arret, USAGER";


//Afficher le nombre d’usagers ayant un abonnement scolaire en cours de validité, classés par point de montée
set @type = 3; /* CHANGER LE TYPE POUR VOIR LES USAGER CLASSES PAR POINT DE MONTEE D'UN AUTRE TYPE D'ABONNEMENT */
$requete12bis = "SELECT monte_point.id_arret as 'POINTS DE MONTEE',count(personnes.id_personne) as 'NBRE USAGER', type_abonnement.denom_ab as 'TYPE ABONNEMENT'from monte_point
inner join carte_abonnement on monte_point.id_abonnement = carte_abonnement.id_abonnement
inner join personnes on carte_abonnement.id_personne = personnes.id_personne
inner join type_abonnement on carte_abonnement.id_type_ab = type_abonnement.id_type_ab
left JOIN resilie on carte_abonnement.id_abonnement = resilie.id_abonnement
WHERE carte_abonnement.id_type_ab = @type
and carte_abonnement.date_fin_validite > now() AND resilie.date_resiliation is null
group by monte_point.id_arret
order by monte_point.id_arret";


//Afficher le nombre d’usagers ayant un abonnement scolaire en cours de validité, classés par point de descente
$requete13bis = "SELECT descend_point.id_arret as 'POINTS DE DESCENTE',count(distinct(carte_abonnement.id_personne)) as 'NBRE USAGERS',type_abonnement.denom_ab as 'TYPE ABONNEMENT'
FROM descend_point
inner join carte_abonnement on descend_point.id_abonnement = carte_abonnement.id_abonnement
inner join personnes on carte_abonnement.id_personne = personnes.id_personne
inner join type_abonnement on carte_abonnement.id_type_ab = type_abonnement.id_type_ab
left JOIN resilie on carte_abonnement.id_abonnement = resilie.id_abonnement
WHERE carte_abonnement.id_type_ab = 3
and carte_abonnement.date_fin_validite > now() AND resilie.date_resiliation is null
group by descend_point.id_arret
order by descend_point.id_arret";


//Afficher la liste complète des duplicata réalisés pour un usager donné, en mentionnant les coûts éventuels
set @id_usager = ""; /* SAISIR L'ID DE L'USAGER SOUHAITE */
/*---------------------------------------------------------------*/
$requete14bis = "SELECT concat(personnes.prenom, ' ',personnes.nom) as 'USAGER', duplicata.num_duplicata as 'N° DUPLICATA', duplicata.id_abonnement as 'POUR ABONNEMENT N°'
,duplicata.date_duplicata as 'REALISE LE',ifnull(duplicata.prix_duplicata, 'gratuit') as 'COUT'
FROM duplicata
inner join carte_abonnement on duplicata.id_abonnement = carte_abonnement.id_abonnement
inner join personnes on carte_abonnement.id_personne = personnes.id_personne
WHERE personnes.id_personne = @id_usager";

// Afficher la liste des usagers ayant effectué des annulations sur l’année en cours.
set @annee = "2017"; /* SAISIR L'ANNEE SOUHAITEE */
/*----------------------------------------------------------------------*/
$requete15bis = "SELECT resilie.id_personne as 'N° USAGER' ,concat(personnes.prenom, ' ', personnes.nom) as 'USAGER' ,resilie.id_abonnement as 'N° ABONNEMENT'
,resilie.date_resiliation as 'DATE RESILIATION' ,concat(resilie.montant_remb,' ','€') as 'MONTANT REMBOURSEMENT' ,@annee as 'POUR L ANNEE'
FROM resilie
inner join personnes on resilie.id_personne = personnes.id_personne
WHERE year(resilie.date_resiliation) = @annee";

//Afficher la liste des résiliations d'un usager
set @id_personne = ""; /* SAISIR L'ID DE LA PERSONNE POUR LAQUELLE L'ON CHERCHE LES RESILIATIONS */
/*----------------------------------------------------------------------------------------------------------------------*/
$requete16bis = "SELECT resilie.id_personne ,concat(personnes.prenom, ' ', personnes.nom) ,resilie.id_abonnement ,resilie.date_resiliation ,concat(resilie.montant_remb,' ','€')
as 'N° USAGER' as 'USAGER' as 'N° ABONNEMENT' as 'DATE RESILIATION' as 'MONTANT REMBOURSEMENT'
FROM resilie
inner join personnes on resilie.id_personne = personnes.id_personne
WHERE personnes.id_personne = @id_personne";


$requete16 = 'SELECT `personnes`.`nom`, `personnes`.`prenom`, `resilie`.`date_resiliation`
    FROM `personnes`
    LEFT JOIN `resilie` ON `resilie`.`id_personne` = `personnes`.`id_personne`
    WHERE (`resilie`.`date_resiliation` > "2016-01-01")
    ORDER BY `personnes`.`nom`
    ASC';
