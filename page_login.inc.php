<?php
	if (isConnected())
	{
		header("refresh:0;url=projet.php");
		die(0);
	}
	else
	{
		$conn = connexion();
		if(isset($_POST["checkForm"]))
		{
			unset($_POST["checkForm"]);

			$sql = $conn->prepare ("SELECT nom, travail FROM `user` where mail = ?");
			$sql->execute(array($_POST["mail"]));

			if($array = $sql->fetch(PDO::FETCH_ASSOC))
			{
				$_SESSION["mail"]= $_POST["mail"];
				$_SESSION["nom"]= $array["nom"];
				$_SESSION["travail"]= $array["travail"];
				header("refresh:0;url=projet.php");
				die(0);
			}
			echo "Aucun compte n'est lié à cette adresse mail.</br>";
		}
		?>

		<form method="post" action="projet.php?page=login">
			<p>
				<table>
					<tr>
						<td>
							<center>
							Mail :
							</center>
						</td>
						<td>
							<input type="email" name="mail" maxlength="30" required /><br />
						</td>
					</tr>
					<!--
					<tr>
						<td>
							mot de passe :
						</td>

						<td>
							<input type="passeword" name="mot_de_passe" maxlength="50" /><br />
						</td>
					</tr>
					-->
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="checkForm" value="formulaire">
							<input type="submit" value="Connexion">
						</td>
					</tr>
				</table>
			</p>
		</form>

	<?php
	}
?>
