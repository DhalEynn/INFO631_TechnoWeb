<?php
	$conn = connexion();
?>

<form method="post" action="gestion_batiment.php?page=3">
	<p>
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
<<<<<<< HEAD

				<td>
					Votre demande :
				</td>
				<td>
					<input type="text" Sujet="votre demande" maxlength="500" required /><br />
				</td>

=======
>>>>>>> fbbe41d4e6bbdac89bfdf98d9c3f0fc95523dbd3
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="checkForm" value="votre demande aux prof">
					<input type="submit" value="Envoyer la demande aux prof">
				</td>
			</tr>
		</table>
	</p>
</form>
