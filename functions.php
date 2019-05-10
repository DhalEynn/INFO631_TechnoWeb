<?php

// Function used to connect to the database.
function connexion () 
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$BDD = "mysql:host=$servername;dbname=baseeco3";
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

?>