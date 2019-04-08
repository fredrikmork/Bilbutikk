
<div class="menyBar">
  <!-- http://getbootstrap.com/components/#navbar -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav menyBar">
      <li><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/">Hjem</a></li>
      <li><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/carModels/carModels.php">Våre bilmodeller</a></li>
      <li><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/car/carDetails.php">carDetails</a></li>
      <li><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/car/forSale.php">Biler til salgs</a></li>

        <?php
  				if(!$_SESSION['loggedin']){
  					//Ikke logget inn

            echo'<li><form action="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/login/login.php"><input type="submit" value="Logg inn/Registrer bruker" class="btn btn-default navbar-btn"></form></li>';

  				//echo '<li><button type="button" class="btn btn-default navbar-btn"><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/login/login.php">Logg inn/Registrer bruker</a></button></li>';
  				}else{
            echo '<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Min profil<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/myUser/editCarDetails.php">Endre bilsalg</a></li>
                <li><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/myUser/registerCarDetails.php">Registrer bilsalg</a></li>
              </ul>
            </li>';
            echo "<p class='navbar-text'>Velkommen, " . $_SESSION['epost'] . "!</p>";
  					//logget inn
            echo'<li><form action="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/login/logout.php"><input type="submit" value="Logg ut" class="btn btn-default navbar-btn"></form></li>';
  					//echo '<button type="button" class="btn btn-default navbar-btn"><a href="http://elevweb.akershus-fk.no/~mofr1108/Oblig6_bilbutikk/login/logout.php">Logg ut</a></button>';
  				}
  			 ?>
    </ul>
  </div>
</div>
