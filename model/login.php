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
    $sql_type_utilisateur = "SELECT `utilisateur`.`id_type_utilisateur` FROM `utilisateur` WHERE login='$username' AND password_utilisateur='$password'";

    try {
        $req = $db->prepare($sql_login);
        $req->execute();
        $result = $req->rowCount();
         //on stocke le résultat dans un array
    
        $req = $db->prepare($sql_type_utilisateur);
        $req->execute();
        $type_utilisateur = $req->fetch();
      //on stocke le résultat dans un array
        
         if ($result == 1) {
            $_SESSION['acces']=true;// Initializing Session
            switch ($type_utilisateur[0]) {
                case "1":
                    $_SESSION['profil']="operateur";
                    header("location: ../pages/acces_operateur.php"); // Redirecting To Other Page
                break;
                case "2":
                    $_SESSION['profil']="superviseur";
                    header("location: ../pages/acces_superviseur.php"); // Redirecting To Other Page
                break;
                case "3":
                    $_SESSION['profil']="administrateur";
                    header("location: ../pages/acces_administrateur.php"); // Redirecting To Other Page
                break;
                default:
                    echo "Votre profil est mal paramétré. Merci de prendre contact avec votre support informatique";
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