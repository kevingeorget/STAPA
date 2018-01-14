
<?php

 ob_start() ?>
<section>
        <h1>Bienvenue dans l'outil STAPA</h1>
        <p>
            Pour accéder à votre outil de gestion des données clients
            <br />merci de vous identifier
        </p>

        <form action="index.php?action=log" method="post">
            <div id="loginForm">
                <div class="formPart">
                    <label>Username :</label>
                    <input id="Login" name="login" autofocus placeholder="Votre Login" type="text" required><br />
                </div>
                <div class="formPart">
                    <label>Password :</label>
                    <input id="password" name="password" placeholder="********" type="password" required><br />
                </div>
                <div class="formPart">
                    <input name="submit" type="submit" value=" Login ">
                    <input name="mdp" type="submit" value=" Mot de passe oublié ">
                </div>
            </div>
        </form>
</section>
<?php // $content['home'] = ob_get_clean();
    $navLeft['unlogged'] = '';
    $_SESSION['content'] = ob_get_clean();
    require('accueil.php');
//echo $template['left_nav']; ?>
