<?php include '../shared/connection.php';?>
<?php include '../shared/session.php';?>
<?php include '../shared/header.php';?>
<?php include '../shared/menu.php';?>
		<div class="container">
			<br>
			<h1>Bilmodeller</h1>
			<table>
			<tr>
			<th>Modell</th>
			<th>Merke</th>
			<th>År</th>
			</tr>
			<?php
					$ql = "SELECT * FROM Bilmodell";
					$resultat = $connection->query($ql);

					while ($rad = $resultat->fetch_assoc()) {
							echo "<tr>";
							echo "<td>$rad[modell]</td>";
							echo "<td> $rad[merke]</td>";
							echo "<td>$rad[aar]</td>";
							echo "</tr>\n";
					}
			?>
			</table>
			<br>
				<form method="post">
				Modell: <input type="text" name="Modell" placeholder="R8" required>
				Merke: <input type="text" name="Merke" placeholder="Audi" required >
				År: <input type="text" name="År" pattern="[0-9]{4}" placeholder="2010" required>

				<input type="submit" value="Legg til!" name="leggtil">
				</form>
			<?php
			   echo " " . $_POST['leggtil'];
				if(isset($_POST["leggtil"])) {
					      echo "Foobar!";
							$modell = $_POST ["Modell"];
							$merke = $_POST["Merke"];
							$aar = $_POST["År"];


							$sql = "INSERT INTO Bilmodell (modell, merke, aar)
											VALUES ('$modell' , '$merke' , '$aar')";

						if($connection->query($sql)) {
					echo "Bilmodell ble lagt til!";
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
