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
            foreach (AfficherStore() as $Store) {
                       echo '<form enctype="multipart/form-data" action="#" method="post">'; 
                        echo  'id: '.$Store['IdStore'].'<br/>';
                        echo 'nom: '.$Store['Nom'].'<br/>';
                         echo 'prix: '.$Store['PrixStore'].'<br/>';
                          echo'poids: '. $Store['Poids'].'<br/>';
                          echo '<button type="submit" name="Store'.$Store['IdStore'].'"class="btn btn-primary btn-block">Acheter</button>';
                          echo '</form>';
                    }
                   // if AjouterArticle($NomProduit,$QteProduit,$PrixProduit){
                        
                        
                        if(isset($_POST['Store2']))
	{
		
			 AjouterArticle($Store['Nom'],1,$Store['PrixStore']);

                        
                        
                        
                    }
            ?> 
          

        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>