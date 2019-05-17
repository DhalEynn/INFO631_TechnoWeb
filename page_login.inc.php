<form method="post" action="projet.php?page=3">
<?php
$conn = connexion();
if(isset($_POST["checkForm"]))
{
	// Prepare the query.
	$sql = $conn->prepare ("SELECT nom, travail FROM `user` where mail=$_Post["mail"]");
	// Execute the query.
	$sql->execute(array());
	connexion ();
	$_SESSION["mail"]= $_POST["mail"]
	$_SESSION["nom"]= "bonjour"
	$_SESSION["travail"]= "Etudiant"	
	unset($_POST["checkForm"]);	
}
?>

	<p>
		<table>
			<tr>
				<td>
					<center>
					Mail : 
					</center>
				</td>
				<td>
					<input type="text" name="email" maxlength="30" required /><br />
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