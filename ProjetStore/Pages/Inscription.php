<?php
/*
  Page     : connexion.php
  Auteur   : Carluccio Dylan
  Fonction : Page qui gere la connexion.
 */
require '_header.php';
include 'Mysql.php';
include 'Fonction.php';
dbConnect();
?>
<script>
    function changerCouleur(elm) {
        elm.setAttribute('style', 'border-color:none;margin-bottom: 10px;');
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
            <h1 style='text-align:center;'>Inscription</h1>
            <article style='text-align:center;'>
                <?php
                $MessageErreur = "";
                if (empty($_SESSION['User']['IdUser'])) { //les membres connectes ne peuvent pas s'inscrire
                    /* il faut que toutes les variables du formulaire existent */
                    if (isset($_POST['Pseudo']) && isset($_POST['Mdp']) && isset($_POST['Mdp2']) && isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Email']) && isset($_POST['Adresse']) && isset($_POST['Npa']) && isset($_POST['Ville']) && isset($_POST['Telephone'])) {
                        /* il faut que tous les champs soient renseignes */
                        if ($_POST['Pseudo'] != "" && $_POST['Mdp'] != "" && $_POST['Mdp2'] != "" && $_POST['Nom'] != "" && $_POST['Prenom'] != "" && $_POST['Email'] != "" && $_POST['Adresse'] != "" && $_POST['Npa'] != "" && $_POST['Ville'] != "" && $_POST['Telephone'] != "") {
                            // dbConnect();
                            // on teste l'adresse email, si c'est bon, on continue, sinon, on affiche un message d'erreur 
                            if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_POST['Email'])) {

                                //on test si les mot de passe sont identiques
                                if (($_POST['Mdp'] == $_POST['Mdp2'])) {
                                    // on verifie si un membre ne possede pas deja le meme pseudo 
                                    $Pseudo = $_POST['Pseudo'];

                                    if (!VerifierPseudo($Pseudo)) {
                                        /* on crypte le mot de passe */
                                        $Mdp = md5($_POST['Mdp']);
                                        //variable non déclaré
                                        $Nom = $_POST['Nom'];
                                        $Prenom = $_POST['Prenom'];
                                        $Email = $_POST['Email'];
                                        $Adresse = $_POST['Adresse'];
                                        $Npa = $_POST['Npa'];
                                        $Ville = $_POST['Ville'];
                                        $Telephone = $_POST['Telephone'];
                                        $Statut = 'Utilisateur';
                                        if (InscriptionUser($Pseudo, $Nom, $Prenom, $Email, $Mdp, $Statut, $Adresse, $Npa, $Ville, $Telephone)) {
                                            echo " Merci de votre inscription";
                                            echo('<br/> <a href="connexion.php"><input type="submit" value="se connecter"/></a> ');
                                        } else {
                                            $InscriptionError = 'Insertion';
                                            $MessageErreur = "Une erreur s'est produite dans l'insertion des données utilisateurs";
                                            include 'FormulaireProduitPHP.php';
                                        }
                                    } else {
                                        $InscriptionError = 'Pseudo';
                                        $MessageErreur = "Un membre possede deja ce pseudo";
                                        include 'FormulaireProduitPHP.php';
                                    }
                                } else {
                                    $InscriptionError = 'Mdp';
                                    $MessageErreur = "les mot de passe ne correspondent pas";
                                    include 'FormulaireProduitPHP.php';
                                }
                            } else {
                                $InscriptionError = 'Email';
                                $MessageErreur = "Email non valide";
                                include 'FormulaireProduitPHP.php';
                            }
                        } else {
                            $InscriptionError = 'Champs';
                            $MessageErreur = "Il faut remplir tous les champs";
                            include 'FormulaireProduitPHP.php';
                        }
                    } else {
                        $InscriptionError = 'Erreur';
                        $MessageErreur = "Une erreur s'est produite";
                        include 'FormulaireProduitPHP.php';
                    }
                } else {
                    $InscriptionError = 'Interdit';
                    $MessageErreur = "Vous n'avez pas le droit d'acceder a cette page";
                    
                }
                echo "<span style=\" color: red; \">" . $MessageErreur . "</span>";
                ?>
            </article>


        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>
