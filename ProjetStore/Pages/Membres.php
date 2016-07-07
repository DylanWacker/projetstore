<?php
/*
  Page     : index.php
  Auteur   : Dylan's
  Fonction : Index
 */
include 'Mysql.php';
include 'Fonction.php';
session_start();
dbConnect();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'Head.php';
    ?>
    <body>  
        <?php
        include './Header.php';
        ?> 
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
                    echo('<br/> <a href="connexion.php"><input type="submit" value="se connecter"/></a> ');
                }
                ?>
            </article>
        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>
