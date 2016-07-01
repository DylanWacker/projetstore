<?php
/*
  Page     : index.php
  Auteur   : Dylan's
  Fonction : Index
 */
include 'Mysql.php';
include 'Fonction.php';
session_start();
//dbConnect();
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
                    //si l'avatar existe pas sa met une photo inconnu
                    if (empty($Info['Avatar'])) {
                        $Avatar = 'inconnu.jpg';
                    } else {
                        $Avatar = $Info['Avatar'];
                    };
                    echo '  <table>';
                    echo '<tr><td>Avatar</td><td> <img src="../IMAGES/AVATAR/' . $Avatar . '" alt="Avatar" width="75" height="75">   </td></tr>';
                    echo '<tr><td>Pseudo:</td><td>' . $Info['Pseudo'] . '</td></tr>';
                    echo '<tr><td>Nom:</td><td>' . $Info['Nom'] . '</td></tr>';
                    echo '<tr><td>Prenom:</td><td>' . $Info['Prenom'] . '</td></tr>';
                    echo '<tr><td>Email:</td><td>' . $Info['Email'] . '</td></tr>';
                    echo '<tr><td></td><td><a href="./Modifier.php?IdUser=' . $Info['IdUser'] . '"><input type="button"  name="modifier" value="Modifier"> </a></td></tr>';
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
