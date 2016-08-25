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
//print_r($_POST);
$json = array('error' => true);
if(isset($_POST['idStore'])){
	$product = $DB->query('SELECT IdStore FROM store WHERE IdStore=:IdStore', array('IdStore' => $_POST['idStore']));
	if(empty($product)){
		$json['message'] = "Ce produit n'existe pas";
	}else{
            if(isset($_SESSION['panier'][$_POST['idStore']][$_POST['taille']][$_POST['couleur']][$_POST['commande']])){
                $_SESSION['panier'][$_POST['idStore']][$_POST['taille']][$_POST['couleur']][$_POST['commande']] += $_POST['quantite'];
            }else{
                $_SESSION['panier'][$_POST['idStore']][$_POST['taille']][$_POST['couleur']][$_POST['commande']] = $_POST['quantite'];
            }
                    
	
                    
                 $json = $_SESSION['panier']; 
		$json['message'] = 'Le produit a bien été ajouté à votre panier';
	}
}else{
	$json['message'] = "Vous n'avez pas sélectionné de produit à ajouter au panier";
}
echo json_encode($json);
  ?>
