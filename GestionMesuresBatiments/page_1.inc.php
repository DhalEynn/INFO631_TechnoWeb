<style>
<?php include 'page_1.inc.css'; ?>
</style>

<?php
if( isset($_GET["salle"]) ) 
{
	$salle=$_GET["salle"];
// Get the "capteurs"
	// Query :
	// Prepare the query.
	$sql = $conn->prepare ("SELECT nom, type_capteur AS \"type de capteur\" FROM `capteur` WHERE id_zone = (SELECT id_zone FROM `zone` WHERE nom = ?);");
	// Execute the query.
	$sql->execute(array($salle));
	// Show the result
	$tempShowing = 0;
	while ($array = $sql->fetch(PDO::FETCH_ASSOC))
	// PDO::FETCH_ASSOC statement is used to see only the column names, without the numbered columns equivalent.
	{
		if ($tempShowing == 0) 
		{
			echo "Capteurs présents dans cette salle : <br />";
			$tempShowing += 1;
		}
		foreach ($array as $key => $value) {
			echo $key, " : ", $value, "  ,  ";
		}
		echo "<br />";
	}

// Get the "actionneurs"
	// Query :
	// Prepare the query.
	$sql = $conn->prepare ("SELECT a.nom, a.type_actionneur AS \"type d\'actionneur\" FROM `actionneur` a JOIN `actionneur2zone` az ON a.id_actionneur = az.id_actionneur JOIN `zone` z ON az.id_zone = z.id_zone WHERE z.id_zone = (SELECT id_zone FROM `zone` WHERE nom = ?);");
	// Execute the query.
	$sql->execute(array($salle));
	// Show the result
	$tempShowing = 0;
	while ($array = $sql->fetch(PDO::FETCH_ASSOC))
	// PDO::FETCH_ASSOC statement is used to see only the column names, without the numbered columns equivalent.
	{
		if ($tempShowing == 0) 
		{
			echo "<br />Actionneurs présents dans cette salle : <br />";
			$tempShowing += 1;
		}
		foreach ($array as $key => $value) {
			echo $key, " : ", $value, "  ,  ";
		}
		echo "<br />";
	}
}
?>

<ul id="etage2">
<li id="c206"><a href="?page=1&salle=C206"><span>c206</span></a></li>   
<li id="c207"><a href="?page=1&salle=C207"><span>c207</span></a></li>   
<li id="c208"><a href="?page=1&salle=C208"><span>c208</span></a></li>   
<li id="c209"><a href="?page=1&salle=C209"><span>c209</span></a></li>   
<li id="c210"><a href="?page=1&salle=C210"><span>c210</span></a></li>   
<li id="c213"><a href="?page=1&salle=C213"><span>c213</span></a></li>   
<li id="c214"><a href="?page=1&salle=C214"><span>c214</span></a></li>   
<li id="c215"><a href="?page=1&salle=C215"><span>c215</span></a></li>   
</ul>
