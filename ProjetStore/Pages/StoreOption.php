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
            <?php
            if(empty($_GET['IdStore'])){
            echo '<center><h1 style="color:red">Pas de store sélectionné!</h1></center>';
    
             } else {                                                  
            $IdStore = $_GET['IdStore'];
            $Store = AfficherStoreByID($IdStore);
            $TypeCommande = AfficherTypeCommandeById($IdStore);
            $TypeStore = AfficherTypeStoreById($IdStore);
            $CouleurStore = AfficherCouleurStoreById($IdStore);
            ?> 

            <h1>
                <?php echo $Store['NomStore']; ?> 
            </h1><br>
            <form enctype="multipart/form-data" action="addpanier.php?IdStore=' . $Store['IdStore'] . '" method="post">
                <table>
                        <img src="../Images/Store/Store<?php echo $Store['IdStore']; ?>.jpg" width="200px" height="200px"><br>
                             <?php
                        echo 'Prix: ' . $Store['PrixStore'] . '<br>';
                        echo 'Poids: ' . $Store['PoidStore'] . '<br>';

                        //Liste Commande
                        echo 'Commande: <FORM><select name="Commandes" >';
                        foreach ($TypeCommande as $Commande) {
                            echo'<option value="' . $Commande['IdTypeCommande'] . '">' . $Commande['Commande'];
                            echo'</option>';
                        };
                        echo'</SELECT>'
                        . '</FORM><br>';
                      
                        //Liste couleurs
                        echo 'Couleur: <FORM><select name="couleurs" >';
                        foreach ($CouleurStore as $Couleur) {
                            echo'<option value="' . $Couleur['IdCouleur'] . '">' . $Couleur['NomCouleur'];
                            echo'</option>';
                        };
                        ?>
                    </SELECT>
                    </FORM>
                </table>
                <a class="add addPanier" href="addpanier.php?IdStore=<?= $Store['IdStore'] ?>">Acheter</a>
            </form>    
            <?php } ?>
        </section>
        
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>