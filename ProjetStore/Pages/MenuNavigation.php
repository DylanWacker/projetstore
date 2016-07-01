<?php
//déclare les variables
if (isset($_SESSION['User']['IdUser'])) {
    $IdUtilisateur = $_SESSION['User']['IdUser'];
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
            <a class="navbar-brand" href="#">My Store</a>
        </div>

        <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <span class="caret"></span></a>				
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
                                <li class="dropdown-header">Features</li>
                                <li><a href="#">Auto Carousel</a></li>
                                <li><a href="#">Carousel Control</a></li>
                                <li><a href="#">Left & Right Navigation</a></li>
                                <li><a href="#">Four Columns Grid</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Fonts</li>
                                <li><a href="#">Glyphicon</a></li>
                                <li><a href="#">Google Fonts</a></li>
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
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Women <span class="caret"></span></a>				
                    <ul class="dropdown-menu mega-dropdown-menu">
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Features</li>
                                <li><a href="#">Auto Carousel</a></li>
                                <li><a href="#">Carousel Control</a></li>
                                <li><a href="#">Left & Right Navigation</a></li>
                                <li><a href="#">Four Columns Grid</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Fonts</li>
                                <li><a href="#">Glyphicon</a></li>
                                <li><a href="#">Google Fonts</a></li>
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
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Women Collection</li>                            
                                <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                            <h4><small>Summer dress floral prints</small></h4>                                        
                                            <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
                                        </div><!-- End Item -->
                                        <div class="item">
                                            <a href="#"><img src="http://placehold.it/254x150/ff3546/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
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
                                    <a class="left carousel-control" href="#womenCollection" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#womenCollection" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                            </ul>
                        </li>
                    </ul>				
                </li>
                <li><a href="#">Store locator</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                        <?php
                        /* si le membre est connecte */
                        if (VerifierConnection()) {
                            echo '<li><a href="Membres.php"><span>' . $_SESSION['User']['Pseudo'] . '</span></a></li> ';
                            echo'<li><a href="Deconnexion.php"><span>Déconnexion</span></a></li>';
                        } else {
                            echo'<li> <a href="#" data-toggle="modal" data-target="#login-modal">Connexion</a>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Connexion</h1><br>
				  <form>
					<input type="text" name="user" placeholder="Pseudo">
					<input type="password" name="pass" placeholder="Mot de passe">
					<input type="submit" name="login" class="login loginmodal-submit" value="Connexion">
				  </form>
					
				  <div class="login-help">
					<a href="#">Inscription</a> - <a href="#">Mot de passe oublier</a>
				  </div>
				</div>
			</div>
		  </div></li>';
                            
                                        
                            echo'<li><a href="Inscription.php"><span>Inscription</span></a></li>';
                        };
                        ?>

                </li>
                <li><a href="#">My cart (0) items</a></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </nav>
</div>