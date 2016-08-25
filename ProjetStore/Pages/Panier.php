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
$Totale = number_format($panier->total(), 2, '.', ' ');
if ($Totale <= 0) {
    $BouttonActive = 'disabled="disabled"';
} else {
    $BouttonActive = '';
}
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
                                <div class="cell">Taille </div>
                                <div class="cell">Commande </div>
                                <div class="cell">Couleur </div>
                                <div class="cell">Quantité</div>
                                <div class="cell">Prix avec TVA </div>
                                <div class="cell">Actions </div>
                            </div>

                            <?php
                            $ids = array_keys($_SESSION['panier']);
                            if (empty($ids)) {
                                $products = array();
                            } else {
                                $products = $_SESSION['panier'];
                            }
                            foreach ($products as $idStore => $product):
                                //$_SESSION['panier'][$_POST['idStore']][$_POST['taille']][$_POST['couleur']][$_POST['commande']]id
                                ?>                     
                                <div class="row">
                                    <?php
                                    foreach ($product as $idTaille => $taille) {
                                        foreach ($taille as $idCouleur => $couleur) {

                                            foreach ($couleur as $idCommande => $commande) {
                                                // Prix de base du store
                                                $Store = $DB->query('SELECT * FROM store WHERE IdStore= :idStore', ['idStore' => $idStore]);
                                                $PrixStore = $Store[0]->PrixStore;

                                                // Prix de la taille
                                                $TailleMin = $DB->query('SELECT * FROM store WHERE IdStore= :idStore', ['idStore' => $idStore]);
                                                $PrixTaille = (($idTaille - $TailleMin[0]->TailleMin) * 2);
                                                // Prix de la couleur
                                                $Couleur = $DB->query('SELECT * FROM couleur WHERE IdCouleur= :idCouleur', ['idCouleur' => $idCouleur]);
                                                $PrixCouleur = $Couleur[0]->PrixCouleur;
                                                // Prix de la commande
                                                $Commande = $DB->query('SELECT * FROM typecommande WHERE IdTypeCommande= :idTypeCommande', ['idTypeCommande' => $idCommande]);
                                                $PrixCommande = $Commande[0]->PrixCommande;
                                                echo '&nbsp';

                                                echo '<div class="cell"><a href="#" > <img src="../Images/Store/Store' . $idStore . '.jpg" height="53"></a></div>';
                                                echo '<div class="cell"> ' . $Store[0]->NomStore . '</div>';
                                                echo '<div class="cell"> ' . $PrixStore. '.- </div>';
                                                echo '<div class="cell"> ' . $idTaille . '</div>';
                                                echo '<div class="cell"> ' . $Commande[0]->Commande . '</div>';
                                                echo '<div class="cell"> ' . $Couleur[0]->NomCouleur . '(' . $Couleur[0]->PrixCouleur .')</div>';
                                                echo'<div class="cell"><input type="number" min="0" max="100" name="quantite" value="' . $commande . '"></div>';
                                                echo '<div class="cell">' . ($PrixCommande + $PrixTaille + $PrixCouleur + $PrixStore) * $commande . '.-</div>';
                                                //echo 'commande:'.$idCommande; 
                                                //echo 'quantité:'.$commande; 
                                                //echo 'couleur:'.$idCouleur; 
                                                ?>
                                                <div class="cell"> 
                                                    <a href="panier.php?delPanier=<?= $product->IdStore; ?>" ><img src="../Images/Icone/del.png"></a>
                                                </div>
                                            </div>  
                                            <?php
                                        }
                                    }
                                }
                                ?>  




                            <?php endforeach; ?>
                        </div>

                        Grand Total :<?= number_format($panier->total(), 2, ',', ' '); ?> .- 
                        <input class="btn btn-primary" type="submit"  value="Recalculer">    
                    </form>
                    <form method="post" action="AchatInfo.php">
                        <input class="btn btn-primary " type="submit"  <?= $BouttonActive; ?> value="Acheter">  
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
