<?php

if (!isset($_SESSION))
{
  session_start();
}

// Fonction de connexion à la base.
// Pour changer de base, modifier les valeurs des variables de la base.
function connexion ()
{
	// Variables de la base
	$servername = "localhost";
	$username = "root";
	$password = "";
	$BDD = "mysql:host=$servername;dbname=projet";
	// Connexion
	try
	{
	    $conn = new PDO($BDD, $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $conn;
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}
}

function updateStatus ($idDem, $newStatus)
{
  $conn = connexion();
	try
	{
		$sql = $conn->prepare ("UPDATE `demandes` SET status = ? WHERE idDem = ?");
		$sql->execute(array($newStatus, $idDem));
	}
	catch(PDOException $e)
	{
	    //echo "Connection failed: " . $e->getMessage();
	    return $e;
	}
  return NULL;
}

function updateDemande ($idDem, $sujet, $contenu, $newStatus = "EnCours")
{
  $conn = connexion();
	try
	{
		$sql = $conn->prepare ("UPDATE `demandes` SET sujet = ?, contenu = ?, status = ? WHERE idDem = ?");
		$sql->execute(array($sujet, $contenu, $newStatus, $idDem));
	}
	catch(PDOException $e)
	{
	    //echo "Connection failed: " . $e->getMessage();
	    return $e;
	}
  return NULL;
}

// Ajout d'un nouvel utilisateur, sans véification de validité.
function ajoutUser ($mail, $nom, $travail)
{
	$conn = connexion();
	try
	{
		$sql = $conn->prepare ("INSERT INTO `user` (mail, nom, travail) VALUES (?, ?, ?)");
		$sql->execute(array($mail, $nom, $travail));
	}
	catch(PDOException $e)
	{
	    //echo "Connection failed: " . $e->getMessage();
	    return $e;
	}
  return NULL;
}

function isConnected ()
{
	if (is_null($_SESSION["mail"]) || is_null($_SESSION["nom"]) || is_null($_SESSION["travail"]))
	{
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}

function isEtudiant ()
{
  if (isConnected())
  {
    if ($_SESSION["travail"] == "Etudiant")
    {
      return TRUE;
    }
  }
  return FALSE;
}

function isProfesseur ()
{
  if (isConnected())
  {
    if ($_SESSION["travail"] == "Professeur")
    {
      return TRUE;
    }
  }
  return FALSE;
}

function isST ()
{
  if (isConnected())
  {
    if ($_SESSION["travail"] == "Service Technique")
    {
      return TRUE;
    }
  }
  return FALSE;
}

?>
