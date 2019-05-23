<?php
try
{
	//je refais ma connection de bdd
	$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//liste de demande avec le status envoyee
$bdd_demande = $bdd->query('SELECT * FROM demandes');

//accede à ma table
//$bd_contenu = $bdd->query('SELECT nom FROM user WHERE nom =\'lala\'');
// $bd_status = $bdd->query('SELECT nom FROM user WHERE nom= "$lala"');
//$status="";
?>
<?php
while ($contenu = $bdd_demande->fetch())
{
	
?>
	<p>
	E-mail d'étudiant demandeur est: <?php echo $contenu['mailEtu']; ?><br />
	E-mail prof est: <?php echo $contenu['mailProf']; ?><br />
	Demade est: <?php echo $contenu['contenu']; ?><br />
	</p>
<?php

}
$bdd_demande->closeCursor();

?>
####################################################""


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
$message = "Merci pour l'interet que vous porte à votre formation, votre demande à été prise en compte. nous vous repondrons la blef delai \n Cordialement ";
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


<?php
	$conn = connexion();
	if(isConnected())
	{
		if (isProfesseur())
		{


		}
	}

?>

<form method="post" action="projet.php?page=1">
			<tr>
				<td>
					Merci de bien vouloir consulter la demande
				</td>
				<td>

					<input type="radio" name="decision" value="valider">Valider la demande</br>
					<input type="radio" name="decision" value="modifier">Modifier la demande</br>

					<input type="submit" name="submit" value="Enregistre votre décision">
				</td>
			</tr>
</form>

<?php
echo $decision;
?>
