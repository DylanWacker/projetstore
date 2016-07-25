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
//ini variable
$ConnexionLab = "";
$Include = FALSE;


if (empty($_SESSION['User']['IdClient'])) { //les membres connectes ne peuvent pas s'inscrire
    //il faut que toutes les variables du formulaire existent 
    if (isset($_POST['Pseudo']) && isset($_POST['Mdp'])) {
        // il faut que tous les champs soient renseignes 
        if ($_POST['Pseudo'] != "" && $_POST['Mdp'] != "") {
            dbConnect();

            //on crypte le mot de passe pour faire le test
            $passhache = md5($_POST['Mdp']);

            //on verifie qu'un membre a bien ce pseudo et ce mot de passe
            $req = $dbc->prepare('SELECT * FROM client WHERE Pseudo = :Pseudo AND MotDePasse= :Mdp ');
            $req->execute(array('Pseudo' => $_POST['Pseudo'], 'Mdp' => $passhache));
            $resultat = $req->fetch();

            //s'il n'y a pas de resultat, on renvoie a la page de connexion
            if (!$resultat) {
                $ConnexionLab = "Identifiants incorrecte";
                $ConnexionError = 'Identifiants';
                $Include = TRUE;
            } else {


                /* on cree les variables de session du membre qui lui serviront pendant sa session */

                $_SESSION['User'] = $resultat;
                if (isset($_SESSION['User']['Pseudo'])) {
                    $Pseudo = $_SESSION['User']['Pseudo'];
                }
                $Info = AfficheInformation($Pseudo);
                $_SESSION['Profil'] = $Info;


                /* on renvoie sur la page d'accueil ou d'achats */

                header("Location: ".$_SERVER['HTTP_REFERER']."");
            }
        } else {
            $ConnexionLab = "Il faut remplir tous les champs";
            $ConnexionError = 'Champs';
            $Include = TRUE;
        }
    } else {
        $ConnexionLab = "Une erreur s'est produite";
        $ConnexionError = 'Error';
        $Include = TRUE;
    }
} else {
    $ConnexionLab = "Connexion déjà établie";
    $ConnexionError = 'Connecter';
}
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

            <article>
                <div class="connexion">

                    <div class="wrapper">
                        <div class="header">Connexion</div>
                        <?php
                        if ($Include = TRUE) {
                            include 'FormulaireConnexionPHP.php';
                        }
                        ?>
                    </div>
                </div>
            </article>

        </section>
        <?php
        include 'Footer.php';
        ?> 
    </body>

</html>

