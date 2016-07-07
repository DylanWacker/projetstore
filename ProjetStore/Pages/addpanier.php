<?php
/*
  Page     : index.php
  Auteur   : Dylan's
  Fonction : Index
 */
include 'Mysql.php';
include 'Fonction.php';
session_start();
dbConnect();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'Head.php';
    ?>
    <body>  

        <!-- jQuery (Necessaire pour Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Ajoute les fichiers bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/MenuNavigation.js"></script>
        <nav>
            <?php
            include './MenuNavigation.php';
            ?> 
        </nav>
        <section><?php
$json = array('error' => true);
if(isset($_GET['IdStore'])){
	$product = AfficherStoreById($_GET['IdStore']);
	if(empty($product)){
		$json['message'] = "Ce produit n'existe pas";
	}else{
		$panier->add($product[0]['IdStore']);
		$json['error']  = false;
		$json['Total']  = $panier->total();
		$json['Count']  = $panier->count();
		$json['message'] = 'Le produit a bien été ajouté à votre panier';
	}
}else{
	$json['message'] = "Vous n'avez pas sélectionné de produit à ajouter au panier";
}
echo json_encode($json);
  ?>
        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>