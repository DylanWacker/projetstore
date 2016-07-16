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
                        <div class="header">Informations de comptes</div>
                        <form method="post" action="AchatPaiments.php">   
                            <?php
                            /* si le membre est connecte */
                            if (VerifierConnection()) {



//Informations compte
                                ?> 
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
                                    echo'" required name="Adresse" placeholder="Adresse" style="margin-top: 10px;margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><input  id="Npa" type="text" value="';
                                    echo $InformationsCompte['Npa'];
                                    echo'" required name="Npa" placeholder="Npa" style="margin-bottom: 10px"/></td>
                            </tr> 
                               <tr>
                                <td><input  id="Ville" type="text" value="';
                                    echo $InformationsCompte['Ville'];
                                    echo'" required name="Ville" placeholder="Ville" style="margin-bottom: 10px"/></td>
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
//Formulaire Inscription
                                ?> 
                                <div class="table">
                                    <?php
                                    echo' 
                        <center>
                        <table> 
                            <tr>
                                <td><input id="pseudo" type="text" value="" maxlength="25" required name="Pseudo" style="margin-top: 10px;margin-bottom: 10px" placeholder="Pseudo"/></td>          
                            </tr >
                            <tr>
                                <td><input  id="nom" type="text" value="" required name="Nom" placeholder="Nom" style="margin-bottom: 10px" /></td>  
                            </tr>
                            <tr>
                                <td> <input  id="prenom" type="text" value="" required name="Prenom" placeholder="Prenom" style="margin-bottom: 10px"/></td>
                            </tr>
                            <tr>
                                <td><input id="Email" type="text"   value="" style="margin-bottom: 10px" required name="Email" placeholder="Email"/></td>
                            </tr>
                                                        <tr>
                                <td><input  id="Telephone" type="text" value="" required name="Telephone" placeholder="Telephone" style="margin-bottom: 10px"/></td>
                            </tr> 

                        </center>     
                        </table> ';
                                    ?> 
                                </div>
                                <?php
                                echo '<div class="header">Adresse de livraison</div>';
                                ?> 
                                <div class = "table">
                                    <?php
                                    echo' <center>
                        <table> 
                        
                        <tr>
                                <td><input  id="Adresse" type="text" value="" required name="Adresse" placeholder="Adresse" style="margin-top: 10px;margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><input  id="Npa" type="text" value="" required name="Npa" placeholder="Npa" style="margin-bottom: 10px"/></td>
                            </tr> 
                               <tr>
                                <td><input  id="Ville" type="text" value="" required name="Ville" placeholder="Ville" style="margin-bottom: 10px"/></td>
                            </tr> 
             
                        </table> 
                         <button type="submit" class="btn btn-primary ">Suivant</button>
                          </center>  
                      
                    </form>';
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