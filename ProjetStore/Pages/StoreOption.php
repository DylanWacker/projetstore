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

    function afficher_nomcouleur(arg) {
        var IdDeLaCouleur= arg.id;
        var AfficherNomCouleur = document.getElementById("Text"+IdDeLaCouleur);
        if (AfficherNomCouleur) {
            AfficherNomCouleur.style.display = 'block';
        }
    }
    function cacher_nomcouleur(arg) {
        var IdDeLaCouleur= arg.id;
        var AfficherNomCouleur = document.getElementById("Text"+IdDeLaCouleur);
        if (AfficherNomCouleur) {
            AfficherNomCouleur.style.display = 'none';
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
                        echo'</select>'
                        . '</form><br>';

                        //Liste couleurs
                        echo 'Couleur: <FORM><select name="couleurs" >';
                        foreach ($CouleurStore as $Couleur) {
                            echo'<option value="' . $Couleur['IdCouleur'] . '">' . $Couleur['NomCouleur'];
                            echo'</option>';
                        };
                        ?>
                        </select>

                        <?php
                        $LongeurTableauCouleur = count($CouleurStore);
                        ?>
                        <script>var LongeurTableauCouleur = <?= $LongeurTableauCouleur ?>;</script>
                        <table>
                        <tr>
                        <?php foreach ($CouleurStore as $Couleur) { ?>
                            <td><a ><img onMouseout="cacher_nomcouleur(this)" onMouseover="afficher_nomcouleur(this)"onclick="affich_cadre(this, LongeurTableauCouleur);"  style="margin-right: 2px;margin-left: 2px" src="../Images/Couleur/<?php echo $Couleur['IdCouleur']; ?>.jpg"  id="<?php echo $Couleur['IdCouleur']; ?>" width="50px" height="50px"></a> </td>          
                        <?php }; ?>    
                        </tr>
                        <tr>   
                        <?php foreach ($CouleurStore as $Couleur) { ?>
                            <td><div style="display:none;"id="Text<?= $Couleur['IdCouleur']; ?>" class="Text<?=$Couleur['IdCouleur']; ?>"> <?= $Couleur['NomCouleur']; ?></div></td>
                        
                        <?php }; ?>
                        </tr>
                        </table>

                </form>
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