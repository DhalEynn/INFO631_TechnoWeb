<?php
// Création d'une demande pour un matériel ou un logiciel.
// Demandé : contenu, professeur référent

	$conn = connexion();

	if(isset($_POST["checkForm"]))
	{
		// Prepare the query.
		$sql = $conn->prepare ("INSERT INTO `demande` (contenu, mailEtu, mailProf, status) VALUES ( ?, ?, ?, \"EnCours\")");
		// Execute the query.
		$sql->execute(array($_POST["Contenu"], $_SESSION["mail"], $_POST["mailProf"]));

		unset($_POST["checkForm"]);

		echo "Demande créée !</br>";
	}
?>

<?php
	// Prepare the query.
	$listProf = $conn->prepare ("SELECT mail, nom FROM `user` WHERE travail = \"Professeur\";");
	// Execute the query.
	$listProf->execute(array());
?>

<form method="post" action="projet.php?page=3">
	<p>
		Bonjour <?php echo $_SESSION["nom"]; ?>, quelle est votre demande : </br>
		<table>
			<tr>
				<td>
					Contenu de la demande :
				</td>
				<td>
					<input type="text" cols="80" rows="50" style=" height:250px;" name="Contenu" id="Contenu" required />
				</td>
			</tr>
			<tr>
				<td>
					Professeur référent :
				</td>
				<td>
					<SELECT name="mailProf">
						<?php
							while ($array = $listProf->fetch(PDO::FETCH_ASSOC))
							{
							?>
								<OPTION value="<?php echo $array["mail"]; ?>"><?php echo $array["nom"]; ?></OPTION>
							<?php
							}
						?>
					</SELECT>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="checkForm" value="votre demande aux prof">
					<input type="submit" value="Envoyer la demande au professeur">
				</td>
			</tr>
		</table>
	</p>
</form>
