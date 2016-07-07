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
                <a href="#">
                    <img src="../Images/Store/Store<?= $Produit->IdStore; ?>.jpg" width="200px" height="200px">
                </a><br>

                <?php echo $Produit->NomStore; ?>
                <a href="#"><?= $Produit->PrixStore?> .-</a><br>

                 <?php $IdStore=$Produit->IdStore;
                 include 'FormulaireProduit.php';?>
               </th>

            </tr>
            <?php endforeach ?>
            </table>

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