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

				<td>
					Votre demande :
				</td>
				<td>
					<input type="text" Sujet="votre demande" maxlength="500" required /><br />
				</td>
				<?php
				function sanitize_my_email($field) {
				    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
				    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
				        return true;
				    } else {
				        return false;
				    }
						}
		/*Envoyer un e-mail d'acuse de reception */
				$to_email = '$nom @ etu.univ-smb.fr';
				$subject = 'Acuse de reception de votre demande';
				$message = "Merci pour l'interet que vous porte à votre formation, votre demande à été prise en compte. nous vous repondrons la blef delai \n Cordialement "";
				$headers = 'From: noreply @ sevice de scolarite.fr';
				//check if the email address is invalid $secure_check
				$secure_check = sanitize_my_email($to_email);
				if ($secure_check == false) {
				    echo "Invalid input";
				} else { //send email
				    mail($to_email, $subject, $message, $headers);
				    echo "This email is sent using PHP Mail";
				}
				?>
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
