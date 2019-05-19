<?php
if (isConnected())
{
	$conn = connexion();
	if(isset($_POST["action"]))
	{
		unset($_POST["action"]);
		if (isset($_POST["validation"]))
		{
			echo "bonjour";
			updateStatus($_POST["validation"], "Valide");
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
		{
			echo "id : ";
			echo $array["idDem"];
			echo "<br/>";
			echo "sujet : ";
			echo $array["sujet"];
			echo "<br/>";
			echo "contenu : ";
			echo $array["contenu"];
			echo "<br/>";
			echo "mail Etudiant : ";
			echo $array["mailEtu"];
			echo "<br/>";
			echo "mail Professeur : ";
			echo $array["mailProf"];
			echo "<br/>";
			echo "<br/>";
			?>
			<form method="post" action="projet.php?page=3">
				<input type="hidden" name="action" value="formulaire" /></br>
				<input type="submit" name="validation" value="Valide" />
				<input type="text" name="valeurid" value="<?php echo $array["idDem"] ?>" required />
				<input type="submit" name="validation" value="Modifier" />
			</form>
			<?php
			echo "<a href=\"?page=3\">Retour</a>";
		}
	}
	else
	{
		$sql = $conn->prepare ("SELECT idDem, sujet, mailProf as mailPers, status FROM `demandes` WHERE status = 'Envoyee'");
		$sql->execute(array());


		if (is_null($sql) || $sql->rowCount() == 0)
		{
			echo "</br>Vous n'avez aucune demande en cours.";
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
			</tr>
			<!-- Ecarte le nom des colonnes du contenu des colonnes resultat -->
			<tr class="ecarteColonne"></tr>
			<form method="post" action="projet.php?page=3">
				<input type="hidden" name="checkForm" value="formulaire" /></br>
				<?php
				while($array = $sql->fetch(PDO::FETCH_ASSOC))
				{
					?>
					<tr>
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
