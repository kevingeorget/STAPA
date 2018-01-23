<?php
$title = 'Administration comptes utilisateur';
ob_start();
?>
<section id="admin_users">
    <h2>Administration des comptes utilisateur</h2>
    <fieldset>
        <legend>Ajouter utilisateur</legend>
        <form method="post" action="index.php?action=">
            <input type="text" id="name" /><label for "name">Nom</label><br />
            <input type="text" id="first_name" /><label for "first_name">Prénom</label><br />
            <input type="submit" name="add_user" value="Ajouter" />
        </form>
    </fieldset>
    <fieldset>
        <legend>Supprimer utilisateur</legend>
        <form method="post" action="index.php?action=">
            <input type="text" id="name" /><label for "name">Nom</label><br />
            <input type="text" id="first_name" /><label for "first_name">Prénom</label><br />
            <input type="submit" name="delete_user" value="Supprimer" />
        </form>
    </fieldset>
</section>
<?php
$content = ob_get_clean();
require('view/template.php');
