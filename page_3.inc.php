<?php
	$conn = connexion();
?>

<form method="post" action="gestion_batiment.php?page=1">
	<p>
		<input type="radio" name="demande"
		<?php if (isset($avancement_demande) && $avancement_demande=="en cour d'analyse") echo "checked";?>
		value="en cour d'analyse">en cour d'analyse

		<input type="radio" name="avancement_demande"
		<?php if (isset($pr) && $avancement_demande=="validation par le frof") echo "checked";?>
		value="validation par le frof">validation par le frof

		<input type="radio" name="avancement_demande"
		<?php if (isset($avancement_demande) && $avancement_demande=="analyse par le service technique") echo "checked";?>
		value="analyse par le service technique">analyse par le service technique

		<input type="radio" name="avancement_demande"
		<?php if (isset($avancement_demande) && $avancement_demande=="validé par le service technique") echo "checked";?>
		value="validé par le service technique">validé par le service technique
	</p>
</form>
