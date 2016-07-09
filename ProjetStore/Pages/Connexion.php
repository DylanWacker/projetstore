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
            <h1>Connexion</h1>
            <article>
                <article>
                    <?php
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
                                    echo "Identifiants incorrecte";
                                    echo('<br/> <a href="index.php"  data-toggle="modal" data-target="#Login-modal""><input type="submit" value="Réessayer"/></a> ');
                                } else {


                                    /* on cree les variables de session du membre qui lui serviront pendant sa session */

                                    $_SESSION['User'] = $resultat;
                                    if (isset($_SESSION['User']['Pseudo'])) {
                                        $Pseudo = $_SESSION['User']['Pseudo'];
                                    }
                                    $Info = AfficheInformation($Pseudo);
                                    $_SESSION['Profil'] = $Info;


                                    /* on renvoie sur la page d'accueil */
                                    ?>   
                                    <SCRIPT LANGUAGE="JavaScript">
                                        document.location.href = "index.php"
                                    </SCRIPT>
                                    <?php
                                }
                            } else {
                                echo "Il faut remplir tous les champs";
                                echo('<br/> <a href="index.php"  data-toggle="modal" data-target="#Login-modal"><input type="submit" value="Réessayer"/></a> ');
                            }
                        } else {
                            echo "Une erreur s'est produite";
                            echo('<br/> <a   data-toggle="modal" data-target="#Login-modal" href="index.php"><input type="submit" value="Réessayer"/></a> ');
                        }
                    } else {
                        echo "Connexion déjà établie";
                        echo('<br/> <a href="index.php"  data-toggle="modal" data-target="#Login-modal"><input type="submit" value="Réessayer"/></a> ');
                    }
                    ?>
                </article>
            </article>
        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>

</html>