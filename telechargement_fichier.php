<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// verfie si l'image est bien une image réelle ou image bidon
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
//verfie si le fichier existe déjà
if (file_exists($target_file)) {
    echo "le fichier existé déjà";
    $uploadOk = 0;
}
// verfie la taille de fichier si il est <5 megaOctet
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "le fichier existé déjà!";
    $uploadOk = 0;
}
//limite les formats de fichier possible
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Désolé vous étes le droit au fichier de formats: JPG, JPEG, PNG et GIF";
    $uploadOk = 0;
}

//Gere les eventuels erreurs
if ($uploadOk == 0) {
    echo "Votre fichier n'a pas été bien téléchargé, veuillez ressayer.";

// Si tous va bien
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Le fichier: ". basename( $_FILES["fileToUpload"]["name"]). " a été bien téléchargé.";
    } else {
        echo "impossible de télécharger votre fichier.";
    }
}
?>
