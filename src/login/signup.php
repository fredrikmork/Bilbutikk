<?php include '../shared/connection.php';?>
<?php include '../shared/header.php';?>
<?php include '../shared/menu.php';?>
		<div class="container">
			<h1 class="tittel">Registrer bruker</h1>

			<p>
				<form method="post">
					E-post: <input type="text" name="epost" placeholder="Epost" required />
					Passord: <input type="password" name="passord" placeholder="Passord" required />
					Fornavn: <input type="text" name="fornavn" placeholder="Fornavn" required />
					Etternavn: <input type="text" name="etternavn" placeholder="Etternavn" required />
					Adresse: <input type="text" name="adresse" placeholder="Adresse" required />
				Postnummer: <input type="text" name="postnummer" placeholder="Postnummer" required />

					<input type="submit" value="signup" name="signup" />
				</form>
			<?php
				echo "" . $_POST['signup'];
				if(isset($_POST["signup"])) {
					echo "Foobar!";
					$epost = $_POST ["epost"];
					$passord = $_POST["passord"];
					$fornavn = $_POST ["fornavn"];
					$etternavn = $_POST["etternavn"];
					$adresse = $_POST ["adresse"];
					$postnummer = $_POST["postnummer"];


					// http://www.sitepoint.com/hashing-passwords-php-5-5-password-hashing-api/
					$passhash = password_hash($passord, PASSWORD_DEFAULT);
					$sql = "INSERT INTO Person (epost, fornavn, etternavn, adresse, passhash, postnummer) VALUES ( '$epost' , '$fornavn' , '$etternavn' , '$adresse', '$passhash', '$postnummer')";

					if($connection->query($sql)) {
						echo "Bruker er opprettet!";

						// lag session hvis bruker blir opprettet
						$_SESSION['loggedin'] = true;
						$_SESSION['timeout'] = time();
						$_SESSION['epost'] = $epost;

						// redirect til for sale
						header("Location: /~mofr1108/Oblig6_bilbutikk/car/forSale.php");
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
