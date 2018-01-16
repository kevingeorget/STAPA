<?php
$title = 'Résultats requêtes';
ob_start();
?>

<section id="">
<?php
foreach ($result as $key => $value) {
    echo $key . ': ' . $value;
}
?>
</section>
<?php $content = ob_get_clean();
require('template.php');
?>
