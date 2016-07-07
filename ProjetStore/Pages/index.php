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

            <?php $Produits = AfficherStore(); ?>
            <?php foreach ($Produits as $Produit): ?>

                <a href="#">
                    <img src="../Images/Store/Store<?= $Produit['IdStore']; ?>.jpg" width="200px" height="200px">
                </a><br>

                <?php echo $Produit['NomStore']; ?>
                <a href="#"><?= $Produit['PrixStore']?> .-</a><br>

               
                <a href="addpanier.php?IdStore=<?= $Produit['IdStore']; ?>">
                    add
                </a><br>


            <?php endforeach ?>


            <ul >
                <li><a href="#"> Prev </a></li>
                <li> Page : <a href="#">2</a> of 3</li>
                <li><a href="#"> Next</a></li>
            </ul>


        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>