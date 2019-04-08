<?php include '../shared/connection.php';?>
<?php include '../shared/session.php';?>
<?php include '../shared/header.php';?>
<?php include '../shared/menu.php';?>
		<div class="container">
			<h1>Bilmodeller</h1>
			<table>
				<tr>
					<th>Merke</th>
					<th>Modell</th>
					<th>År</th>
				</tr>
				<?php
						$ql = "SELECT * FROM Bilmodell";
						$resultat = $connection->query($ql);

						while ($rad = $resultat->fetch_assoc()) {
								echo "<tr>";
								echo "<td>$rad[merke]</td>";
								echo "<td>$rad[modell]</td>";
								echo "<td>$rad[aar]</td>";
								echo "</tr>\n";
						}
				?>
			</table>
		<?php include '../shared/footer.php';?>
		</div>
	</body>
</html>
