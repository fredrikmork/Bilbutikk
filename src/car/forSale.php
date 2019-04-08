<?php include '../shared/connection.php';?>
<?php include '../shared/session.php';?>
<?php include '../shared/header.php';?>
<?php include '../shared/menu.php';?>
		<div class="container">
			<h1>Bilmodeller</h1>
			<table>
				<tr>
					<th>Reg nr</th>
					<th>Farge</th>
					<th>Merke</th>
					<th>Modell</th>
					<th>År</th>
					<th>Pris</th>
				</tr>
				<?php
						$ql = "SELECT b.reg_nr, b.farge, bm.merke, bm.modell, bm.aar, b.pris FROM Bil AS b JOIN Bilmodell AS bm ON b.modell_id = bm.modell_id";
						$resultat = $connection->query($ql);
						if (!$resultat){
							die($connection->error);
						}

						while ($rad = $resultat->fetch_assoc()) {
								echo "<tr>";
								echo "<td>$rad[reg_nr]</td>";
								echo "<td>$rad[farge]</td>";
								echo "<td>$rad[merke]</td>";
								echo "<td>$rad[modell]</td>";
								echo "<td>$rad[aar]</td>";
								echo "<td>$rad[pris]</td>";
								echo "</tr>\n";
						}
				?>
			</table>
		<?php include '../shared/footer.php';?>
		</div>
	</body>
</html>
