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
<script type="text/javascript">
    function affich_cadre(arg, LongeurTableauCouleur) {

        for (i = 1; i <= LongeurTableauCouleur; i++) {
            if (i == arg.id) {
                arg.style.border = '#00FF00 2px solid';

            } else {
                ElementCouleur = document.getElementById(i);

                ElementCouleur.style.border = '0';
            }
        }

    }
</script>
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
            <article >
                <div class="StoreOption">
                    <div class="wrapper">
                        <?php
                        if (empty($_GET['IdStore'])) {
                            echo '<center><h1 style="color:red">Pas de store sélectionné!</h1></center>';
                        } else {
                            $IdStore = $_GET['IdStore'];
                            $Store = AfficherStoreByID($IdStore);
                            $TypeCommande = AfficherTypeCommandeById($IdStore);
                            $TypeStore = AfficherTypeStoreById($IdStore);
                            $CouleurStore = AfficherCouleurStoreById($IdStore);
                            $Produit = $DB->query('SELECT * FROM store WHERE IdStore=' . $IdStore . '');
                            ?>

                            <div class="header"> <?php echo $Store['NomStore']; ?> </div>
                            <form enctype="multipart/form-data"  id="formulaire" action="addpanier.php?IdStore=' . $Store['IdStore'] . '" method="post">
                                <div class="table">
                                    <div class="left">
                                        <img src="../Images/Store/Store<?= $Store['IdStore']; ?>.jpg" width="300px" height="300px">
                                    </div>
                                    <div class="right">      

                                        <?php
                                        echo 'Prix: ' . $Produit[0]->PrixStore . '.-<br>';
                                        echo 'Poids: ' . $Produit[0]->PoidStore . 'Kg<br>';

                                        //Taille des stores
                                        $TailleDeBoucle = ($Produit[0]->TailleMax - $Produit[0]->TailleMin) / 5;
                                        echo 'Taille:<br> <FORM><select  name="Tailles" id="Tailles" >';
                                        for ($i = 0; $i <= $TailleDeBoucle; $i++) {
                                            echo'<option value="' . ($Produit[0]->TailleMin + ($i * 5)) . '">' . ($Produit[0]->TailleMin + ($i * 5)) . " cm";
                                            echo'</option>';
                                        };
                                        echo'</select><br/>';

                                        //Liste Commande
                                        echo 'Commande:<br> <FORM><select name="Commandes" >';
                                        foreach ($TypeCommande as $Commande) {
                                            echo'<option value="' . $Commande['IdTypeCommande'] . '">' . $Commande['Commande'];
                                            echo'</option>';
                                        };

                                        echo'</select>'
                                        . '</form><br>';
                                        //Liste couleurs
                                        echo 'Couleur:<br>';
                                        $LongeurTableauCouleur = count($CouleurStore);
                                        ?>
                                        <script>var LongeurTableauCouleur = <?= $LongeurTableauCouleur ?>;</script>
                                        <script type="text/javascript">
                                            // Afficher la box sous les couleurs
                                            $(window).load(function () {
                                                $('a[data-toggle="test123"]').tooltip({
                                                    animated: 'fade',
                                                    placement: 'top',
                                                    html: true
                                                });
                                            });
                                            var TailleMin = '<?= $Produit[0]->TailleMin; ?>'

                                            $('#formulaire').change(function(){
                                                //Taille
                                                 var ElementSelectionner = document.getElementById("Tailles");
                                                var choix = ElementSelectionner.selectedIndex;
                                                var valeur = ElementSelectionner.options[choix].value;
                                                var texte = ElementSelectionner.options[choix].text;
                                                var PrixTaille = (valeur - TailleMin) * 2;
                                                alert(PrixTaille);
                                                //totale
                                           var PrixStore = '<?= $Produit[0]->PrixStore; ?>'
                                                var PrixTotal = parseInt(PrixStore) + parseInt(PrixTaille);
                                                alert(PrixTotal);
                                        });
                                        </script>
                                        <div class="box">

                                            <?php
                                            $NombrePourIdCouleur = 1;
                                            foreach ($CouleurStore as $Couleur) {
                                                ?>

                                                <a data-toggle="test123"title="<?php echo $Couleur['NomCouleur']; ?><br/><img src='../Images/Couleur/<?php echo $Couleur['IdCouleur']; ?>.jpg' width='40px' height='30px' />">
                                                    <img onclick="affich_cadre(this, LongeurTableauCouleur);" src="../Images/Couleur/<?php echo $Couleur['IdCouleur']; ?>.jpg"  id="<?php echo $NombrePourIdCouleur; ?>" width="50px" height="50px">
                                                </a>
                                                <?php $NombrePourIdCouleur++;
                                            };
                                            ?>
                                        </div>
                                        <br/>
                                        <a type="button" class="add addPanier btn btn-warning" href="addpanier.php?IdStore=<?php echo $Produit[0]->IdStore; ?>"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Ajouter au panier</a> 
                                    </div>
                                </div>
                            </form>
<?php } ?>
                    </div>
            </article >
        </section>

        <?php
        include 'Footer.php';
        ?>
    </body>
</html>