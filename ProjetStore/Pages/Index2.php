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
               <div class="home">
                <div class="row">
                    <div class="wrap">
                        <?php $Produits = $DB->query('SELECT * FROM store'); ?>
                        <?php foreach ($Produits as $Produit): ?>
                            <div class="box">
                                <div class="product full">
                                    <a href="#">
                                        <img width="200px"src="../Images/Store/Store<?= $Produit->IdStore; ?>.jpg">
                                    </a>
                                    <div class="description">
                                        <?= $Produit->NomStore; ?>
                                        <a href="#" class="price"><?= number_format($Produit->PrixStore, 2, ',', ' '); ?> .-</a>
                                    </div>
                                    <a class="add addPanier" href="addpanier.php?IdStore=<?php echo $Produit->IdStore; ?>">
                                        add
                                    </a>
                                     <?php

    include 'FormulaireProduit.php';
    ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

 

        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>