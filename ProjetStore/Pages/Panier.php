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

    </head>
<body>

    <section>
         <div class="PaiementMenu">
                <center>
                    <div class="cell active"> Panier</div>
                    <div class="cell"> Informations</div>
                    <div class="cell">Paiement</div>
                    <div class="cell"> Confirmation</div>
                </center>
            </div>
        <article >

            <div class="panier">

                <div class="wrapper">
                    <h2>Panier</h2>
                    <form method="post" action="panier.php">   
                        <div class="table">

                            <div class="row header">
                                <div class="cell">Image </div>
                                <div class="cell">Nom </div>
                                <div class="cell">Prix </div>
                                <div class="cell">Quantité</div>
                                <div class="cell">Prix avec TVA </div>
                                <div class="cell">Actions </div>
                            </div>

                            <?php
                            $ids = array_keys($_SESSION['panier']);
                            if (empty($ids)) {
                                $products = array();
                            } else {
                                $products = $DB->query('SELECT * FROM store WHERE IdStore IN (' . implode(',', $ids) . ')');
                            }
                            foreach ($products as $product):
                                ?>                       
                                <div class="row">
                                    <div class="cell"><a href="#" > <img src="../Images/Store/Store<?= $product->IdStore; ?>.jpg" height="53"></a></div>
                                    <div class="cell"><?= $product->NomStore; ?></div>
                                    <div class="cell"><?= number_format($product->PrixStore, 2, ',', ' '); ?> .-</div>
                                    <div class="cell"><input type="number" min="0" max="100" name="panier[quantity][<?= $product->IdStore; ?>]" value="<?= $_SESSION['panier'][$product->IdStore]; ?>"></div>
                                    <div class="cell"><?= number_format($product->PrixStore * 1.24 * $_SESSION['panier'][$product->IdStore], 2, ',', ' '); ?> .-</div>
                                    <div class="cell">
                                        <a href="panier.php?delPanier=<?= $product->IdStore; ?>" ><img src="../Images/Icone/del.png"></a>
                                    </div>

                                </div>  
                            <?php endforeach; ?>
                        </div>

                        Grand Total :<?= number_format($panier->total(), 2, ',', ' '); ?> .- 
                        <input class="btn btn-primary" type="submit"  value="Recalculer">    
                        </form>
                    <form method="post" action="AchatInfo.php">
                         <input class="btn btn-primary " type="submit"  value="Acheter">  
                    </form>
                </div>
            </div>
        </article>
    </section>
    <?php
    include 'Footer.php';
    ?>
</body>
</html>
