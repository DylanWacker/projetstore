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
                                        echo 'Prix de base: ' . $Produit[0]->PrixStore . '.-<br>';
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
                                        echo 'Commande:<br> <FORM><select id="Commandes" name="Commandes" >';
                                        foreach ($TypeCommande as $Commande) {
                                            echo'<option id="' . $Commande['PrixCommande'] . '" value="' . $Commande['IdTypeCommande'] . '">' . $Commande['Commande'];
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
                                            //variable
                                            var CouleurSelect = "0";
                                            var TailleMin = '<?= $Produit[0]->TailleMin; ?>';
                                            var PrixTotal = "";
                                            var PrixStore = '<?= $Produit[0]->PrixStore; ?>'
                                            var PrixTaille = "0";
                                            var PrixCommande = "0";
                                            $(window).load(function () {
                                                $('a[data-toggle="couleur"]').tooltip({
                                                    animated: 'fade',
                                                    placement: 'top',
                                                    html: true
                                                });
                                            });
                                            //afficher le cadre couleur

                                            function affich_cadre(arg, LongeurTableauCouleur) {

                                                for (i = 1; i <= LongeurTableauCouleur; i++) {
                                                    if (i == arg.id) {
                                                        arg.style.border = '#00FF00 2px solid';
                                                        CouleurSelect = arg.name;
                                                        PrixTotal = parseInt(PrixStore) + parseInt(PrixTaille) + parseInt(CouleurSelect) + parseInt(PrixCommande);
                                                        document.all.PrixTot.innerHTML = PrixTotal;


                                                    } else {
                                                        ElementCouleur = document.getElementById(i);

                                                        ElementCouleur.style.border = '0';
                                                    }
                                                }

                                            }

                                        </script>
                                        <div class="box">

                                            <?php
                                            $NombrePourIdCouleur = 1;
                                            foreach ($CouleurStore as $Couleur) {
                                                ?>

                                                <a data-toggle="couleur" title="<?php echo $Couleur['NomCouleur']; ?><br/><img src='../Images/Couleur/<?php echo $Couleur['IdCouleur']; ?>.jpg' width='40px' height='30px' />">
                                                    <img onclick="affich_cadre(this, LongeurTableauCouleur);" src="../Images/Couleur/<?php echo $Couleur['IdCouleur']; ?>.jpg"  id="<?php echo $NombrePourIdCouleur; ?>" name="<?php echo $Couleur['PrixCouleur'] ?>" width="50px" height="50px">
                                                </a>
                                                <?php
                                                $NombrePourIdCouleur++;
                                            };
                                            ?>
                                        </div>
                                        <script  type="text/javascript">
                                            //Actualise a chaque changement
                                            $('#formulaire').change(function actu() {
                                                //Tailles 
                                                var ElementSelectionner = document.getElementById("Tailles");
                                                var choixTailles = ElementSelectionner.selectedIndex;
                                                var valeurTailles = ElementSelectionner.options[choixTailles].value;
                                                PrixTaille = (valeurTailles - TailleMin) * 2;
                                                //Commandes
                                                var ElementSelectionner = document.getElementById("Commandes");
                                                var choixCommandes = ElementSelectionner.selectedIndex;
                                                var valeurCommandes = ElementSelectionner.options[choixCommandes].value;
                                                PrixCommande = ElementSelectionner.options[choixCommandes].id;
                                                //totale
                                                PrixStore = '<?= $Produit[0]->PrixStore; ?>'
                                                PrixTotal = parseInt(PrixStore) + parseInt(PrixTaille) + parseInt(CouleurSelect) + parseInt(PrixCommande);
                                                document.all.PrixTot.innerHTML = PrixTotal;
                                            });

                                        </script>
                                        Prix: <label id="PrixTot"><?= $Produit[0]->PrixStore; ?></label>.-
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