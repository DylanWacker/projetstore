
                <?php
                /* si le membre est connecte */
                    //Formulaire de Login
                    echo'<center> <form method="post" action="connexion.php" enctype="multipart/form-data">
                        <div class="table">
				<div class = "row">	<input type="text" onclick="changerCouleur(this)" value="';
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
                    echo'></div>
                        <div class = "row">	<input type="password" onclick="changerCouleur(this)" name="Mdp" required placeholder="Mot de passe" ';
                    if ($ConnexionError == 'Identifiants') {
                        echo 'style="border-color: red;margin-bottom: 10px;"';
                    } else {
                        echo 'style="margin-bottom: 10px;"';
                    }
                    echo'></div><div class="label">';
                    echo $ConnexionLab;
                                        echo'</br> </div><a href="MdpOublier.php" style="margin-bottom: 10px">Mot de passe oublié?</a>
					<button type="submit" class="btn btn-primary">Connexion</button>
				  </form>					
				  <div class="Login-help">

					</br><b> Vous n\'avez pas de compte ? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b> <a href="#" class="btn btn-success"   data-toggle="modal"   data-dismiss="modal" data-target="#Inscription-modal">Inscription</a>

				  </div>
				</div>
			</div></center>';

                ?>