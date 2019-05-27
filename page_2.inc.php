<?php
if (isEtudiant() || isProfesseur())
{
	$conn = connexion();
	if (isset($_POST["changement"]))
	{
		unset($_POST["changement"]);
		if (isset($_POST["envoiST"]))
		{
			$newStatus = "Envoyee";
		}
		else
		{
			$newStatus = "EnCours";
		}
		$except = updateDemande ($_POST["idDem"], $_POST["Sujet"], $_POST["Contenu"], $newStatus);
		if (is_null($except))
		{
			echo "</br></br><center>";
			if (isset($_POST["envoiST"]))
			{
				echo "Demande envoyée au service technique.";
			}
			else
			{
				echo "Demande modifiée !</br>";
			}
			echo "</br></br>Vous allez être redirigés dans 1 secondes.</center>";
			header("refresh:2;url=projet.php?page=2");
			die(0);
		}
	}
	elseif(isset($_POST["checkForm"]))
	{
		unset($_POST["checkForm"]);
		// Prepare the query.
		$sql = $conn->prepare ("SELECT * FROM `demandes` WHERE idDem = ?");
		// Execute the query.
		$sql->execute(array($_POST["idDem"]));

		if($array = $sql->fetch(PDO::FETCH_ASSOC))
		{ ?>
			<form method="post" id="page2" action="projet.php?page=2">
				<table>
					<tr>
						<td>
							Nouveau sujet :
						</td>
						<td>
							<textarea class="zoneText" rows="4" cols="50" name="Sujet" form="page2" minlength="1" maxlength="180" wrap="hard" required><?php echo $array["sujet"];?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Contenu de la demande :
						</td>
						<td>
							<textarea class="zoneText" rows="5" cols="50" name="Contenu" form="page2" minlength="1" maxlength="10000" wrap="hard" required><?php echo $array["contenu"]; ?></textarea>
						</td>
					</tr>
					<?php
					if (isProfesseur())
					{
						?>
						<tr>
							<td>
								Envoyer la demande au service technique :
							</td>
							<td>
								<input type="checkbox" name="envoiST" value="envoyer">
							</td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="changement" value="changement de la demande">
							<input type="hidden" name="checkForm" value="changement de la demande">
							<input type="hidden" name="idDem" value="<?php echo $array["idDem"] ?>">
							<input type="submit" value="Envoi de la demande">
						</td>
					</tr>
				</table>
			</form>
			<?php
			echo "<a href=\"?page=2\">Annuler</a>";
		}
		else {
			echo "Erreur dans le choix des demandes.";
		}
	}
	else
	{
		if (isEtudiant())
		{
			$listDemandes = $conn->prepare ("SELECT idDem, sujet, mailProf as mailPers, status FROM `demandes` WHERE mailEtu = ? AND (status = \"EnCours\" OR status = \"Modifier\");");
		}
		else {
			$listDemandes = $conn->prepare ("SELECT idDem, sujet, mailEtu as mailPers, status FROM `demandes` WHERE mailProf = ? AND (status = \"EnCours\" OR status = \"Modifier\");");
		}
		$listDemandes->execute(array($_SESSION["mail"]));

		if (is_null($listDemandes) || $listDemandes->rowCount() == 0)
		{
			echo "</br>Vous n'avez aucune demande à modifier.";
		}
		else
		{
		?>
		<table>
			<tr class="presentation">
				<td class="idDem">
					<center>id :</center>
				</td>
				<td class="sujetDem">
					<center>Sujet :</center>
				</td>
				<td class="mailDem">
					<center>
						<?php
							if (isProfesseur())
							{
								echo "Etudiant :";
							}
							else
							{
								echo "Référent :";
							}
						?>
					</center>
				</td>
				<td class="statusDem">
					<center>Status :</center>
				</td>
			</tr>
			<!-- Ecarte le nom des colonnes du contenu des colonnes resultat -->
			<tr class="ecarteColonne"></tr>
			<form method="post" action="projet.php?page=2">
				<input type="hidden" name="checkForm" value="formulaire" /></br>
				<?php
				while($array = $listDemandes->fetch(PDO::FETCH_ASSOC))
				{
					if ($array["status"] == "Modifier")
					{
						echo "<tr class=\"modifier\">";
					}
					else
					{
						echo "<tr>";
					}
					?>
						<td class="idDem">
							<input type="submit" name="idDem" value="<?php echo $array["idDem"] ?>" />
						</td>
						<td class="sujetDem">
							<center>
								<?php
									echo $array["sujet"];
								?>
							</center>
						</td>
						<td class="mailDem">
							<?php
								echo "<center>";
									echo $array["mailPers"];
								echo "</center>";
							?>
						</td>
						<td class="statusDem">
							<?php
								echo "<center>";
									echo $array["status"];
								echo "</center>";
							?>
						</td>
					</tr>
					<?php
				}
				?>
			</form>
		</table>
		<?php
		}
	}
}
else
{
	header("refresh:0;url=projet.php");
	die(0);
}
?>
