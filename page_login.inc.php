<?php
$conn = connexion();
if(isset($_POST["checkForm"]))
{
	// Prepare the query.
	$sql = $conn->prepare ("SELECT nom, travail FROM `user` where 'mail' = ?");
	// Execute the query.
	$sql->execute(array($_POST["mail"]));
	$_SESSION["mail"]= $_POST["mail"];
	$_SESSION["nom"]= "bonjour";
	$_SESSION["travail"]= "Etudiant";	
	unset($_POST["checkForm"]);	
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