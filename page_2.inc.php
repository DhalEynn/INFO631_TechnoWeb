<?php
// Gestion du formulaire :
	if (isset($_POST["checkForm"]))
	{
		// Prepare the query.
		$sql= $conn->prepare ("SELECT id_capteur, nom, id_zone, type_capteur, unite, valmin, valmax FROM `capteur`;");
		// Execute the query.
		$sql->execute(array());

		while ($array = $sql->fetch(PDO::FETCH_ASSOC))
		{
			if ($array["id_capteur"] == $_POST["capteur"])
			{
				$id_capteur = $array["id_capteur"];
				break;
			}
		}
		if (isset($id_capteur))
		{
			// Traitement du contenu du formulaire
			if ($_POST["nom"] == "")
			{
				$nom = $array["nom"];
			}
			else
			{
				$nom = $_POST["nom"];
			}

			if ($_POST["type_capteur"] == "")
			{
				$type_capteur = $array["type_capteur"];
			}
			else
			{
				$type_capteur = $_POST["type_capteur"];
			}

			if ($_POST["zone"] == "")
			{
				$id_zone = $array["id_zone"];
			}
			else
			{
				$id_zone = $_POST["zone"];
			}

			if ($_POST["unite"] == "")
			{
				$unite = $array["unite"];
			}
			else
			{
				$unite = $_POST["unite"];
			}

			if ($_POST["valmin"] == "")
			{
				$valmin = $array["valmin"];
			}
			else
			{
				$valmin = $_POST["valmin"];
			}

			if ($_POST["valmax"] == "")
			{
				$valmax = $array["valmax"];
			}
			else
			{
				$valmax = $_POST["valmax"];
			}

			// Prepare the query.
			$envoi= $conn->prepare ("UPDATE `capteur` SET nom = ?, id_zone = ?, type_capteur = ?, unite = ?, valmin = ?, valmax = ? WHERE id_capteur = ?;");
			// Execute the query.
			$envoi->execute(array($nom, $id_zone, $type_capteur, $unite, $valmin, $valmax, $id_capteur));
			
			echo "Capteur modifié !</br></br>";

			unset($_POST["checkForm"]);
			unset($id_capteur);
		}
	}

// Affichage des capteurs

	// Prepare the query.
	$sql= $conn->prepare ("SELECT id_capteur, nom, id_zone, type_capteur, unite, valmin, valmax FROM `capteur`;");
	// Execute the query.
	$sql->execute(array());

	echo "liste capteurs:</br>";

	$listCapteurs = array();
	while ($array = $sql->fetch(PDO::FETCH_ASSOC))
	{
		foreach ($array as $key => $value) 
		{
			echo $key, " : ", $value, "  ,  ";
		}
		$listCapteurs[$array["id_capteur"]] = $array["nom"];
		echo "<br />";
	}
?>
<form method="post" action="gestion_batiment.php?page=2">
	<p>
		<table>
			<tr>
				Capteur à modifier : 
				<SELECT name="capteur">
					<?php
						foreach ($listCapteurs as $key => $value)
						{
						?>
							<OPTION value="<?php echo $key; ?>"><?php echo $value; ?></OPTION>
						<?php
						}
					?>
				</SELECT>
			</tr>
			<tr>
				<td>
					Nom : 
				</td>
				<td>
					<input type="text" name="nom" maxlength="10" /><br />
				</td>
				<td>
					type_capteur : 
				</td>
				<td>
					<input type="text" name="type_capteur" maxlength="20" /><br />
				</td>
				<td>
					Zone :
				</td>
				<td>
					<?php
						// Prepare the query.
						$listZone = $conn->prepare ("SELECT id_zone, nom FROM `zone`;");
						// Execute the query.
						$listZone->execute(array());
					?>
					<SELECT name="zone">
						<OPTION value="">Même zone</OPTION>
						<?php
							while ($array = $listZone->fetch(PDO::FETCH_ASSOC))
							{
							?>
								<OPTION value="<?php echo $array["id_zone"]; ?>"><?php echo $array["nom"]; ?></OPTION>
							<?php
							}
						?>
					</SELECT>
				</td>
			</tr>
			<tr>
				<td>
					unite :
				</td>
				<td>
					<input type="text" name="unite" maxlength="20" /><br />
				</td>
				<td>
					valmin :
				</td>
				<td>
					<input type="text" name="valmin" maxlength="20" /><br />
				</td>
				<td>
					valmax :
				</td>
				<td>
					<input type="text" name="valmax" maxlength="20" /><br />
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>
					<input type="hidden" name="checkForm" value="formulaire">
					<input type="submit" value="Envoyer le formulaire">
				</td>
			</tr>
		</table>
	</p>
</form>
