<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="./view/images/logo50px.png">

    <title>Titre PHP</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link href="./view/css/clear.css" rel="stylesheet" type="text/css">
    <link href="./view/css/home.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="container">
        <header>
            <div class="titreHeader">
                <img src="./view/images/logo50px.svg" alt="" title="">
            </div>

            <div id="headerTitle" class="titreHeader">
                <a href="#">PROJET STAPA</a>
            </div>

            <div class="titreHeader">
                <nav>
                    <ul>
                        <li><a href="/STAPA/index.php">Accueil</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="titreHeader">
                <img id="imgLogin" src="./view/images/login.svg" alt="" title="">
            </div>

        </header>

        <div id="container2">
            
            <div  id="navLeft">
        
            <?php echo $navLeft ?>

            </div>

            <div id="content">

            <?php echo $content ?>
            
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