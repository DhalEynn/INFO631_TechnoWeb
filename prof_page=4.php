<?php
	$conn = connexion();
?>

<form method="post" action="gestion_batiment.php?page=3">
	<p>
		<table>
			<tr>
				<td>
					Nom d'envoi :
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
					<input type="text" Sujet="Sujet" maxlength="500" required /><br />
				</td>
				</td>
			</tr>
			<tr>

				<tr>
					<td>
						Message recu :
					</td>
					<td>
						<input type="text" Sujet="Message recu par le prof" maxlength="500" required /><br />
					</td>
					</td>
				</tr>
				<tr>

				<td></td>
				<td>
					<input type="hidden" name="checkForm" value="transmet les Message aux service technique">
					<input type="submit" value="Envoyer la demande aux service technique">
				</td>
			</tr>
		</table>
	</p>
</form>
