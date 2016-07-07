<?php

//Formulaire Produit
echo'<a href="#" data-toggle="modal" data-target="#Produit-modal"><img src="../Images/Icone/plus.png"></a>       
<div class="modal fade" id="Produit-modal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="Produitmodal-container">
					<h1>NOM DE PRODUIT</h1><br>
				    
                    <form enctype="multipart/form-data" action="Panier.php" method="post">
                        <table>

                             
                        </table> 


                       
                       <button type="submit" class="btn btn-primary btn-block">Ajouter au panier</button>
                    </form>

				</div>
			</div>
		  </div>';
?>