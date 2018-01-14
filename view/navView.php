
<?php
$navLeft['unlogged'] = '';
ob_start(); ?>
<nav>
    <ul>
        <li class="navIntermediaire"><a href="">Affichage requête</a></li>
        <?php $navLeft['user'] = ob_get_contents() . '</ul></nav>'; ?>
        <li class="navIntermediaire">Gestion client</li>
            <ul>
                <li class="sousNav"><a href="">Afficher un client</a></li>
                <li class="sousNav"><a href="">Modifier un client</a></li>
                <li class="sousNav"><a href="">Supprimer un client</a></li>
            </ul>
        <?php $navLeft['operator'] = ob_get_contents() . '</ul></nav>'; ?>
        <li class="navIntermediaire">Gestion utilisateur</li>
            <ul>
                <li class="sousNav"><a href="">Afficher un utilisateur</a></li>
                <li class="sousNav"><a href="">Modifier un utilisateur</a></li>
                <li class="sousNav"><a href="">Supprimer un utilisateur</a></li>
            </ul>
    </ul>
</nav>
<?php $navLeft['administrator'] = ob_get_clean(); ?>

<?php ob_start(); ?>
<section id='accueil'>
        <h1>Bonjour <?= $_SESSION['user_first_name'] . ' ' . $_SESSION['user_name'] ?>! Bienvenue dans l'outil STAPA</h1>
        <p>
            Vous êtes connecté(e) en tant que: <?= $_SESSION['user_type'] ?>! <br />
            Utilisez le menu à gauche de l'écran pour accéder au service voulu!
        </p>
</section>
<?php $_SESSION['content'] = ob_get_clean();
require('accueil.php');
?>
