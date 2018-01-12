<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/ProjetStapa/model/configAccessDb.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/ProjetStapa/model/dbConnect.php");

function user_read($query)
{
    $db = dbConnect();
    $result = [];

    $statement = $db->prepare($query);
    $statement->execute();

    if ($statement->execute()) {
        if ($statement->rowCount()>0) {
            $data = $statement->fetch();
            
            $result = [
            "userId" => $data['id_utilisateur'],
            "userName" => $data['nom_utilisateur'],
            "userFirstName" => $data['prenom_utilisateur'],
            "userLogin" => $data[login],
            "userPassword" => $data[password_utilisateur],
            "userIdType" => $data[id_type_utilisateur],    
            ];
        } else {
            echo "error of display <br />";
        }
    }
    $statement->closeCursor();
    return $result;
}
?>

<?php
  phpinfo();
?>