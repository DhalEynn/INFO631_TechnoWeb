<?php
	$conn = connexion();
?>

<form method="post" action="gestion_batiment.php?page=1">
	<p>
		// propose aux prof de valide la demande


		<input type="radio" name="valide la demande"
		<?php if (isset($avancement_demande) && $avancement_demande=="validation") echo "checked";?>
		value="validation">validation


		<input type="radio" name="Revoir la demande"
		<?php if (isset($pr) && $avancement_demande=="Demande Renvoie à l etudiant") echo "checked";?>
	// méthode pour renvoie la demande à l étudiant
		value="Demande Renvoie à l etudiant">Demande Renvoie à l etudiant

		<input type="radio" name="Refus de la demande"
		<?php if (isset($pr) && $avancement_demande=="Refus la demande") echo "checked";?>
		value="Refus la demande">Refus la demande


		// la validation pour le service technique

		// validation
		<input type="radio" name="valide définitivement la demande"
		<?php if (isset($avancement_demande) && $avancement_demande=="validation") echo "checked";?>
		value="validation">validation

		//Refus
		<input type="radio" name="Refus de la demande"
		<?php if (isset($avancement_demande) && $avancement_demande=="Refus de la demande") echo "checked";?>
		value="Refus de la demande">refus de la demande

		//méthode pour informer le prof et l'etudiant

	</p>
</form>
