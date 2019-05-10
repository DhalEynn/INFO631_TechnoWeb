<?php
	$conn = connexion();

	if(isset($_POST["checkForm"]))
	{
		// Prepare the query.
		$sql = $conn->prepare ("INSERT INTO `actionneur` (nom, type_actionneur, description, etat) VALUES (?, ?, ?, ?)");
		// Execute the query.
		$sql->execute(array($_POST["nom"], $_POST["type_actionneur"], $_POST["description"], $_POST["etat"]));

		$sql = null;
		// Prepare the query.
		$sql = $conn->prepare ("INSERT INTO `actionneur2zone` (id_actionneur, id_zone) VALUES ((SELECT MAX(id_actionneur) FROM `actionneur`), ?);");
		// Execute the query.
		$sql->execute(array($_POST["zone"]));

		unset($_POST["checkForm"]);
		
		echo "Actionneur ajouté !</br>";
	}
		// Prepare the query.
		$listZone = $conn->prepare ("SELECT id_zone, nom FROM `zone`;");
		// Execute the query.
		$listZone->execute(array());
?>

<form method="post" action="gestion_batiment.php?page=3">
	<p>
		<table>
			<tr>
				<td>
					Nom : 
				</td>
				<td>
					<input type="text" name="nom" maxlength="10" required /><br />
				</td>
			</tr>
			<tr>
				<td>
					Type d'actionneur : 
				</td>
				<td>
					<input type="text" name="type_actionneur" maxlength="30" required /><br />
				</td>
			</tr>
			<tr>
				<td>
					Description : 
				</td>
				<td>
					<input type="text" name="description" maxlength="50" /><br />
				</td>
			</tr>
			<tr>
				<td>
					Etat: 
				</td>
				<td>
					<input type="radio" id="ON" name="etat" value="ON">
		 			<label for="ON">ON</label>
		 			<input type="radio" id="OFF" name="etat" value="OFF" checked>
					<label for="OFF">OFF</label><br />
				</td>
			</tr>
			<tr>
				<td>
					Dans la zone : 
				</td>
				<td>
					<SELECT name="zone">
						<?php
							while ($array = $listZone->fetch(PDO::FETCH_ASSOC))
							{
							?>
								<OPTION value="<?php echo $array["id_zone"]; ?>"><?php echo $array["nom"]; ?></OPTION>
							<?php
							}
						?>
					</SELECT>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="checkForm" value="formulaire">
					<input type="submit" value="Envoyer le formulaire">
				</td>
			</tr>
		</table>
	</p>
</form>