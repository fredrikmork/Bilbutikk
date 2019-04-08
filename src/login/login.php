<?php
	session_name('mofr1108');
	session_start();
 ?>
<?php include '../shared/connection.php';?>
<?php include '../shared/header.php';?>
<?php include '../shared/menu.php';?>
		<div class="container">
			<h1 class="tittel">Login</h1>

			<br>
				<form method="post">
					E-post: <input type="text" name="epost" placeholder="Epost" required />
					Passord: <input type="password" name="passord" placeholder="Passord" required />
					<input type="submit" value="login" name="login" />
				</form>
			<div class="link">
				<ul>
					<li><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/login/signup.php">Registrer bruker</a>
				</ul>
			</div>
			<?php
				echo "" . $_POST['login'];
				if(isset($_POST["login"])) {
					echo "Foobar!";
					$epost = $_POST ["epost"];
					$passord = $_POST["passord"];

					// hent brukeren
					$sql = "SELECT * FROM Person WHERE epost='$epost';";
					$resultat = $connection->query($sql);
					if($resultat) {
						echo "Spørringen ble gjennomført";

						$epostDb = "";
						$passhash = "";
						while ($rad = $resultat->fetch_assoc()) {
							$epostDb = $rad[epost];
							$passhash = $rad[passhash];
						}

						// http://www.sitepoint.com/hashing-passwords-php-5-5-password-hashing-api/
						if(password_verify($passord, $passhash)){
							// passord er riktig
							echo "Du fikk logget inn!";

							// lag session hvis passord er riktig
							$_SESSION['loggedin'] = true;
							$_SESSION['timeout'] = time();
							$_SESSION['epost'] = $epost;
							echo $_SESSION['epost'];

							// redirect til innlogget
							header("Location: ../index.php");

						}else {
						  // Invalid credentials
							echo "Du fikk ikke logget inn!";
						}
					} else {
						echo "<p>Noe gikk galt <br>
						Spørring: $sql <br>Feilmelding: $connection->error</p>";
					}
				}
				//$check = mysql_query("SELECT * FROM Person WHERE epost = '$username'");

				//$query = "SELECT * FROM Person WHERE epost = '.$username.'";
				//$check = mysql_query($query);
				//echo $query;

				?>
		<?php include '../shared/footer.php';?>
		</div>
	</body>
</html>
