<?php
// Création d'une demande pour un matériel ou un logiciel.
// Demandé : contenu, professeur référent

	$conn = connexion();

	if(isset($_POST["checkForm"]))
	{
		unset($_POST["checkForm"]);
		if (!is_null($_POST["Sujet"]) && !is_null($_POST["Contenu"]) && !is_null($_SESSION["mail"]) && !is_null($_POST["mailProf"]))
		{
			// Prepare the query.
			$sql = $conn->prepare ("INSERT INTO `demandes` (sujet, contenu, mailEtu, mailProf, status) VALUES ( ?, ?, ?, ?, \"EnCours\")");
			// Execute the query.
			$sql->execute(array($_POST["Sujet"], $_POST["Contenu"], $_SESSION["mail"], $_POST["mailProf"]));

			echo "Demande créée !</br>";
		}
		else
		{
			echo "Un de vos paramètres est nul</br>";
		}
	}
?>

<?php
	// Prepare the query.
	$listProf = $conn->prepare ("SELECT mail, nom FROM `user` WHERE travail = \"Professeur\";");
	// Execute the query.
	$listProf->execute(array());
?>

<form method="post" id="page1" action="projet.php?page=1">
	<p>
		Bonjour <?php echo $_SESSION["nom"]; ?>, quelle est votre demande : </br>
		<table>
			<tr>
				<td>
					Sujet de votre demande :
				</td>
				<td>
					<textarea rows="4" cols="50" name="Sujet" form="page1" minlength="1" maxlength="200" placeholder="Sujet de votre demande (200 caractères max)" required></textarea>
				</td>
			</tr>
			<tr>
				<td>
					Contenu de la demande :
				</td>
				<td>
					<textarea rows="5" cols="50" name="Contenu" form="page1" minlength="1" maxlength="10000" placeholder="Entrez le contenu de votre demande ici (10000 caractères max)" required></textarea>
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
