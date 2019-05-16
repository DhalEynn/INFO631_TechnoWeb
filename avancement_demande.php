
/*
J'essaye de gerer la fênetre de page_4
je souhaite donner la possibilité au professeurs et au service technique de valider la prossedure effectué
à l'aide de radion button

je souhaite que l'ensemble de button soit affiche d'une manier stati dans la page_4
la partie no traite
*/

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
