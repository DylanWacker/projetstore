<?php
$Store = AfficherStoreByID($Produit['IdStore']);
//Formulaire Produit
echo'<a href="#" data-toggle="modal" data-target="#Produit-modal"><img src="../Images/Icone/plus.png"></a>       
<div class="modal fade" id="Produit-modal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="Produitmodal-container">
					<h1>';echo $Store['IdStore'];echo'</h1><br>
				    
                    <form enctype="multipart/form-data" action="Panier.php" method="post">
                        <table>
                        
                          
               


                            <a href="#">
                                <img src="../Images/Store/Store'; echo $Store['IdStore']; echo'.jpg" width="200px" height="200px">
                            </a><br>';

                            echo $Store['NomStore'];
                            echo'<a href="#">'; echo $Store['PrixStore']; echo'.-</a><br>';                         
                       echo'</table> 


                       
                       <button type="submit" class="btn btn-primary btn-block">Ajouter au panier</button>
                    </form>

				</div>
			</div>
		  </div>';
?>