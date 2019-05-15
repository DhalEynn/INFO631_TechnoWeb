// Création d'une demande pour un matériel ou un logiciel.
// Demandé : contenu, professeur référent

<?php
	$conn = connexion();
?>

<form method="post" action="projet.php?page=3">
	<p>
		Bonjour <?php echo $_SESSION["nom"]; ?>, quelle est votre demande : </br>
		<table>
			<tr>
				<td>
					Nom :
				</td>
				<td>
					<input type="text" name="nom" maxlength="50" required /><br />
				</td>
			</tr>
			<tr>
				<td>
					Sujet :
				</td>
				<td>
					<input type="text" Sujet="Sujet" maxlength="100" required /><br />
				</td>

				<td>
					Votre demande :
				</td>
				<td>
					<input type="text" Sujet="votre demande" maxlength="500" required /><br />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="checkForm" value="votre demande aux prof">
					<input type="submit" value="Envoyer la demande aux professeur">
				</td>
			</tr>
		</table>
	</p>
</form>
