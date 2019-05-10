<form method="post" action="projet.php?page=3">
	<p>
		<table>
			<tr>
				<td>
					Nom : 
				</td>
				<td>
					<input type="text" name="nom" maxlength="10" required /><br />
				</td>
			</tr>
			<tr>
				<td>
					mail : 
				</td>
				<td>
					<input type="text" name="mail" maxlength="30" required /><br />
				</td>
			</tr>
			<tr>
				<td>
					mot de passe : 
				</td>
				<td>
					<input type="passeword" name="mot_de_passe" maxlength="50" /><br />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="checkForm" value="formulaire">
					<input type="submit" value="Envoyer le formulaire">
				</td>
			</tr>
		</table>
	</p>
</form>