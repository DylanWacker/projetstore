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
                                            $MessageErreur = "Une erreur s'est produite dans l'insertion des données utilisateurs";
                                        }
                                    } else {
                                        $InscriptionError = 'Pseudo';
                                        $MessageErreur = "Un membre possede deja ce pseudo";
                                    }
                                } else {
                                    $InscriptionError = 'Mdp';
                                    $MessageErreur = "les mot de passe ne correspondent pas";
                                }
                            } else {
                                $InscriptionError = 'Email';
                               $MessageErreur = "Email non valide";
                            }
                        } else {
                            $InscriptionError = 'Champs';
                            $MessageErreur =  "Il faut remplir tous les champs";
                        }
                    } else {

                        $MessageErreur =  "Une erreur s'est produite";
                    }
                } else {
                    $MessageErreur =  "Vous n'avez pas le droit d'acceder a cette page";
                }
                echo "<span style=\" color: red; \">".$MessageErreur."</span>";
                ?>
            </article>
            <article>
                <?php
                /* si le membre est connecte */
                if (VerifierConnection()) {
                    echo '<li><a href="Membres.php"><span>' . $_SESSION['User']['Pseudo'] . '</span></a></li> ';
                    echo'<li><a href="Deconnexion.php"><span>Déconnexion</span></a></li>';
                } else {
//Formulaire Inscription

                    echo' <form enctype="multipart/form-data" action="inscription.php" method="post">
                        <center>
                        <table> 
                            <tr>
                                <td><input  ';

                    echo'id="pseudo" type="text" value="';
                    if ($InscriptionError != 'Pseudo') {
                        if (isset($_POST['Pseudo'])) {
                            echo$_POST['Pseudo'];
                        }
                    };
                    echo'" maxlength="25" required name="Pseudo" placeholder="Pseudo" onclick="changerCouleur(this)"';
                    if ($InscriptionError == 'Pseudo') {
                        echo 'style="border-color: red;margin-bottom: 10px;"';
                    } else {
                        echo 'style="margin-bottom: 10px;"';
                    }
                    echo'/></td>          
                            </tr >
                            <tr>
                                <td><input  id="nom" type="text" value="';
                    if (isset($_POST['Nom'])) {
                        echo$_POST['Nom'];
                    } echo'" required name="Nom" placeholder="Nom" style="margin-bottom: 10px" /></td>  
                            </tr>
                            <tr>
                                <td> <input  id="prenom" type="text" value="';
                    if (isset($_POST['Prenom'])) {
                        echo$_POST['Prenom'];
                    } echo'" required name="Prenom" placeholder="Prenom" style="margin-bottom: 10px"/></td>
                            </tr>
                            <tr>
                                <td><input  id="text" type="text" value="';
                    if (isset($_POST['Adresse'])) {
                        echo$_POST['Adresse'];
                    } echo'" required name="Adresse" placeholder="Adresse" style="margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><input  id="text" type="text" value="';
                    if (isset($_POST['Npa'])) {
                        echo$_POST['Npa'];
                    } echo'" required name="Npa" placeholder="Npa" style="margin-bottom: 10px"/></td>
                            </tr> 
                               <tr>
                                <td><input  id="text" type="text" value="';
                    if (isset($_POST['Ville'])) {
                        echo$_POST['Ville'];
                    } echo'" required name="Ville" placeholder="Ville" style="margin-bottom: 10px"/></td>
                            </tr> 
                                               <tr>
                                
                                <td><input ';

                    echo' id="text" type="text"   value="';
                    if ($InscriptionError != 'Email') {
                        if (isset($_POST['Email'])) {
                            echo$_POST['Email'];
                        }
                    };
                    echo'" required name="Email" placeholder="Email" onclick="changerCouleur(this)" ';
                    if ($InscriptionError == 'Email') {
                        echo 'style="border-color: red;margin-bottom: 10px;"';
                    } else {
                        echo 'style="margin-bottom: 10px;"';
                    }
                    echo'/></td>
                            </tr>
                                                        <tr>
                                <td><input  id="Telephone" type="text" value="';
                    if (isset($_POST['Telephone'])) {
                        echo$_POST['Telephone'];
                    } echo'" required name="Telephone" placeholder="Telephone" style="margin-bottom: 10px"/></td>
                            </tr> 
                            <tr> 
                                <td><input  id="password" type="password" required value="" name="Mdp" placeholder="Mot de passe" ';
                    if ($InscriptionError == 'Mdp') {
                        echo 'style="border-color: red;margin-bottom: 10px;"';
                    } else {
                        echo 'style="margin-bottom: 10px;"';
                    }
                    echo'/></td>
                            </tr> 
                            <tr>
                                <td><input  id="password2" type="password" required value="" name="Mdp2" placeholder="Retapez le mot de passe" onclick="changerCouleur(this)" style="margin-bottom: 10px"/></td>
                            </tr> 
                        </center>     
                        </table> 


                       
                       <button type="submit" class="btn btn-primary ">S\'inscrire</button>&nbsp;<button type="reset" class="btn btn-warning">Réinitialiser</button>
                    </form>


                    
					
				  <div class="Inscription-help">
					</br><b>Vous avez un compte ? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><a href="#" class="btn btn-success"   data-toggle="modal"   data-dismiss="modal" data-target="#Login-modal">Connexion</a>
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
