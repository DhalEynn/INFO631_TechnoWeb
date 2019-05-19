<?php
if (isConnected())
{
	$conn = connexion();
	if(isset($_POST["checkForm"]))
	{
		unset($_POST["checkForm"]);
		// Prepare the query.
		$sql = $conn->prepare ("SELECT * FROM `demandes` WHERE idDem = ?");
		// Execute the query.
		$sql->execute(array($_POST["idDem"]));

		if($array = $sql->fetch(PDO::FETCH_ASSOC))
		{ ?>
			<table>
				<tr>
					<td>
						Nouveau sujet :
					</td>
					<td>
						<textarea class="zoneText" rows="4" cols="50" name="Sujet" form="page1" minlength="1" maxlength="180" wrap="hard" required>
							<?php echo $array["sujet"] ?>
						</textarea>
					</td>
				</tr>
				<tr>
					<td>
						Contenu de la demande :
					</td>
					<td>
						<textarea class="zoneText" rows="5" cols="50" name="Contenu" form="page1" minlength="1" maxlength="10000" wrap="hard" required>
							<?php echo $array["contenu"] ?>
						</textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="changement" value="changement de la demande">
						<input type="submit" value="Changer la demande">
					</td>
				</tr>
			</table>
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
								echo $array["mailPers"];
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
