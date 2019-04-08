
<?php include '../shared/connection.php';?>
<?php include '../shared/session.php';?>
<?php include '../shared/header.php';?>
<?php include '../shared/menu.php';?>

<div class="container">
	<br>
	<h1>Endre bilsalg</h1>


	<?php
		// hent bruker
		$user_check=$_SESSION['epost'];

		// hent bilsalg som er knyttet til bruker
		$ql = "SELECT b.reg_nr, b.farge, bm.modell, bm.modell_id, bm.merke, p.person_id, p.epost
						FROM Bil b
						LEFT OUTER JOIN Bilmodell bm ON (b.modell_id=bm.modell_id)
						LEFT OUTER JOIN Bilkjøp bk ON (bk.reg_nr=b.reg_nr)
						LEFT OUTER JOIN Person p ON (bk.person_id=p.person_id)
						WHERE p.epost='$user_check';";
		$resultat = $connection->query($ql);
		if (!$resultat){
			die($connection->error);
		}
		while ($rad = $resultat->fetch_assoc()) {
				//edit
				echo "<form role='form' method='post'>";
				echo "Reg nr: <input type='text' pattern= '[A-Z]{2}[0-9]{5}' name='Reg_nr' placeholder='BT45093' disabled value='$rad[reg_nr]'>";
				echo "Farge: <input type='text' name='Farge' placeholder='Farge' value='$rad[farge]' required>";
				echo "Pris: <input type='text' name='Pris' placeholder='Pris' value='$rad[pris]' required>";
				echo "<button type='submit' class='btn btn-primary' name='Endre_$rad[reg_nr]'>Endre</button>";
				echo "</form>";

				echo "Post: " . $_POST['Endre_'.$rad[reg_nr]];
		 		if(isset($_POST['Endre_'.$rad[reg_nr]])) {
		 			      echo "Foobar!";
		 					$farge = $_POST["Farge"];
		 					$pris = $_POST["Pris"];

		 					$sql = "UPDATE Bil SET farge='$farge'
		 									WHERE reg_nr='$rad[reg_nr]';";

		 				if($connection->query($sql)) {
		 			echo "Spørringen ble gjennomført";
		 			} else {
		 			echo "<p>Noe gikk galt <br>
		 			Spørring: $sql <br>Feilmelding: $connection->error";
		 			}
		 		}



		}

		/*
		//delete
		echo "<form role='form' method='post'>";
		echo "<button type='submit' class='btn btn-danger' name='Slett_$rad[reg_nr]>Slett</button>";
		echo "</form>";

		echo "Post: " . $_POST['Slett_'.$rad[reg_nr]];
		if(isset($_POST['Slett_'.$rad[reg_nr]])) {
						echo "Foobar!";
					$sql = "DELETE FROM Bil WHERE reg_nr='$rad[reg_nr]';";

				if($connection->query($sql)) {
			echo "Spørringen ble gjennomført";
			} else {
			echo "<p>Noe gikk galt <br>
			Spørring: $sql <br>Feilmelding: $connection->error";
			}
		}

		echo "<br />";
		*/
	?>


	<?php

	?>

	</div>
<?php include '../shared/footer.php';?>
