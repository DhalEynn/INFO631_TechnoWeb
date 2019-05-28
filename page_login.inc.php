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

			if ($_POST["password"] != "" || strlen($_POST["password"]) > 50)
			{
				$password = hash("sha256", $_POST["password"], false);

				$sql = $conn->prepare ("SELECT nom, travail FROM `user` WHERE mail = ? AND password = ?");
				$sql->execute(array($_POST["mail"], $password));

				if($array = $sql->fetch(PDO::FETCH_ASSOC))
				{
					$_SESSION["mail"]= $_POST["mail"];
					$_SESSION["nom"]= $array["nom"];
					$_SESSION["travail"]= $array["travail"];
					header("refresh:0;url=projet.php");
					die(0);
				}
			}
			echo "Votre adresse mail ou votre mot de passe sont invalides. Veuillez réessayer.</br>";
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
							<input type="email" name="mail" maxlength="60" required /><br />
						</td>
					</tr>
					<tr>
					  <td>
					    Mot de passe :
					  </td>
					  <td>
					    <input type="password" name="password" maxlength="50" value="" placeholder="50 caractères max" required /><br />
					  </td>
					</tr>
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
