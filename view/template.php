<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="http://localhost/ProjetStapa/vue/images/logo50px.png">

    <title><?= $title ?></title>

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>

    <script>
        $(document).ready( function () {
        $('#table_id').DataTable();
        } );

    </script>

</head>

<body>

    <header>
        <div class="titreHeader">
            <img src="http://localhost/ProjetStapa/vue/images/logo50px.svg" alt="" title="">
        </div>
        <div>
            <form method="post" action="index.php?action=logout">
                <input type="submit" value="Déconnexion" />
            </form>
        </div>

        <div id="headerTitle" class="titreHeader">
            <a href="#">PROJET STAPA</a>
        </div>

        <div class="titreHeader">
            <nav>
                <ul>
                    <li><a href="index.php?action=home">Accueil</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>

        <div class="titreHeader">
            <img id="imgLogin" src="http://localhost/ProjetStapa/vue/images/login.svg" alt="" title="">
        </div>
    </header>

    <div id="navLeft">
        <?= $_SESSION[$_SESSION['user_type']] ?>
    </div>

    <div id="content">
        <?= $content ?>
    </div>

    <footer>
        <div class="footer">
            <p>Mentions Légales</p>
        </div>

        <div class="footer">
            <p>Plan</p>
        </div>

        <div class="footer">
            <p>Widget<br /> Réseaux sociaux</p>
        </div>

        <div class="footer">
            <p>Copyright</p>
        </div>
    </footer>


</body>
</html>
