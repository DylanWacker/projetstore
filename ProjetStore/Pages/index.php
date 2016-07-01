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
            <?php
            $NomProduit="Store 5.0 V9";
            $QteProduit=2;
            $PrixProduit=300;
         function AjouterArticle($NomProduit,$QteProduit,$PrixProduit){};
             ?> 
         
        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>