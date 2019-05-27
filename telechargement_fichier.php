<?php

// verfie si l'image est bien une image réelle ou image bidon
 print_r($_POST);
 print_r($_FILES);
 print_r($_FILES['userfile']['name']);
 echo "</br>";
if(isset($_POST["MAX_FILE_SIZE"])) 
{
    $uploaddir = 'C:\wamp64\www\INFO642_TechnoWeb';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    echo '<pre>';
    print_r(move_uploaded_file($_FILES['userfile']['name'], $uploadfile));
    if (move_uploaded_file($_FILES['userfile']['name'], $uploadfile)) 
    {
     echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
    } 
    else 
    {
        echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
    }

    echo 'Voici quelques informations de débogage :';
    print_r($_FILES);

    echo '</pre>';
    //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 /*   if($check !== false) 
    {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    else 
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/
//else
//{


    //verfie si le fichier existe déjà
   /* if (file_exists($target_file)) 
    {
        echo "le fichier existé déjà";
        $uploadOk = 0;
    }
    // verfie la taille de fichier si il est <5 megaOctet
    if ($_POST["fileToUpload"]["size"] > 500000000) 
    {
        echo "le fichier est trop gros!";
        $uploadOk = 0;
    }
    //limite les formats de fichier possible
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) 
    {
        echo "Désolé vous avez le droit au fichier de formats: JPG, JPEG, PNG et GIF";
        $uploadOk = 0;
    }

    //Gere les eventuels erreurs
    if ($uploadOk == 0) 
    {
        echo "Votre fichier n'a pas été bien téléchargé, veuillez ressayer.";

    // Si tous va bien
    } */ 
}
?>
<form enctype="multipart/form-data" action="http://localhost/INFO642_TechnoWeb/telechargement_fichier.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input type="file" name="userfile">
    <input type="submit" name="envoie du fichier">
</form>
