<?php
//déclare les variables
if (isset($_SESSION['User']['IdClient'])) {
    $IdUtilisateur = $_SESSION['User']['IdClient'];
} else {
    $IdUtilisateur = 0;
};
if (isset($_SESSION['User']['Statut'])) {
    $Statut = $_SESSION['User']['Statut'];
} else {
    $Statut = "invité";
};
?>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">My Store</a>
        </div>

        <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Store <span class="caret"></span></a>				
                    <ul class="dropdown-menu mega-dropdown-menu">
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Men Collection</li>                            
                                <div id="menCollection" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href="#"><img src="http://placehold.it/254x150/ff3546/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                            <h4><small>Summer dress floral prints</small></h4>                                        
                                            <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
                                        </div><!-- End Item -->
                                        <div class="item">
                                            <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                            <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                            <button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>        
                                        </div><!-- End Item -->
                                        <div class="item">
                                            <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                            <h4><small>Denin jacket stamped</small></h4>                                        
                                            <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>      
                                        </div><!-- End Item -->                                
                                    </div><!-- End Carousel Inner -->
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#menCollection" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#menCollection" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Type de Store</li>
                                <?php
                                foreach (AfficherTypeStore() as $TypeStore) {
                                    echo '<li><a href="#">' . $TypeStore['NomType'] . '</a></li>';
                                }
                                ?>

                                <li class="divider"></li>

                                <li class="dropdown-header">Type de Commande</li>
                                <?php
                                foreach (AfficherTypeCommande() as $TypeCommande) {
                                    echo '<li><a href="#">' . $TypeCommande['Commande'] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Plus</li>
                                <li><a href="#">Navbar Inverse</a></li>
                                <li><a href="#">Pull Right Elements</a></li>
                                <li><a href="#">Coloured Headers</a></li>                            
                                <li><a href="#">Primary Buttons & Default</a></li>							
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Much more</li>
                                <li><a href="#">Easy to Customize</a></li>
                                <li><a href="#">Calls to action</a></li>
                                <li><a href="#">Custom Fonts</a></li>
                                <li><a href="#">Slide down on Hover</a></li>                         
                            </ul>
                        </li>
                    </ul>				
                </li>             
                <li><a href="contact.php"><i class="glyphicon glyphicon-envelope"></i>&nbsp;Contact</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;Á Propos</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Conditions générales d'achats</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <?php
                    include 'FormulaireCompte.php';
                    ?>

                </li>
                <li><a href="Panier.php"><img src="../Images/Icone/caddie.png" width="21px" >(<span id="count"><?php echo $panier->count(); ?></span>) Produits <span id="total"><?php echo number_format($panier->total(), 2, ',', ' ') . '.-'; ?> </span></a></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </nav>
</div>