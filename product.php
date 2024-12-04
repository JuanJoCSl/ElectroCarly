<?php
require_once "admin/controlador/controllerP.php"; // Incluye el archivo de lógica

// Obtiene todos los productos
$products = getProducts($con);
$productstel = getProductstel($con);
$productstbs = getProductstbs($con);
$productsan = getProductsan($con);
$productsios = getProductsios($con);
$productslnx = getProductslnx($con);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Productos</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/shortcut-icon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/modernizr.js"></script>
	<script src="js/main.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="page-container">
		<nav class="full-reset nav-phonestore">
           <div class="logo tittles-pages">
			ElectroCarly 
           </div>
            <ul class="list-unstyled full-reset navigation-list">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="product.php">Productos</a></li>
                <li><a href="news.php">Noticias</a></li>
                <li><a href="services.php">Servicios</a></li>
                <li><a href="contact.php">Contactenos</a></li>
                <li><a href="admin/">®</a></li>
            </ul>
            <i class="fa fa-bars visible-xs btn-mobile"></i>
    	</nav>
	    <div class="content-page">
		    <div class="hidden-xs content-carousel">
		    	<div id="carousel-phonestore" class="carousel slide" data-ride="carousel" style="margin-top:0;">
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-phonestore" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-phonestore" data-slide-to="1"></li>
				    <li data-target="#carousel-phonestore" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="item active">
				      <img src="assets/img/slide 1.jpg" alt="">
				      <div class="carousel-caption">
				        <h2>Windows Phone</h2>
				      </div>
				    </div>
				    <div class="item">
				      <img src="assets/img/slide 2.jpg" alt="">
				      <div class="carousel-caption">
				        <h2>iPhone 5</h2>
				      </div>
				    </div>
				    <div class="item">
				      <img src="assets/img/slide 3.jpg" alt="">
				      <div class="carousel-caption">
				        <h2>Sony Xperia Z</h2>
				      </div>
				    </div>
				  </div>
				  <a class="left carousel-control" href="#carousel-phonestore" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-phonestore" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				  </a>
				</div>
		    </div>
		    <div class="visible-xs static-image-carousel">
		    	<img src="assets/img/image-carousel.jpg"  alt="" class="img-responsive">
		    </div>
		    <section id="prod-container section">
		    	<div class="container-fluid">
		    		<div class="row">
		    			<div class="col-xs-12 text-center">
		    				<p class="tittles-pages">Tablets y Teléfonos</p>
		    			</div>
		    			<div class="col-xs-12">
		    				<div class="container">
			    				<ul class="nav nav-tabs" role="tablist" id="TabProducts">
								  <li class="active"><a href="#all-categories" role="tab" data-toggle="tab"><i class="fa fa-th"></i>&nbsp; Todo</a></li>
								  <li><a href="#smartphones" role="tab" data-toggle="tab"><i class="fa fa-mobile"></i>&nbsp; SmartPhones</a></li>
								  <li><a href="#tablets" role="tab" data-toggle="tab"><i class="fa fa-tablet"></i>&nbsp; Tablets</a></li>
								  <li>
							        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-hdd-o"></i>&nbsp; Buscar OS <span class="caret"></span></a>
							        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
							          <li><a href="#android" tabindex="-1" role="tab" data-toggle="tab"><i class="fa fa-android"></i>&nbsp; Android</a></li>
							          <li><a href="#iOS" tabindex="-1" role="tab" data-toggle="tab"><i class="fa fa-apple"></i>&nbsp; iOS</a></li>
							          <li><a href="#windowsPhone" tabindex="-1" role="tab" data-toggle="tab"><i class="fa fa-windows"></i>&nbsp; Linux Phone</a></li>
							        </ul>
							      </li>
								</ul>
								<div class="tab-content">
								  <!-- ===================================== Todas las categorias ============================================= -->
								  <div class="tab-pane active" id="all-categories">
								  	<p class="tittles-pages">Todos los productos</p>
								  	<div class="row">
									  	<?php foreach ($products as $product): ?>
								  		<div class="col-xs-12 col-sm-6 col-md-3">
								  			<div class="thumbnail thumbnail-content-phones">
										      <img src="<?= $product['product_image_path'] ?>" alt="prod-icon" class="img-responsive">
										      <div class="caption">
										        <h3 class=" text-center"><?= $product['product_name'] ?></h3>
										        <p class="text-justify">
										        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ratione ad consectetur facere, alias deserunt consequatur.
										        </p>
										        <p class="text-center"><a href="vender.php?id=<?= $product['id'] ?>" class="btn btn-danger" role="button">Ver más</a></p>
										      </div>
										    </div>
								  		</div>
										<?php endforeach; ?>
								  	</div>
								  </div>
								  <!-- ===================================== SmartPhones ============================================= -->
								  <div class="tab-pane" id="smartphones">
								  	<p class="tittles-pages">SmartPhones</p>
								  	<div class="row">
									  <?php foreach ($productstel as $product): ?>
								  		<div class="col-xs-12 col-sm-6 col-md-3">
								  			<div class="thumbnail thumbnail-content-phones">
										      <img src="<?= $product['product_image_path'] ?>" alt="prod-icon" class="img-responsive">
										      <div class="caption">
										        <h3 class=" text-center"><?= $product['product_name'] ?></h3>
										        <p class="text-justify">
										        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ratione ad consectetur facere, alias deserunt consequatur.
										        </p>
										        <p class="text-center"><a href="#" class="btn btn-danger" role="button">Ver más</a></p>
										      </div>
										    </div>
								  		</div>
										<?php endforeach; ?>
								  	</div>
								  </div>
								  <!-- ===================================== Tablets ============================================= -->
								  <div class="tab-pane" id="tablets">
								  	<p class="tittles-pages">Tablets</p>
								  	<div class="row">
									  	<?php foreach ($productstbs as $product): ?>
								  		<div class="col-xs-12 col-sm-6 col-md-3">
								  			<div class="thumbnail thumbnail-content-phones">
										      <img src="<?= $product['product_image_path'] ?>" alt="prod-icon" class="img-responsive">
										      <div class="caption">
										        <h3 class=" text-center"><?= $product['product_name'] ?></h3>
										        <p class="text-justify">
										        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ratione ad consectetur facere, alias deserunt consequatur.
										        </p>
										        <p class="text-center"><a href="#" class="btn btn-danger" role="button">Ver más</a></p>
										      </div>
										    </div>
								  		</div>
										<?php endforeach; ?>
								  	</div>
								  </div>
								  <!-- ===================================== Android ============================================= -->
								  <div class="tab-pane" id="android">
								  	<p class="tittles-pages">Android</p>
								  	<div class="row">
									  	<?php foreach ($productsan as $product): ?>
								  		<div class="col-xs-12 col-sm-6 col-md-3">
								  			<div class="thumbnail thumbnail-content-phones">
										      <img src="<?= $product['product_image_path'] ?>" alt="prod-icon" class="img-responsive">
										      <div class="caption">
										        <h3 class=" text-center"><?= $product['product_name'] ?></h3>
										        <p class="text-justify">
										        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ratione ad consectetur facere, alias deserunt consequatur.
										        </p>
										        <p class="text-center"><a href="#" class="btn btn-danger" role="button">Ver más</a></p>
										      </div>
										    </div>
								  		</div>
										<?php endforeach; ?>
								  	</div>
								  </div>
								  <!-- ===================================== iOS ============================================= -->
								  <div class="tab-pane" id="iOS">
								  	<h2 class="tittles-pages">iOS</h2>
								  	<div class="row">
									  	<?php foreach ($productsios as $product): ?>
								  		<div class="col-xs-12 col-sm-6 col-md-3">
								  			<div class="thumbnail thumbnail-content-phones">
										      <img src="<?= $product['product_image_path'] ?>" alt="prod-icon" class="img-responsive">
										      <div class="caption">
										        <h3 class=" text-center"><?= $product['product_name'] ?></h3>
										        <p class="text-justify">
										        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ratione ad consectetur facere, alias deserunt consequatur.
										        </p>
										        <p class="text-center"><a href="#" class="btn btn-danger" role="button">Ver más</a></p>
										      </div>
										    </div>
								  		</div>
										<?php endforeach; ?>
								  	</div>
								  </div>
								  <!-- ===================================== Windows Phone ============================================= -->
								  <div class="tab-pane" id="windowsPhone">
								  	<p class="tittles-pages">Linux Phone</p>
								  	<div class="row">
									  	<?php foreach ($productslnx as $product): ?>
								  		<div class="col-xs-12 col-sm-6 col-md-3">
								  			<div class="thumbnail thumbnail-content-phones">
										      <img src="<?= $product['product_image_path'] ?>" alt="prod-icon" class="img-responsive">
										      <div class="caption">
										        <h3 class=" text-center"><?= $product['product_name'] ?></h3>
										        <p class="text-justify">
										        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ratione ad consectetur facere, alias deserunt consequatur.
										        </p>
										        <p class="text-center"><a href="vender.php?id=<?= $product['id'] ?>" class="btn btn-danger" role="button">Ver más</a></p>
										      </div>
										    </div>
								  		</div>
										<?php endforeach; ?>
								  	</div>
								  </div>
								</div>
		    				</div>
		    			</div>	
		    		</div>
		    	</div>
		    </section>
	    </div>
		<footer class="footer">
    		<div class="container-fluid">
    			<div class="col-xs-12 text-center">
    				<h3>Siguenos en</h3>
    				<ul class="list-unstyled list-social-icons">
    					<li >
    						<a href="#!">
                               <i class="fa fa-facebook" style="background-color: #3B5998;"></i> 
                            </a>
    					</li>
    					<li>
    						<a href="#!">
                                <i class="fa fa-google-plus" style="background-color: #DD4B39;"></i>
                            </a>
    					</li>
    					<li>
    						<a href="#!">
                                <i class="fa fa-twitter"  style="background-color: #56A3D9;"></i>
                            </a>
    					</li>
    					<li>
    						<a href="#!">
                                <i class="fa fa-youtube" style="background-color: #BF221F;"></i>
                            </a>
    					</li>
    				</ul>
    				<h4>ElectroCarly &copy; 2024</h4>
    			</div>
    		</div>
    	</footer>
	</div>
	<script>
	  $(function () {
	    $('#TabProducts a:first').tab('show')
	  });
	  $('#TabProducts a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});
	</script>
</body>
</html>