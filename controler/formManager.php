<?php
session_start();

if ($_SESSION['logged'] !== true) {
    echo "Accès à la page session refusé";
} else {
?>

    <!DOCTYPE html>
    <html lang="fr">
    <?php //include("head.php"); ?>
    <link href="choix_requete.css" rel="stylesheet" type="text/css">

    <body>
        <?php //include("header.php"); ?>
        <section id="nav">
            <nav>
                    <ul>
                            <li><a href="template.php?form=affichage" title="Requêtes à la base données (17 requêtes d'affichage courantes)">Requêtes</a></li>
                            <li><a href="formulaire.php?form=gestion" title="Gérer les comptes des abonnés à STAPA">Gestion abonnés</a></li>
                            <li><a href="formulaire.php?form=administration" title="Gérer les comptes et les droits des utilisateurs de la base de données">Administration</a></li>
                    </ul>
            </nav>
        </section>

</body>
</html>
<?php
}
?>
