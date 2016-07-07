<?php
/*
  Page     : connexion.php
  Auteur   : Carluccio Dylan
  Fonction : Page qui gere la connexion.
 */
include 'Mysql.php';
include 'Fonction.php';
session_start();
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
            <h1>Inscription</h1>
            <article>
<?php
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
                        $Token = Str_random(60);
                        $Nom = $_POST['Nom'];
                        $Prenom = $_POST['Prenom'];
                        $Email = $_POST['Email'];
                        $Adresse = $_POST['Adresse'];
                        $Npa = $_POST['Npa'];
                        $Ville = $_POST['Ville'];
                        $Telephone = $_POST['Telephone'];
                        $Statut = 'Utilisateur';
                        if (InscriptionUser($Pseudo, $Nom, $Prenom, $Email, $Mdp, $Statut, $Adresse, $Npa, $Ville, $Telephone, $Token)) {
                            echo " Merci de votre inscription";
                            $IdClient = $dbc->lastInsertId();
                            mail($_POST['Email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://local.dev/Lab/Comptes/confirm.php?id=$IdClient&token=$Token");
                            $_SESSION['Flash']['Success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
                            echo('<br/> <a href="connexion.php"><input type="submit" value="se connecter"/></a> ');
                        } else {
                            echo "Une erreur s'est produite dans l'insertion des données utilisateurs";
                        }
                    } else {
                        echo "Un membre possede deja ce pseudo";
                        echo('<br/> <a data-toggle="modal" data-target="#Inscription-modal"  href="index.php"><input type="submit" value="Réessayer"/></a> ');
                    }
                } else {
                    echo "les mot de passe ne correspondent pas";
                    echo('<br/> <a data-toggle="modal" data-target="#Inscription-modal"  href="index.php"><input type="submit" value="Réessayer"/></a> ');
                }
            } else {
                echo "Email non valide";
                echo('<br/> <a data-toggle="modal" data-target="#Inscription-modal"  href="index.php"><input type="submit" value="Réessayer"/></a> ');
            }
        } else {
            echo "Il faut remplir tous les champs";
            echo('<br/> <a data-toggle="modal" data-target="#Inscription-modal"  href="index.php"><input type="submit" value="Réessayer"/></a> ');
        }
    } else {
        echo "Une erreur s'est produite";
    }
} else {
    echo "Vous n'avez pas le droit d'acceder a cette page";
    echo('<br/> <a data-toggle="modal" data-target="#Inscription-modal" href="index.php"><input type="submit" value="Réessayer"/></a> ');
}
?>
            </article>
        </section>
<?php
include 'Footer.php';
?>
    </body>
</html>
