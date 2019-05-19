<?php
if (isConnected())
{
	$conn = connexion();
	if(isset($_POST["checkForm"]))
	{
		unset($_POST["checkForm"]);
		// Prepare the query.
		$sql = $conn->prepare ("SELECT * FROM `demandes` where idDem = ?");
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
			$sql = $conn->prepare ("SELECT idDem, sujet, mailProf as mailPers FROM `Demandes` WHERE mailEtu = ?");
			$sql->execute(array($_SESSION["mail"]));
		}
		elseif(isProfesseur())
		{
			$sql = $conn->prepare ("SELECT idDem, sujet, mailEtu as mailPers FROM `Demandes` WHERE mailProf = ?");
			$sql->execute(array($_SESSION["mail"]));
		}
		else
		{
			$sql = $conn->prepare ("SELECT idDem, sujet, mailProf as mailPers FROM `Demandes`");
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
	<form method="post" action="projet.php?page=4">
			<input type="hidden" name="checkForm" value="formulaire" /></br>
			<?php
				while($array = $sql->fetch(PDO::FETCH_ASSOC))
				{
					echo "<tr id=\"formDem\">";
						$id=$array["idDem"]; ?>
						<td id="idDem">
							<input type="submit" name="idDem" value="id : <?php echo $id ?>" />
						</td>
						<td id="sujetDem">
							<?php
								echo "Sujet :";
								echo $array["sujet"];
							?>
						</td>
						<td id="mailDem">
							<?php
								if (isProfesseur())
								{
									echo "Etudiant :";
								}
								else
								{
									echo "Référent :";
								}
								echo $array["mailPers"];
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
