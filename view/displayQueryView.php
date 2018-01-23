<?php
$title = 'Résultats requête';
ob_start();
?>

<table id="table_id" class="display">
    <thead>
        <tr>
            <?php
            // Injection de la tête du tableau (noms de champs)
            $firstArray = $result[0];
            foreach ($firstArray as $keys => $values) {
                echo '<th>' . $keys . '</th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        // Injection des entrées du tableau
        foreach ($result as $rows) {
            echo '<tr>';
            foreach ($rows as $column) {
                echo '<td>' . $column . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </tbody>
</table>

<?php $content = ob_get_clean();
require('template.php');
?>
