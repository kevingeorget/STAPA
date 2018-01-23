<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="">

    <title><?= $title ?></title>

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="view/css/test.css">
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="public/jquery-3.2.1.min.js"></script>-->
</head>

<body>

    <header>
        <div class="titreHeader">
            <img src="" alt="" title="">
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
            <img id="imgLogin" src="" alt="" title="">
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

    <script>
        $(document).ready( function () {

            $('#table_id').DataTable();

            $('#table_id').on('click', '.update_button', function() { // pour que ça marche sur toute la pagination
                $('#userModal').fadeTo('normal', 1);
                $('#userModal:not(.contact, .subscription)').css('display', 'block');
                var customer_id = $(this).attr("id");

                $.get(
                   'controller/updateCustomerManager.php', // La ressource ciblée
                   {id_personne : customer_id},
                   getJson,
                   'json'
                );

                function getJson(jsonResult) {

                    console.log(jsonResult);
                    $('#last_name').val(jsonResult[0]['Nom']);
                }

                $('#identity').on('click', function(e) {
                    e.preventDefault();
                    $('.identity').css('display', 'block');
                    $('.contact, .subscription').css('display', 'none');
                });

                $('#contact').on('click', function(e) {
                    e.preventDefault();
                    $('.contact').css('display', 'block');
                    $('.identity, .subscription').css('display', 'none');
                });

                $('#subscription').on('click', function(e) {
                    e.preventDefault();
                    $('.subscription').css('display', 'block');
                    $('.identity, .contact').css('display', 'none');
                });
            });

            $('.close').on('click', function() {
                $('#userModal').css('display', 'none');
            });
        });
    </script>
</body>
</html>
