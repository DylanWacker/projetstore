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
//ini variables
if (isset($_SESSION['User']['IdClient'])) {
    $InformationsCompte = AfficheInformationById($_SESSION['User']['IdClient']);
};
$InscriptionError = "";
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
            <div class="PaiementMenu">
                <center>
                    <div class="cell"> Panier</div>
                    <div class="cell active"> Informations</div>
                    <div class="cell">Paiement</div>
                    <div class="cell"> Confirmation</div>
                </center>
            </div>
            <article>

                <div class="Achat">

                    <div class="wrapper">

                        <?php
                        /* si le membre est connecte */
                        if (VerifierConnection()) {



//Informations compte
                            ?> 
                            <div class="header">Informations de comptes</div>
                            <form method="post" action="AchatPaiments.php">  
                                <div class="table">
                                    <?php
                                    echo' 
                          <center>
                          <table> 
                         
                         <tr>
                                <td><input id="pseudo" type="text" value="';
                                    echo $InformationsCompte['Pseudo'];
                                    echo'" maxlength="25" required name="Pseudo" placeholder="Pseudo" style="margin-top: 10px;margin-bottom: 10px"/></td>          
                            </tr>
                            <tr>
                                <td><input  id="nom" type="text" value="';
                                    echo $InformationsCompte['Nom'];
                                    echo'" required name="Nom" placeholder="Nom" style="margin-bottom: 10px" /></td>  
                            </tr>
                            <tr>
                                <td> <input  id="prenom" type="text" value="';
                                    echo $InformationsCompte['Prenom'];
                                    echo'" required name="Prenom" placeholder="Prenom" style="margin-bottom: 10px"/></td>
                            </tr>
                            <tr>
                                 <td><input id="Email" type="text"  value="';
                                    echo $InformationsCompte['Email'];
                                    echo'" style="margin-bottom: 10px"  required name="Email" placeholder="Email" /></td>
                            </tr>
                               <tr>
                                <td><input  id="Telephone" type="text" value="';
                                    echo $InformationsCompte['Telephone'];
                                    echo'" required name="Telephone" placeholder="Telephone" style="margin-bottom: 10px"/></td>
                            </tr> 
                      
                        </table> 
                             </center>  ';
                                    ?> 
                                </div>
                                <?php
                                echo '<div class="header">Adresse de livraison</div>';
//Adresse de livraison
                                ?> 

                                <div class = "table">
                                    <?php
                                    echo' 
         <center>                          
<table> 
                 
                         <tr>
                                <td><input  id="Adresse" type="text" value="';
                                    echo $InformationsCompte['Adresse'];
                                    echo'" required name="Adresse" placeholder="Adresse" style="margin-bottom: 10px"/></td>
                                       
                                <td><input  id="Numero" type="text" value="';
                                    echo $InformationsCompte['Numero'];
                                    echo'" required name="Numero" placeholder="Numéro" style="width: 70px;margin-left: 5px;margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><input  id="Npa" type="text" value="';
                                    echo $InformationsCompte['Npa'];
                                    echo'" required name="Npa" placeholder="Npa" style="margin-bottom: 10px"/></td>
                                        <td><input  id="Localite" type="text" value="';
                                    echo $InformationsCompte['Localite'];
                                    echo'" required name="Localite" placeholder="Localité" style="margin-left: 5px;margin-bottom: 10px"/></td>
                            </tr> 
                               <tr>
                                <td><input  id="Ville" type="text" value="';
                                    echo $InformationsCompte['Ville'];
                                    echo'" required name="Ville" placeholder="Ville" style="margin-bottom: 10px"/>
                                </td>
                                <td><input  id="Pays" type="text" value="';
                                    echo $InformationsCompte['Pays'];
                                    echo'" required name="Pays" placeholder="Pays" style="margin-left: 5px;margin-bottom: 10px"/>
                               </td>
                            </tr>                          
                           
                        </table>  
                        <button type="submit" class="btn btn-primary ">Suivant</button> 
                        </center> 
                        
                         '
                                    ?> 
                                </div>
                                <?php
                                ;
                            } else {
//Formulaire Connexion
                                ?> 
                                <div class="header">Connexion</div>
                                <form method="post" action="connexion.php" enctype="multipart/form-data">
                                    <div class="table">
                                        <?php
                                        echo' 
                        <center>
                        <table> 

			<div class = "row">     <input type="text"  value="" name="Pseudo"  required placeholder="Pseudo"></div>
                        <div class = "row">	<input type="password"  name="Mdp" required placeholder="Mot de passe" ></div><div class="label"></br> </div><a href="MdpOublier.php" style="margin-bottom: 10px">Mot de passe oublié?</a>
			<button type="submit" class="btn btn-primary">Connexion</button>
				  </form>					
				  <div class="Login-help">

					</br><b> Vous n\'avez pas de compte ? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b> <a href="#" class="btn btn-success"   data-toggle="modal"   data-dismiss="modal" data-target="#Inscription-modal">Inscription</a>

                                    </center>
                                    </table> ';
                                        ?> 
                                    </div>

                                    <?php
                                };
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