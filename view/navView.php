
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
<?php $navLeft['administrator'] = ob_get_clean();

require('accueil.php');
?>
