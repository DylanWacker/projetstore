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
					<input type="text" name="Pseudo" placeholder="Pseudo">
					<input type="password" name="Mdp" placeholder="Mot de passe">
					<input type="submit" name="Login" class="Login Loginmodal-submit" value="Connexion">
				  </form>
					
				  <div class="Login-help">
					<a href="#">Inscription</a> - <a href="#">Mot de passe oublier</a>
				  </div>
				</div>
			</div>
		  </div></li>';


    echo'<li> <a href="#" data-toggle="modal"  data-target="#Inscription-modal">Inscription</a>

<div class="modal fade" id="Inscription-modal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="Inscriptionmodal-container">
					<h1>Inscription</h1><br>
				    
                    <form enctype="multipart/form-data" action="inscriptionok.php" method="post">
                        <table> 
                            <tr>
                                <td>Pseudo*</td> 
                                <td><input id="pseudo" type="text" value="" maxlength="25" required name="Pseudo" placeholder="Pseudo"/></td>          
                            </tr>
                            <tr>
                                <td> Nom*</td>
                                <td><input id="nom" type="text" value="" required name="Nom" placeholder="Nom"/></td>  
                            </tr>
                            <tr>
                                <td>Prenom*</td>
                                <td> <input id="prenom" type="text" value="" required name="Prenom" placeholder="Prenom" /></td>
                            </tr>
                            <tr>
                                <td>Email*</td>
                                <td><input id="text" type="text" value="" required name="Email" placeholder="Email" /></td>
                            </tr> 
                            <tr> 
                                <td>Mot de passe*</td>
                                <td><input id="password" type="password" required value="" name="Mdp" placeholder="Mot de passe"/></td>
                            </tr> 
                            <tr>
                                <td>Retapez mot de passe*</td>
                                <td><input id="password2" type="password" required value="" name="Mdp2" placeholder="Retapez le mot de passe" /></td>
                            </tr> 
                             
                        </table> 


                        *Champs obligatoire<br/>
                        <input type="submit" value="Envoyer" /><input type="reset" value="Reset" />
                    </form>


                    
					
				  <div class="Inscription-help">
					<a href="#">Inscription</a> - <a href="#">Mot de passe oublier</a>
				  </div>
				</div>
			</div>
		  </div></li>';
};
?>