<?php
$title = 'Gestion clients';
ob_start();


?>

<button id="add_button">Ajouter</button><br />




		<form method="post" id="userModal" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modification de l'abonné</h4>
	                <div class="thumbnails">
	                    <button id="identity">Identité</button>
	                    <button id="contact">Coordonnées</button>
	                    <button id="subscription">Abonnement</button>
	                    <button id="">Infos supplémentaires</button>
	                </div>
				</div>
				<div id="modal-body">
					<div class="identity">
						<label>Prenom</label>
						<input type="text" name="first_name" id="first_name" class="form-control" />
						<br />
						<label>Nom</label>
						<input type="text" name="last_name" id="last_name" class="form-control" />
						<br />
						<label>Date de Naissance</label>
						<input type="text" name="birth_date" id="birth_date" class="form-control" />
						<br />
					</div>
					<div class="contact">
						<label>Numéro de Téléphone</label>
						<input type="number" name="number" id="number" class="form-control" />
						<br />
						<label>Mail</label>
						<input type="mail" name="mail" id="mail" class="form-control" />
						<br />
					</div>
					<div class="adress">
						<label>Adresse</label>
						<input type="text" name="adress" id="adress" class="form-control" />
						<br />
					</div>
					<div class="subscription">
						<label>Abonnement</label>
						<input type="number" name="number" id="number" class="form-control" />
						<br />
						<label>Mail</label>
						<input type="mail" name="mail" id="mail" class="form-control" />
						<br />
						<label>Adresse</label>
						<input type="text" name="adress" id="adress" class="form-control" />
						<br />
					</div>
					<div class="modal-footer">
						<input type="hidden" name="user_id" id="user_id" />
						<input type="hidden" name="operation" id="operation" />
						<input type="submit" name="action" id="action" class="btn btn-success" value="Ajouter" />
					</div>
				</div>
			</div>
		</form>


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
            echo '<td id="options"><p><button name="update_button" id=' . $rows['id_personne'] . ' class="update_button">Modifier</button></p>
                    <p><button name="delete_button" id="delete_customer' . $rows['id_personne'] . '">Supprimer</button></p></td></tr>';
        }
        ?>


    </tbody>
</table>



<script>

    /*var updateForm = document.getElementById('update_form');
    var updateButton = document.getElementById('update_customer1');
    var closeUpdateForm = document.getElementById('close_update_form');


    updateButton.addEventListener('click', function() {
        updateForm.style.display = 'block';
    });

    closeUpdateForm.addEventListener('click', function() {
        updateForm.style.display = 'none';
    });

    var xhr = new XMLHttpRequest();
    xhr.open('GET', http://localhost/projetweb_stapa/STAPA/view/ajax.php);*/
</script>

<?php
$content = ob_get_clean();
require('view/template.php');
