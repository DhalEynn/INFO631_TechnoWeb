<?php
	$conn = connexion();

	if(isset($_POST["checkForm"]))
	{
		// Prepare the query.
		$sql = $conn->prepare ("SELECT mail FROM `user`");
		// Execute the query.
		$sql->execute(array());

		$except = ajoutUser ($_POST["mail"], $_POST["nom"], $_POST["travail"]);
		if (is_null($except))
		{
			echo "Compte créé !</br>";
			$_SESSION["mail"] = $_POST["mail"];
			$_SESSION["nom"] = $_POST["nom"];
			$_SESSION["travail"] = $_POST["travail"];
			header("refresh:0;url=projet.php");
		}
		else
		{
			echo "Adresse mail déjà utilisée, veuillez réessayer avec une autre adresse mail.";
		}
		unset($_POST["checkForm"]);
	}
?>

<form method="post" action="projet.php?page=signup">
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
			<tr>
				<td>
					<center>
						Nom :
					</center>
				</td>
				<td>
					<input type="text" name="nom" maxlength="10" required /><br />
				</td>
			</tr>
			<tr>
				<td>
					<input type="radio" id="etudiant" name="travail" value="Etudiant" checked />
					<label for="etudiant">Etudiant</label>
				</td>
				<td>
					<input type="radio" id="professeur" name="travail" value="Professeur" />
					<label for="professeur">Professeur</label>
					<input type="radio" id="ST" name="travail" value="Service Technique" />
					<label for="ST">Service technique</label>
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
