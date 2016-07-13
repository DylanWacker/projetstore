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
<<<<<<< HEAD
        <section>          
=======
        <section>
            
            <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;border:none;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
            .tg .tg-yw4l{vertical-align:top}
            </style>              
            <table class="tg">
            <?php $Produits = $DB->query('SELECT * FROM store'); ?>
            <?php foreach ($Produits as $Produit): ?>
                <tr><th class="tg-yw4l">
                    <div class="panel panel-success">
                        <div class="panel-heading"> <h2><?php echo $Produit->NomStore; ?></h2></div>
                        <div class="panel-body">
                          <a href="#">
                          <img src="../Images/Store/Store<?= $Produit->IdStore; ?>.jpg" width="200px" height="200px">
                          </a></br>
                         <a href="#"><?= $Produit->PrixStore?> .-</a><br>
                         <?php $IdStore=$Produit->IdStore;
                        include 'FormulaireProduit.php';?>                
                        </div>
                   </div>
               </th>
>>>>>>> origin/master


            <div class="home">
                <div class="row">
                    <div class="wrap">
                        <?php $Produits = $DB->query('SELECT * FROM store'); ?>
                        <?php foreach ($Produits as $Produit): ?>
                            <div class="box">
                                <div class="product full">
                                    <a href="#">
                                        <img width="250px"src="../Images/Store/Store<?= $Produit->IdStore; ?>.jpg">
                                    </a>
                                    <div class="description">
                                        <?= $Produit->NomStore; ?>
                                        <a href="#" class="price"><?= number_format($Produit->PrixStore, 2, ',', ' '); ?> €</a>
                                    </div>
                                    <a class="add addPanier" href="addpanier.php?IdStore=<?php echo $Produit->IdStore; ?>">
                                        add
                                    </a>
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