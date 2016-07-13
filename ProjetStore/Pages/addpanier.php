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
$json = array('error' => true);
if(isset($_GET['IdStore'])){
	$product = $DB->query('SELECT IdStore FROM store WHERE IdStore=:IdStore', array('IdStore' => $_GET['IdStore']));
	if(empty($product)){
		$json['message'] = "Ce produit n'existe pas";
	}else{
		$panier->add($product[0]->IdStore);
		$json['error']  = false;
		$json['total']  = number_format($panier->total(),2,',',' ');
		$json['count']  = $panier->count();
		$json['message'] = 'Le produit a bien été ajouté à votre panier';
	}
}else{
	$json['message'] = "Vous n'avez pas sélectionné de produit à ajouter au panier";
}
echo json_encode($json);
  ?>
