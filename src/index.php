<?php
	session_name('mofr1108');
	session_start();
 ?>
<?php include 'shared/header.php';?>
<?php include 'shared/menu.php';?>
		<div class="container">
			<div class="header">
				<h1 id="tittel">Fredda  jiys bilshappe</h1>
					<?php
						echo '<p>Det er ' . (date('d F Y')) . ' i dag</p>';
		 			?>
			</div>
			<h2 class="header"> Litt om vår bilbutikk:</h2>
				<div class="tekst">
					<p>Hei, her kan du som bruker selge og kjøpe bil.
					<br>Biler som du selv har lagt ut som salg kan du forandre på informasjon om bilen på "Min profil" i menybaren.
					</p>
				</div>
				<br>
<?php include 'shared/footer.php';?>
		</div>
	</body>
</html>
