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
                                <td><input  id="Numero" type="text" value="';
                    if (isset($_POST['Numero'])) {
                        echo$_POST['Numero'];
                    } echo'" required name="Numero" placeholder="Numéro" style="margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><input  id="text" type="text" value="';
                    if (isset($_POST['Npa'])) {
                        echo$_POST['Npa'];
                    } echo'" required name="Npa" placeholder="Npa" style="margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><input  id="Localite" type="text" value="';
                    if (isset($_POST['Localite'])) {
                        echo$_POST['Localite'];
                    } echo'" required name="Localite" placeholder="Localité" style="margin-bottom: 10px"/></td>
                            </tr> 
                               <tr>
                                <td><input  id="text" type="text" value="';
                    if (isset($_POST['Ville'])) {
                        echo$_POST['Ville'];
                    } echo'" required name="Ville" placeholder="Ville" style="margin-bottom: 10px"/></td>
                            </tr> 
                            <tr>
                                <td><input  id="Pays" type="text" value="';
                    if (isset($_POST['Pays'])) {
                        echo$_POST['Pays'];
                    } echo'" required name="Pays" placeholder="Pays" style="margin-bottom: 10px"/></td>
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