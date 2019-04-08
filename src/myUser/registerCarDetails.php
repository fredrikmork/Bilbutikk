<?php include '../shared/connection.php';?>
<?php include '../shared/session.php';?>
<?php include '../shared/header.php';?>
<?php include '../shared/menu.php';?>
		<div class="container">
			<br>
			<h1>Selg bil</h1>

			<br>
				<form method="post">
					<select name="ModellId">
					<?php
							$ql = "SELECT * FROM Bilmodell";
							$resultat = $connection->query($ql);
							while ($rad = $resultat->fetch_assoc()) {
									echo "<option value='$rad[modell_id]'>$rad[merke] $rad[modell] - $rad[aar]</option>";
							}
					?>
					</select>
					Regnr: <input type="text" name="Regnr" pattern= "[A-Z]{2}[0-9]{5}" placeholder="Regnr" required>
					Farge: <input type="text" name="Farge" placeholder="Farge" required>
					Pris: <input type="text" name="Pris" placeholder="Pris" required >
					<input type="submit" value="Selg" name="Selg">
				</form>
			<?php
			   echo " " . $_POST['Selg'];
				if(isset($_POST["Selg"])) {
					      echo "Foobar!"; //Sjekke om det fungerer
							$farge = $_POST ["Farge"];
							$regnr = $_POST ["Regnr"];
							$pris = $_POST["Pris"];
							$modellId = $_POST["ModellId"];


							$sql = "INSERT INTO Bil (reg_nr, farge, modell_id, pris) VALUES ('$regnr' , '$farge' , '$modellId', '$pris')";

							// hent bruker
							$user_check=$_SESSION['epost'];
							$sqlPerson = "SELECT person_id from Person where epost='$user_check'";
							$resultatPerson = $connection->query($sqlPerson);

							$personId = "";
							while ($rad = $resultatPerson->fetch_assoc()) {
								$personId = $rad[person_id];
							}

							// knytt bruker til bilsalg
							$sql2 = "INSERT INTO Bilkjøp (reg_nr, person_id) VALUES ('$regnr' , '$personId')";
					if($connection->query($sql) && $connection->query($sql2)) {
						echo "Bilsalg ble lagt til!";
					} else {
						echo "<p>Noe gikk galt <br>
						Spørring: $sql <br>Feilmelding: $connection->error</p>";
					}
				}
			?>
		<?php include '../shared/footer.php';?>
		</div>
	</body>
</html>
