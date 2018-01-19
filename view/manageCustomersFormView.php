<?php
$title = 'Gestion clients';
$text = 'coucou';
ob_start();
?>
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

<button id="add_customer">Ajouter</button>

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
            echo '<td><p><button id="update_customer' . $rows['id_personne'] . '">Modifier</button></p>
                    <p><button id="delete_customer' . $rows['id_personne'] . '">Supprimer</button></p></td></tr>';
        }
        ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require('view/template.php');
