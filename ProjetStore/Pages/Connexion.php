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
            <h1>Connexion</h1>
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
                                $ConnexionError = 'Identifiants';
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
                            $ConnexionError = 'Champs';
                        }
                    } else {
                        echo "Une erreur s'est produite";
                        $ConnexionError = 'Error';
                    }
                } else {
                    echo "Connexion déjà établie";
                }
                ?>
            </article>
            <article>
                <?php
                /* si le membre est connecte */
                if (VerifierConnection()) {
                    echo '<li><a href="Membres.php"><span>' . $_SESSION['User']['Pseudo'] . '</span></a></li> ';
                    echo'<li><a href="Deconnexion.php"><span>Déconnexion</span></a></li>';
                } else {
                    //Formulaire de Login
                    echo' <form method="post" action="connexion.php" enctype="multipart/form-data">
					<input type="text" onclick="changerCouleur(this)" value="';
                    if ($ConnexionError != 'Identifiants') {
                        if (isset($_POST['Pseudo'])) {
                            echo$_POST['Pseudo'];
                        }
                    };
                    echo'" name="Pseudo"  required placeholder="Pseudo" ';
                    if ($ConnexionError == 'Identifiants') {
                        echo 'style="border-color: red;margin-bottom: 10px;"';
                    } else {
                        echo 'style="margin-bottom: 10px;"';
                    }
                    echo'>
					<input type="password" onclick="changerCouleur(this)" name="Mdp" required placeholder="Mot de passe" ';
                    if ($ConnexionError == 'Identifiants') {
                        echo 'style="border-color: red;margin-bottom: 10px;"';
                    } else {
                        echo 'style="margin-bottom: 10px;"';
                    }
                    echo'>
                                        <a href="MdpOublier.php" style="margin-bottom: 10px">Mot de passe oublié?</a>
					<button type="submit" class="btn btn-primary btn-block">Connexion</button>
				  </form>					
				  <div class="Login-help">

					</br><b> Vous n\'avez pas de compte ? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b> <a href="#" class="btn btn-success"   data-toggle="modal"   data-dismiss="modal" data-target="#Inscription-modal">Inscription</a>

				  </div>
				</div>
			</div>
		  </div></li>';
                };
                ?></article>
        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>

</html>