<?php
$conn = connexion();
	
	if($_SESSION["travail"] = "Etudiant")
	{
		$sql = $conn->prepare ("SELECT * FROM `Demandes` where mailEtu = ?");
		$sql->execute(array($_SESSION["mail"]));
		while($array = $sql->fetch(PDO::FETCH_ASSOC))
		{
			echo "id : ";
			echo $array["idDem"];
			echo "<br/>";
			echo "sujet : ";
			echo $array["sujet"];
			echo "<br/>";
			echo "contenu : ";
			echo $array["contenu"];
			echo "<br/>";
			echo "mail Professeur : ";
			echo $array["mailProf"];
			echo "<br/>";
			echo "status : ";
			echo $array["status"];
			echo "<br/>";
			echo "<br/>";
		}
	}
	elseif($_SESSION["travail"] = "Professeur")
	{
		$sql = $conn->prepare ("SELECT * FROM `Demandes` where mailProf = ?");
		$sql->execute(array($_SESSION["mail"]));	
	}
	else
	{
		$sql = $conn->prepare ("SELECT * FROM `Demandes`");	
		$sql->execute(array());
	}	
?>