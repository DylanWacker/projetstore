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
$PaimentPrix=$_SESSION['PaimentPrix'];
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
            <div class="PaiementMenu">
                <center>
                    <div class="cell"> Panier</div>
                    <div class="cell"> Informations</div>
                    <div class="cell active">Paiement</div>
                    <div class="cell"> Confirmation</div>
                </center>
                <article>
     
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="Store@gmail.com">
<input type="hidden" name="item_name" value="Mon sotre">
<input type="hidden" name="currency_code" value="CHF">
<input type="hidden" name="amount" value="<?= $PaimentPrix ?>">
<input type="image" src="http://www.paypal.com/fr_XC/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="Store@gmail.com">
<input type="hidden" name="item_name" value="Mon sotre">
<input type="hidden" name="currency_code" value="CHF">
<input type="hidden" name="amount" value="<?= $PaimentPrix ?>">
<input type="image" src="http://www.paypal.com/fr_XC/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>


                </article>
        </section>
        <?php
        include 'Footer.php';
        echo $PaimentPrix;
        ?>
    </body>
</html>