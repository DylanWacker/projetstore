<?php

/* si le membre est connecte */
if (VerifierConnection()) {
    echo '<li><a href="Membres.php"><span>' . $_SESSION['User']['Pseudo'] . '</span></a></li> ';
    echo'<li><a href="Deconnexion.php"><span>Déconnexion</span></a></li>';
} else {

    //Formulaire de Login
    echo'<li> <a href="#" data-toggle="modal"  data-target="#Login-modal">Connexion</a>

<div class="modal fade" id="Login-modal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="Loginmodal-container">
					<h1>Connexion</h1><br>
				    <form method="post" action="connexion.php" enctype="multipart/form-data">
					<input type="text" name="Pseudo" placeholder="Pseudo" style="margin-bottom: 10px">
					<input type="password" name="Mdp" placeholder="Mot de passe" style="margin-bottom: 10px">
                                        <a href="#" style="margin-bottom: 10px">Mot de passe oublié?</a>
					<button type="submit" class="btn btn-primary btn-block">Connexion</button>
				  </form>					
				  <div class="Login-help">

					</br><b> Vous n\'avez pas de compte ? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b> <a href="#" class="btn btn-success"   data-toggle="modal"   data-dismiss="modal" data-target="#Inscription-modal">Inscription</a>

				  </div>
				</div>
			</div>
		  </div></li>';

//Formulaire Inscription
    echo'<li> <a href="#" data-toggle="modal" data-target="#Inscription-modal">Inscription</a>

<div class="modal fade" id="Inscription-modal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="Inscriptionmodal-container">
					<h1>Inscription</h1><br>
				    
                    <form enctype="multipart/form-data" action="inscription.php" method="post">
                        <table> 
                            <tr>
                                <td><b>Pseudo</b></td> 
                                <td><input id="pseudo" type="text" value="" maxlength="25" required name="Pseudo" placeholder="Pseudo" style="margin-bottom: 10px"/></td>          
                            </tr >
                            <tr>
                                <td><b>Nom</b></td>
                                <td><input id="nom" type="text" value="" required name="Nom" placeholder="Nom" style="margin-bottom: 10px"/></td>  
                            </tr>
                            <tr>
                                <td><b>Prenom</b></td>
                                <td> <input id="prenom" type="text" value="" required name="Prenom" placeholder="Prenom" style="margin-bottom: 10px"/></td>
                            </tr>
                            <tr>
                                <td><b>Adresse</b></td>
                                <td><input id="text" type="text" value="" required name="Adresse" placeholder="Adresse" style="margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><b>Npa</b></td>
                                <td><input id="text" type="text" value="" required name="Npa" placeholder="Npa" style="margin-bottom: 10px"/></td>
                            </tr> 
                               <tr>
                                <td><b>Ville</b></td>
                                <td><input id="text" type="text" value="" required name="Ville" placeholder="Ville" style="margin-bottom: 10px"/></td>
                            </tr> 
                                                        <tr>
                                <td><b>Email</b></td>
                                <td><input id="text" type="text" value="" required name="Email" placeholder="Email" style="margin-bottom: 10px"/></td>
                            </tr> 
                                                        <tr>
                                <td><b>Téléphone</b></td>
                                <td><input id="text" type="text" value="" required name="Telephone" placeholder="Telephone" style="margin-bottom: 10px"/></td>
                            </tr> 
                            <tr> 
                                <td><b>Mot de passe</b></td>
                                <td><input id="password" type="password" required value="" name="Mdp" placeholder="Mot de passe" style="margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><b>Retapez le mot de passe</b></td>
                                <td><input id="password2" type="password" required value="" name="Mdp2" placeholder="Retapez le mot de passe" style="margin-bottom: 10px"/></td>
                            </tr> 
                             
                        </table> 


                       
                       <button type="submit" class="btn btn-primary btn-block">S\'inscrire</button><button type="reset" class="btn btn-warning btn-block">Réinitialiser</button>
                    </form>


                    
					
				  <div class="Inscription-help">
					</br><b>Vous avez un compte ? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><a href="#" class="btn btn-success"   data-toggle="modal"   data-dismiss="modal" data-target="#Login-modal">Connexion</a>
				  </div>
				</div>
			</div>
		  </div></li>';
};
?>