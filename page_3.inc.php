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
//accede à ma table
$bd_contenu = $bdd->query('SELECT nom FROM user WHERE nom =\'lala\'');
// $bd_status = $bdd->query('SELECT nom FROM user WHERE nom= "$lala"');
//$status="";

while ($contenu = $bd_contenu ->fetch())
{
	//if ($status == $bd_status){
	echo $contenu['nom'] . '<br />';
	//}

}
$bd_contenu->closeCursor();

?>
