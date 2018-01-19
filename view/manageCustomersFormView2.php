<?php
$title = 'Gestion clients';
$text = 'coucou';
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

            echo '<th>Options</th>';
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

            echo '<td><button id=update' . $rows['id_personne'] . '>Modifier</button></td></tr>';
        }
        ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require('view/template.php');
