<?php
/*
  Page     : index.php
  Auteur   : Dylan's
  Fonction : Index
 */
require '_header.php';
include 'Mysql.php';
include 'Fonction.php';
dbConnect();
$Pseudo= $_SESSION['User']['Pseudo'];
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'Head.php';
    ?>
    <body>  

        <!-- jQuery (Necessaire pour Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Ajoute les fichiers bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/MenuNavigation.js"></script>
        <nav>
            <?php
            include './MenuNavigation.php';
            ?> 
        </nav>
        <section>
            <article>
                
                <?php
                if (VerifierConnection()) {
                    ?>

                    <?php
                    $Info = AfficheInformation($Pseudo);          
                    echo '  <table>';
                    echo '<tr><td>Pseudo:</td><td>' . $Info['Pseudo'] . '</td></tr>';
                    echo '<tr><td>Nom:</td><td>' . $Info['Nom'] . '</td></tr>';
                    echo '<tr><td>Prenom:</td><td>' . $Info['Prenom'] . '</td></tr>';
                    echo '<tr><td>Email:</td><td>' . $Info['Email'] . '</td></tr>';
                    echo '<tr><td></td><td><a href="./Modifier.php?IdUser=' . $Info['IdClient'] . '"><input type="button"  name="modifier" value="Modifier"> </a></td></tr>';
                    echo '  </table>';
                } else {
                    echo "connectez vous pour pouvoir acceder à cette page";
                    echo('<br/> <a href="connexion.php"><input class="btn btn-primary btn-block" type="submit" value="se connecter"/></a> ');
                }
                ?>
            </article>
            <span class="input input--minoru">
					<input class="input__field input__field--yoko" type="text" id="input-16" />
					<label class="input__label input__label--yoko" for="input-16">
						<span class="input__label-content input__label-content--yoko">Street</span>
					</label>
				</span>
				<span class="input input--minoru">
					<input class="input__field input__field--yoko" type="text" id="input-17" />
					<label class="input__label input__label--yoko" for="input-17">
						<span class="input__label-content input__label-content--yoko">City</span>
					</label>
				</span>
				<span class="input input--minoru">
					<input class="input__field input__field--yoko" type="text" id="input-18" />
					<label class="input__label input__label--yoko" for="input-18">
						<span class="input__label-content input__label-content--yoko">Region</span>
					</label>
				</span>
        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>
