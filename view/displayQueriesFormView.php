<?php
$title = 'Requètes usuelles';
ob_start(); ?>
<section id="interroger">
    <h2>Interroger la base de données</h2>
    <fieldset>
        <legend>Choix de votre requête</legend>
        <form method="post" action="index.php?action=get_display_query">
            <h5>Veuillez choisir la requête à afficher :</h5>
                <input type="radio" name="query" value="1" id="query1" /> <label for="query1">Requête 1 - Afficher les propriétés des usagers (Nom, Prénom, Adresse complète, Téléphone, Date de naissance)</label><br />
                <input type="radio" name="query" value="2" id="query2" /> <label for="query2">Requête 2 - Afficher le nombre d’usagers mineurs ayant un abonnement en cours de validité.</label><br />
                <input type="radio" name="query" value="3" id="query3" /> <label for="query3">Requête 3 - Afficher la liste des usagers ayant des abonnements en cours de validité.</label><br />
                <input type="radio" name="query" value="4" id="query4" /> <label for="query4">Requête 4 - Afficher la liste des usagers ayant des abonnements en cours de validité et classée par commune.</label><br />
                <input type="radio" name="query" value="5" id="query5" /> <label for="query5">Requête 5 - Afficher le nombre d’abonnements en cours de validité pour chacun des types d’abonnements</label><br />
                <input type="radio" name="query" value="6" id="query6" /> <label for="query6">Requête 6 - Afficher le chiffre d’affaires réalisé sur l’année en cours pour chacun des types d’abonnements.</label><br />
                <input type="radio" name="query" value="7" id="query7" /> <label for="query7">Requête 7 - Afficher les informations du représentant légal d’un usager donné.</label><br />
                <input type="radio" name="query" value="8" id="query8" /> <label for="query8">Requête 8 - Afficher le nombre d’usagers par année et par établissement scolaire.</label><br />
                <input type="radio" name="query" value="9" id="query9" /> <label for="query9">Requête 9 - Afficher l’historique complet des abonnements pour un usager donné.</label><br />
                <input type="radio" name="query" value="10" id="query10" /> <label for="query10">Requête 10 - Afficher l’ensemble des points de montée et de descente pour un usager donné ayant un abonnement scolaire.</label><br />
                <input type="radio" name="query" value="11" id="query11" /> <label for="query11">Requête 11 - Afficher les noms des usagers ayant un abonnement scolaire en cours de validité, classés par point de montée.</label><br />
                <input type="radio" name="query" value="12" id="query12" /> <label for="query12">Requête 12 - Afficher le nombre d’usagers ayant un abonnement scolaire en cours de validité, classés par point de montée.</label><br />
                <input type="radio" name="query" value="13" id="query13" /> <label for="query13">Requête 13 - Afficher le nombre d’usagers ayant un abonnement scolaire en cours de validité, classés par point de descente.</label><br />
                <input type="radio" name="query" value="14" id="query14" /> <label for="query14">Requête 14 - Afficher la liste complète des duplicata réalisés pour un usager donné, en mentionnant les coûts éventuels.</label><br />
                <input type="radio" name="query" value="15" id="query15" /> <label for="query15">Requête 15 - Afficher la liste des usagers ayant effectué des résiliations sur l’année en cours.</label><br />
                <input type="radio" name="query" value="16" id="query16" /> <label for="query16">Requête 16 - Afficher l’ensemble des résiliations réalisés par un usager.</label><br />
            <input name="submit" type="submit" value="Valider" />
        </form>
    </fieldset>
</section>
<?php
$content = ob_get_clean();
require('view/template.php')
?>
