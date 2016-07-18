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
<script language="javascript">
    function affich_cadre(arg, LongeurTableauCouleur) {

        for (i = 1; i <= LongeurTableauCouleur; i++) {
            if (i == arg.id) {
                arg.style.border = '#00FF00 2px solid';

            } else {
                var element = document.getElementById(i);

                element.style.border = '0';
            }
        }

    }

    function AfficherBox(arg) {
        var IdCouleur = arg.id;
        var elementCouleur = document.getElementById("description"+IdCouleur)
        elementCouleur.style.display = 'block';
    }
    function CacherBox(arg) {
         var IdCouleur = arg.id;
        var elementCouleur = document.getElementById("description"+IdCouleur)
        elementCouleur.style.display = 'none';
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
                            ?>
                            <div class="header"> <?php echo $Store['NomStore']; ?> </div>
                            <form enctype="multipart/form-data" action="addpanier.php?IdStore=' . $Store['IdStore'] . '" method="post">
                                <div class="table">
                                    <div class="left">
                                        <img src="../Images/Store/Store<?= $Store['IdStore']; ?>.jpg" width="200px" height="200px">
                                    </div>
                                    <div class="right">
                                        <?php
                                        echo 'Prix: ' . $Store['PrixStore'] . '.-<br>';
                                        echo 'Poids: ' . $Store['PoidStore'] . 'Kg<br>';

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

                                        <div class="box">

                                            <?php foreach ($CouleurStore as $Couleur) { ?>
                                                <a ><img onMouseout="CacherBox(this)" onMouseover="AfficherBox(this)"onclick="affich_cadre(this, LongeurTableauCouleur);" src="../Images/Couleur/<?php echo $Couleur['IdCouleur']; ?>.jpg"  id="<?php echo $Couleur['IdCouleur']; ?>" width="50px" height="50px"></a>

                                            <?php }; ?>
                                            <?php foreach ($CouleurStore as $Couleur) { ?>
                                                <div class="description" style="display: none;" id="description<?= $Couleur['IdCouleur']; ?>" class="Text<?= $Couleur['IdCouleur']; ?>"> <?= $Couleur['NomCouleur']; ?></div>


                                            <?php }; ?>

                                        </div>
                                        <a class="add addPanier" href="addpanier.php?IdStore=<?= $Store['IdStore'] ?>">Acheter</a>
                                    </div>
                                </div>
                            </form>
                            </table>







                        <?php } ?>
                    </div>
                </div>
            </article >
        </section>

        <?php
        include 'Footer.php';
        ?>
    </body>
</html>