
<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet";

// reconnection à la base de donnée
$conn = mysqli_connect($servername, $username,$password,$dbname);
// velfication de la connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_contenu = "SELECT contenu FROM demandes";
$sql_mailEtu = "SELECT mailEtu FROM demandes";
$sql_mailProf = "SELECT mailProf FROM demandes";


$res_contenu = mysqli_query($conn, $sql_contenu);
$res_mailEtu = mysqli_query($conn, $sql_mailEtu);
$res_mailProf = mysqli_query($conn, $sql_mailProf);


 echo "Veille choisir la demande à traite";
?>
		<form><SELECT>

    // extraire toutes les lignes du colonne contenu
  			<?php  while($verf = mysqli_fetch_assoc($res_contenu)) {?>
							<OPTION> <?php echo $verf['contenu'] ?>	</OPTION>;

				<?php } ?>

				echo "ok";

<?php while ($vef_mail = mysqli_fetch_assoc($res_mailEtu)) {
			echo $verf['mailEtu'] ;
}
?>

			</SELECT></form>
			<input type="submit">


<?php
mysqli_close($conn);
?>

</body>
</html>
