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
		$to_email = '$nom @univ-smb.fr';
		$subject = 'Acuse de reception de votre demande';
		$message = "Votre demande à été prise en compte. \n Nous vous repondrons dans la blef delai \n Cordialement ";
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
	</p>
</form>
