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
					Vous n\'avez pas de compte ? <a href="#" class="btn btn-success btn-lg disabled" role="button" data-target="#Inscription-modal">Inscription</a>
				  </div>
				</div>
			</div>
		  </div></li>';

//Formulaire Inscription
    echo'<li> <a href="#" data-toggle="modal"  data-target="#Inscription-modal">Inscription</a>

<div class="modal fade" id="Inscription-modal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="Inscriptionmodal-container">
					<h1>Inscription</h1><br>
				    
                    <form enctype="multipart/form-data" action="inscription.php" method="post">
                        <table> 
                            <tr>
                                <td>Pseudo</td> 
                                <td><input id="pseudo" type="text" value="" maxlength="25" required name="Pseudo" placeholder="Pseudo"/></td>          
                            </tr>
                            <tr>
                                <td> Nom</td>
                                <td><input id="nom" type="text" value="" required name="Nom" placeholder="Nom"/></td>  
                            </tr>
                            <tr>
                                <td>Prenom</td>
                                <td> <input id="prenom" type="text" value="" required name="Prenom" placeholder="Prenom" /></td>
                            </tr>
                            <tr>
                                <td>Adresse</td>
                                <td><input id="text" type="text" value="" required name="Adresse" placeholder="Adresse" /></td>
                            </tr> 
                            <tr>
                                <td>Npa</td>
                                <td><input id="text" type="text" value="" required name="Npa" placeholder="Npa" /></td>
                            </tr> 
                               <tr>
                                <td>Ville</td>
                                <td><input id="text" type="text" value="" required name="Ville" placeholder="Ville" /></td>
                            </tr> 
                                                        <tr>
                                <td>Email</td>
                                <td><input id="text" type="text" value="" required name="Email" placeholder="Email" /></td>
                            </tr> 
                                                        <tr>
                                <td>Téléphone</td>
                                <td><input id="text" type="text" value="" required name="Telephone" placeholder="Telephone" /></td>
                            </tr> 
                            <tr> 
                                <td>Mot de passe</td>
                                <td><input id="password" type="password" required value="" name="Mdp" placeholder="Mot de passe"/></td>
                            </tr> 
                            <tr>
                                <td>Retapez le mot de passe</td>
                                <td><input id="password2" type="password" required value="" name="Mdp2" placeholder="Retapez le mot de passe" /></td>
                            </tr> 
                             
                        </table> 


                       
                       <button type="submit" class="btn btn-primary btn-block">Envoyer</button><button type="reset" class="btn btn-warning btn-block">Reset</button>
                    </form>


                    
					
				  <div class="Inscription-help">
					<a href="#">Inscription</a> - <a href="#">Mot de passe oublier</a>
				  </div>
				</div>
			</div>
		  </div></li>';
};
?>