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
			echo "status : ";
			echo $array["status"];
			echo "<br/>";
			echo "<br/>";
		}
	}
	else
	{
		if(isEtudiant())
		{
			$sql = $conn->prepare ("SELECT idDem, sujet, mailProf as mailPers, status FROM `demandes` WHERE mailEtu = ?");
			$sql->execute(array($_SESSION["mail"]));
		}
		elseif(isProfesseur())
		{
			$sql = $conn->prepare ("SELECT idDem, sujet, mailEtu as mailPers, status FROM `demandes` WHERE mailProf = ?");
			$sql->execute(array($_SESSION["mail"]));
		}
		else
		{
			$sql = $conn->prepare ("SELECT idDem, sujet, mailProf as mailPers, status FROM `demandes`");
			$sql->execute(array());
		}

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
				<td class="statusDem">
					<center>Status :</center>
				</td>
			</tr>
			<!-- Ecarte le nom des colonnes du contenu des colonnes resultat -->
			<tr class="ecarteColonne"></tr>
			<form method="post" action="projet.php?page=4">
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
