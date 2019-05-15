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
