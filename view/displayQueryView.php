<?php
$title = 'Résultats requête';
ob_start();
?>

<section id="">
<?php
foreach ($result as $key => $value) {
    echo $key . $value['nom'] . ' ' . $value['prenom'] . ' ' . $value['naissance'] . ' ' . $value['email'] . '<br />';
}

?>
</section>
<?php $content = ob_get_clean();
require('template.php');
?>
