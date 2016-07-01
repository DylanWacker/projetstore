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
        <section>
           <?php


$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('Ajout', 'Suppression', 'Refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $N = (isset($_POST['N'])? $_POST['N']:  (isset($_GET['l'])? $_GET['N']:null )) ;
   $P = (isset($_POST['p'])? $_POST['P']:  (isset($_GET['P'])? $_GET['P']:null )) ;
   $Q = (isset($_POST['Q'])? $_POST['Q']:  (isset($_GET['q'])? $_GET['Q']:null )) ;

   //Suppression des espaces verticaux
   $N = preg_replace('#\v#', '',$N);
   //On verifie que $p soit un float
   $P = floatval($P);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier
    
   if (is_array($Q)){
      $QteArticle = array();
      $i=0;
      foreach ($Q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $Q = intval($Q);
    
}

if (!$erreur){
   switch($action){
      Case "Ajout":
         AjouterArticle($N,$Q,$P);
         break;

      Case "suppression":
         SupprimerArticle($N);
         break;

      Case "Refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            ModifierQTeArticle($_SESSION['Panier']['NomProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}

echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre panier</title>
</head>
<body>

<form method="post" action="Panier.php">
<table style="width: 400px">
	<tr>
		<td colspan="4">Votre Panier</td>
	</tr>
	<tr>
		<td>Nom</td>
		<td>Quantité</td>
		<td>Prix Unitaire</td>
		<td>Action</td>
	</tr>


	<?php
	if (CreationPanier())
	{
	   $NbArticles=count($_SESSION['Panier']['NomProduit']);
	   if ($NbArticles <= 0)
	   echo "<tr><td>Votre panier est vide </ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $NbArticles ; $i++)
	      {
	         echo "<tr>";
	         echo "<td>".htmlspecialchars($_SESSION['Panier']['NomProduit'][$i])."</ td>";
	         echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['Panier']['QteProduit'][$i])."\"/></td>";
	         echo "<td>".htmlspecialchars($_SESSION['Panier']['PrixProduit'][$i])."</td>";
	         echo "<td><a href=\"".htmlspecialchars("Panier.php?action=suppression&l=".rawurlencode($_SESSION['Panier']['NomProduit'][$i]))."\">XX</a></td>";
	         echo "</tr>";
	      }

	      echo "<tr><td colspan=\"2\"> </td>";
	      echo "<td colspan=\"2\">";
	      echo "Total : ".MontantGlobal();
	      echo "</td></tr>";

	      echo "<tr><td colspan=\"4\">";
	      echo "<input type=\"submit\" value=\"Rafraichir\"/>";
	      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

	      echo "</td></tr>";
	   }
	}
	?>
</table>
</form>
</body>
</html>
        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>