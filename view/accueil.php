<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="http://localhost/ProjetStapa/vue/images/logo50px.png">

    <title>Titre PHP</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link href="./css/clear.css" rel="stylesheet">
    <link href="./css/accueil.css" rel="stylesheet">
</head>

<body>
    <div id="container">
        <header>
            <div class="titreHeader">
                <img src="http://localhost/ProjetStapa/vue/images/logo50px.svg" alt="" title="">
            </div>

            <div id="headerTitle" class="titreHeader">
                <a href="#">PROJET STAPA</a>
            </div>

            <div class="titreHeader">
                <nav>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="titreHeader">
                <img id="imgLogin" src="http://localhost/ProjetStapa/vue/images/login.svg" alt="" title="">
            </div>

        </header>

        <div id="container2">
            <div id="navLeft">
                <?= $navLeft[$_SESSION['user_type']] ?>
            </div>

            <div id="content">
                <?= $_SESSION['content'] ?>
            </div>

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
    </div>
</body>
</html>
