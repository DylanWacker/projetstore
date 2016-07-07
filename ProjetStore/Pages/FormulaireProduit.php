<?php

$Store = AfficherStoreByID($IdStore);
$TypeCommande = AfficherTypeCommandeById($IdStore);
$TypeStore = AfficherTypeStoreById($IdStore);
$CouleurStore = AfficherCouleurStoreById($IdStore);


//Formulaire Produit
echo'<a href="#';
echo $Store['IdStore'];
echo'" data-toggle="modal" data-target="#Produit-modal"><img src="../Images/Icone/plus.png"></a>       
<div class="modal fade" id="Produit-modal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
<div class="Produitmodal-container">
<h1>';
echo $Store['NomStore'];
echo'</h1><br>
<form enctype="multipart/form-data" action="Panier.php" method="post">
<table>
<a href="#">
<img src="../Images/Store/Store';
echo $Store['IdStore'];
echo'.jpg" width="200px" height="200px"></a><br>';
echo 'Prix: ' . $Store['PrixStore'] . '<br>';
echo 'Poids: ' . $Store['PoidStore'] . '<br>';

//Liste Commande
echo 'Commande: <FORM><select name="Commandes" >';
foreach ($TypeCommande as $Commande) {
    echo'<option value="' . $Commande['IdTypeCommande'] . '">' . $Commande['Commande'];
    echo'</option>';
};
echo'</SELECT></FORM><br>';

//Liste Type
echo 'Type de Store: <FORM><select name="Type" >';
foreach ($TypeStore as $Type) {
    echo'<option value="' . $Type['IdType'] . '">' . $Type['NomType'];
    echo'</option>';
};
echo'</SELECT></FORM><br>'
;
//Liste couleurs
echo 'Couleur: <FORM><select name="couleurs" >';
foreach ($CouleurStore as $Couleur) {
    echo'<option value="' . $Couleur['IdCouleur'] . '">' . $Couleur['NomCouleur'];
    echo'</option>';
};
echo'</SELECT></FORM></table>';
echo'<button type="submit" class="btn btn-primary btn-block">Ajouter au panier</button>
</form>
</div>
</div>
</div>';
?>