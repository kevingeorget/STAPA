<?php
session_start();

$db = dbConnect();

//On teste le formulaire
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
    echo "Erreur sur l'identifiant ou le mot de passe";
    }
    else
    {

    // On définit les variables username et mot de passe
    $username=$_POST['username'];
    $password=$_POST['password'];

    require_once 'config.secret.php';

    //contrôle accès BDD
    $sql_login = "SELECT * FROM `utilisateur` WHERE login='$username' AND password_utilisateur='$password'";
    $sql_user_id_type = "SELECT `utilisateur`.`id_type_utilisateur` FROM `utilisateur` WHERE login='$username' AND password_utilisateur='$password'";

    try {
        $req = $db->prepare($sql_login);
        $req->execute();
        $result = $req->rowCount();

        $req = $db->prepare($sql_user_id_type);
        $req->execute();
        $user_id_type = $req->fetch();
      //on stocke le résultat dans un array

         if ($result == 1) {
            $_SESSION['logged']=true;// Initializing Session
            switch ($user_id_type['id_type_utilisateur']) {
                case "1":
                    $_SESSION['user_id_type']="utilisateur";
                    header("location: ../pages/acces_operateur.php"); // TEST    A SUPPRIMER
                break;
                case "2":
                    $_SESSION['user_id_type']="gestionnaire";
                    header("location: ../pages/acces_superviseur.php"); // TEST    A SUPPRIMER
                break;
                case "3":
                    $_SESSION['user_id_type']="administrateur";
                    header("location: ../pages/acces_administrateur.php"); // TEST    A SUPPRIMER
                break;
                default:
                    echo "Votre user_id_type est mal paramétré. Merci de prendre contact avec votre support informatique";
            }
            exit;
        } else {
                echo "Erreur sur l'identifiant ou le mot de passe";
            }
      }
      catch(Exception $e){
        echo "<br>Erreur dans la requete :".$sql."<br><pre>";
        print_r();
        echo "</pre><br>".$e->getMessage();
      }}}
        ?>
