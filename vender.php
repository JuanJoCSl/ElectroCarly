<?php
if (!empty($_GET['id'])) {
    // Conexión a la base de datos
    #$conn = new mysqli("localhost", "root", "", "electrocarly");
    
    $conn = new mysqli("bxazrgknaogpic9zs3xf-mysql.services.clever-cloud.com","u0lwdmkdqqdc0yrr","yIwJXBNh8OFceY7Fwg90","bxazrgknaogpic9zs3xf");


    // Verificación de la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ID del producto desde la URL
    $product_id = $_GET['id'];
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/shortcut-icon.ico" />
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
        <?php

    // Consulta SQL para obtener los detalles del producto
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    // Verificar si se encontró el producto
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
?>
        <!-- Presentación del producto -->
        <div class="container">
            <h2 class="tittles-pages text-center">
                <?php echo $product['product_name']; ?>
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo $product['product_image_path']; ?>"
                        alt="<?php echo $product['product_name']; ?>" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h3>
                        <?php echo $product['product_brand']; ?> -
                        <?php echo $product['product_model']; ?>
                    </h3>
                    <p><strong>Código de producto:</strong>
                        <?php echo $product['product_code']; ?>
                    </p>
                    <p><strong>Sistema operativo:</strong>
                        <?php echo $product['product_os']; ?>
                    </p>
                    <p><strong>Precio:</strong> $
                        <?php echo $product['product_price']; ?>
                    </p>
                    <p><strong>Categoría:</strong>
                        <?php echo $product['product_category']; ?>
                    </p>
                    <p><strong>Proveedor:</strong>
                        <?php echo $product['product_provider']; ?>
                    </p> <br>
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#registrarcompra">
                        <i class="fa fa-shopping-cart"></i> Comprar</button>
                    </button>

                    <div class="modal fade" id="registrarcompra" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="admin/controlador/controllerP.php" method="post">
                                    <div class="modal-header text-center">
                                        <h3 class="modal-title font-weight-bold" id="exampleModalLongTitle">Registrar
                                            Compra</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="product_id" value="<?=$product_id;?>">
                                        <div class="mb-3">
                                            <label for="nombres_comprador" class="form-label">Nombres del
                                                Comprador</label>
                                            <input type="text" class="form-control" id="nombres_comprador"
                                                name="nombres_comprador" required
                                                placeholder="Ingrese los nombres completos">
                                        </div>

                                        <div class="mb-3">
                                            <label for="apellidos_comprador" class="form-label">Apellidos del
                                                Comprador</label>
                                            <input type="text" class="form-control" id="apellidos_comprador"
                                                name="apellidos_comprador" required
                                                placeholder="Ingrese los apellidos completos">
                                        </div>

                                        <div class="mb-3">
                                            <label for="num_tarjeta" class="form-label">Número de Tarjeta</label>
                                            <input type="text" class="form-control" id="num_tarjeta" name="num_tarjeta"
                                                required placeholder="Ingrese el número de tarjeta">
                                        </div>

                                        <div class="mb-3">
                                            <label for="ci_comprador" class="form-label">Cédula de Identidad</label>
                                            <input type="text" class="form-control" id="ci_comprador"
                                                name="ci_comprador" required
                                                placeholder="Ingrese la cédula de identidad">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="venta_pro" class="btn btn-success">Registrar
                                            Compra</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-danger' role='alert'><center>Producto no encontrado.</center></div>";
    }

?>
        <footer class="footer">
            <div class="container-fluid">
                <div class="col-xs-12 text-center">
                    <h3>Síguenos en</h3>
                    <ul class="list-unstyled list-social-icons">
                        <li><a href="#!"><i class="fa fa-facebook" style="background-color: #3B5998;"></i></a></li>
                        <li><a href="#!"><i class="fa fa-google-plus" style="background-color: #DD4B39;"></i></a></li>
                        <li><a href="#!"><i class="fa fa-twitter" style="background-color: #56A3D9;"></i></a></li>
                        <li><a href="#!"><i class="fa fa-youtube" style="background-color: #BF221F;"></i></a></li>
                    </ul>
                    <h4>ElectroCarly &copy; 2024</h4>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
<?php
    // Cerrar la conexión
    $conn->close();
} else {
    header("location:index.php");
}
?>