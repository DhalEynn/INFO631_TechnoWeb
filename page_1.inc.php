<?php
// Création d'une demande pour un matériel ou un logiciel.
// Demandé : sujet, contenu, professeur référent
if (isEtudiant())
{
	$conn = connexion();

	// Traitement du formulaire

	if(isset($_POST["checkForm"]))
	{
		unset($_POST["checkForm"]);
		if (!is_null($_POST["Sujet"]) && !is_null($_POST["Contenu"]) && !is_null($_SESSION["mail"]) && !is_null($_POST["mailProf"]) && !is_null($_POST["Expiration"]) && !is_null($_POST["Creation"]) && ($_POST["Expiration"] > $_POST["Creation"]))
		{
			// Prepare the query.
			$sql = $conn->prepare ("INSERT INTO `demandes` (sujet, contenu, dateCreation, dateExpiration, mailEtu, mailProf, status) VALUES ( ?, ?, ?, ?, ?, ?, \"EnCours\")");
			// Execute the query.
			$sql->execute(array($_POST["Sujet"], $_POST["Contenu"], $_POST["Creation"], $_POST["Expiration"], $_SESSION["mail"], $_POST["mailProf"]));

			echo "</br></br><center>Demande créée !</br></br>Vous allez être redirigés dans 1 secondes.</center>";
			header("refresh:1;url=projet.php?page=1");
			die(0);
		}
		else
		{
			echo "<center>Un de vos paramètres est erroné, veuillez réessayer.</center></br>";
		}
	}

	// Recuperation de la liste des professeurs pour le formulaire
	$listProf = $conn->prepare ("SELECT mail, nom FROM `user` WHERE travail = \"Professeur\";");
	$listProf->execute(array());
	if (is_null($listProf) || $listProf->rowCount() == 0)
	{
		echo "</br>Aucun professeur n'est disponible, vous ne pouvez donc pas créer de demande.";
	}
	else
	{
		?>

		<form method="post" id="page1" action="projet.php?page=1">
			<p>
				Bonjour <?php echo $_SESSION["nom"]; ?>, quelle est votre demande : </br></br>
				<table>
					<tr>
						<td>
							Sujet de votre demande :
						</td>
						<td>
							<textarea class="zoneText" rows="4" cols="50" name="Sujet" form="page1" minlength="1" maxlength="180" placeholder="Sujet de votre demande (180 caractères max)" wrap="hard" required></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Contenu de la demande :
						</td>
						<td>
							<textarea class="zoneText" rows="5" cols="50" name="Contenu" form="page1" minlength="1" maxlength="10000" placeholder="Entrez le contenu de votre demande ici (10000 caractères max)" wrap="hard" required></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Date d'expiration :
						</td>
						<td>
							<input type="date" name="Expiration" value="<?php echo date("Y-m-d"); ?>" required>
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
							<input type="hidden" name="Creation" value="<?php echo date("Y-m-d"); ?>">
							<input type="submit" value="Envoyer la demande au professeur">
						</td>
					</tr>
				</table>
			</p>
		</form>
		<?php
	}
}
else
{
	header("refresh:0;url=projet.php");
	die(0);
}
?>
