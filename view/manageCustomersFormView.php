<?php
$title = 'Gestion clients';
ob_start();
?>
<section id="manage_customers">
    <h2>Gestion des clients</h2>
    <fieldset>
        <legend>Ajouter client</legend>
        <form method="post" action="index.php?action=">
            <input type="text" id="name" /><label for "name">Nom</label><br />
            <input type="text" id="first_name" /><label for "first_name">Prénom</label><br />
            <input type="submit" name="add_customers" value="Ajouter" />
        </form>
    </fieldset>
    <fieldset>
        <legend>Supprimer client</legend>
        <form method="post" action="index.php?action=">
            <input type="text" id="name" /><label for "name">Nom</label><br />
            <input type="text" id="first_name" /><label for "first_name">Prénom</label><br />
            <input type="submit" name="delete_customers" value="Supprimer" />
        </form>
    </fieldset>
</section>
<?php
$content = ob_get_clean();
require('view/template.php');
