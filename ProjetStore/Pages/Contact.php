<?php
/*
  Page     : index.php
  Auteur   : Dylan's
  Fonction : Contact
 */
require '_header.php';
include 'Mysql.php';
include 'Fonction.php';
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
        <section><center>          
        <table>
         <tr>
            <td> Votre nom: </td>
            <td> <input  id="nom" type="text" value="" required name="Nom" placeholder="Nom" style="margin-bottom: 10px"/></td>
         </tr>
         <tr>
             <td> Votre email: </td>
             <td><input  id="email" type="text" value="" required name="Email" placeholder="Email" style="margin-bottom: 10px"/></td>
         </tr> 
         <tr>
             <td> Sujet: </td>
             <td><input  id="sujet" type="text" value="" required name="Sujet" placeholder="Sujet" style="margin-bottom: 10px"/></td>
         </tr> 
         <tr>    
                <td> Message: </td>
         </tr>
         <tr>
             <td><textarea rows="4" cols="50"  id="message" required name="Message" placeholder="Message" style="margin-bottom: 10px"></textarea></td>
         </tr>
        </table> 
        </section></center>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>