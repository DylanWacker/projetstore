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
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBvlORGzvfH1pgUmNqtK-983y9P-xoDvKs'></script><div style='overflow:hidden;height:382px;width:489px;'><div id='gmap_canvas' style='height:382px;width:489px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://hauckautoren.ch/'>Hauckautoren.ch</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=a0f0a99b67fa6f60b7ee284ab9ec355c20893ec3'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(46.2174652,6.078407900000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(46.2174652,6.078407900000002)});infowindow = new google.maps.InfoWindow({content:'<strong>Magasin</strong><br>Chemin Delay 3<br>1214  Vernier<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,ma<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBvlORGzvfH1pgUmNqtK-983y9P-xoDvKs'></script><div style='overflow:hidden;height:382px;width:489px;'><div id='gmap_canvas' style='height:382px;width:489px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://hauckautoren.ch/'>Hauckautoren.ch</a> <script type='text/javascript' src='https://rker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>



        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>

