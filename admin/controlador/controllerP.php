<?php
#$con = new mysqli("localhost","root","","electrocarly");
$con = new mysqli("bxazrgknaogpic9zs3xf-mysql.services.clever-cloud.com","u0lwdmkdqqdc0yrr","yIwJXBNh8OFceY7Fwg90","bxazrgknaogpic9zs3xf");
$con->set_charset("utf8");
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}
// Función para agregar un producto
if (isset($_POST['add_product'])) {
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];
    $product_os = $_POST['product_os'];
    $product_model = $_POST['product_model'];
    $product_price = $_POST['product_price'];
    $product_provider = $_POST['product_provider'];
    $product_category = $_POST['product_category'];
    if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] == UPLOAD_ERR_OK) {
        $image_dir = "../../img/"; // Carpeta donde se guardarán las imágenes
        $image_name = basename($_FILES['product_img']['name']); // Nombre del archivo
        $image_path = $image_dir . $image_name; // Ruta completa

        // Mueve el archivo a la carpeta de destino
        if (move_uploaded_file($_FILES['product_img']['tmp_name'], $image_path)) {
            $image_path = "img/". $image_name;
            $image_path = $con->real_escape_string($image_path);

            // Inserta la ruta en la base de datos
            $query = "INSERT INTO products (product_code, product_name, product_brand, product_os, product_model, product_price, product_provider, product_category,product_image_path) 
                    VALUES ('$product_code', '$product_name', '$product_brand', '$product_os', '$product_model', '$product_price', '$product_provider', '$product_category','$image_path')";
            
            // Ejecuta la consulta
            if ($con->query($query) === TRUE) {
                header("Location: ../productlist.php"); // Redirige al archivo HTML
                exit();
            } else {
                echo "Error: " . $query . "<br>" . $con->error;
            }
            
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "No file was uploaded or there was an error.";
    }
    // Realiza la consulta para insertar el producto
    
}

// Función para borrar un producto
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Realiza la consulta para borrar el producto
    $query = "DELETE FROM products WHERE id = $id";

    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        header("Location: ../productlist.php"); // Redirige al archivo HTML
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

// Función para actualizar un producto
if (isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];
    $product_os = $_POST['product_os'];
    $product_price = $_POST['product_price'];
    $product_provider = $_POST['product_provider'];
    $product_category = $_POST['product_category'];
    if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] == UPLOAD_ERR_OK) {
        $image_dir = "../../img/"; // Carpeta donde se guardarán las imágenes
        $image_name = basename($_FILES['product_img']['name']); // Nombre del archivo
        $image_path = $image_dir . $image_name; // Ruta completa

        // Mueve el archivo a la carpeta de destino
        if (move_uploaded_file($_FILES['product_img']['tmp_name'], $image_path)) {
            $image_path = "img/". $image_name;
            $image_path = $con->real_escape_string($image_path);

            // Inserta la ruta en la base de datos

            // Realiza la consulta para actualizar el producto
            $query = "UPDATE products SET product_code = '$product_code', product_name = '$product_name', product_brand = '$product_brand', product_os = '$product_os', product_price = '$product_price', product_provider = '$product_provider', product_category = '$product_category', product_image_path = '$image_path' WHERE id = $id";
        // Ejecuta la consulta
            if ($con->query($query) === TRUE) {
                header("Location: ../productlist.php"); // Redirige al archivo HTML
                exit();
            } else {
                echo "Error: " . $query . "<br>" . $con->error;
            }

        } else {
        echo "Error moving the uploaded file.";
        }
    } else {
        $query = "UPDATE products SET product_code = '$product_code', product_name = '$product_name', product_brand = '$product_brand', product_os = '$product_os', product_price = '$product_price', product_provider = '$product_provider', product_category = '$product_category' WHERE id = $id";
        // Ejecuta la consulta
            if ($con->query($query) === TRUE) {
                header("Location: ../productlist.php"); // Redirige al archivo HTML
                exit();
            } else {
                echo "Error: " . $query . "<br>" . $con->error;
            }
    }
}

// Función para obtener todos los productos (se usa en el HTML)
function getProducts($con) {
    // Consulta SQL
    $query = "SELECT * FROM products";
    $result = $con->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta SQL: " . $con->error);
    }

    // Procesa los resultados
    if ($result->num_rows > 0) {
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    } else {
        return []; // Retorna un array vacío si no hay resultados
    }
}
function getProductstel($con) {
    // Consulta SQL
    $xd = "Celulares";
    $query = "SELECT * FROM products WHERE product_category = '$xd'";
    $result = $con->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta SQL: " . $con->error);
    }

    // Procesa los resultados
    if ($result->num_rows > 0) {
        $productscel = [];
        while ($row = $result->fetch_assoc()) {
            $productscel[] = $row;
        }
        return $productscel;
    } else {
        return []; // Retorna un array vacío si no hay resultados
    }
}
function getProductstbs($con) {
    // Consulta SQL
    $xd = "Tablets";
    $query = "SELECT * FROM products WHERE product_category = '$xd'";
    $result = $con->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta SQL: " . $con->error);
    }

    // Procesa los resultados
    if ($result->num_rows > 0) {
        $productstbs = [];
        while ($row = $result->fetch_assoc()) {
            $productstbs[] = $row;
        }
        return $productstbs;
    } else {
        return []; // Retorna un array vacío si no hay resultados
    }
}
function getProductsan($con) {
    // Consulta SQL
    $xd = "Android";
    $query = "SELECT * FROM products WHERE product_os = '$xd'";
    $result = $con->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta SQL: " . $con->error);
    }

    // Procesa los resultados
    if ($result->num_rows > 0) {
        $productsan = [];
        while ($row = $result->fetch_assoc()) {
            $productsan[] = $row;
        }
        return $productsan;
    } else {
        return []; // Retorna un array vacío si no hay resultados
    }
}
function getProductsios($con) {
    // Consulta SQL
    $xd = "iOS";
    $query = "SELECT * FROM products WHERE product_os = '$xd'";
    $result = $con->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta SQL: " . $con->error);
    }

    // Procesa los resultados
    if ($result->num_rows > 0) {
        $productsios = [];
        while ($row = $result->fetch_assoc()) {
            $productsios[] = $row;
        }
        return $productsios;
    } else {
        return []; // Retorna un array vacío si no hay resultados
    }
}
function getProductslnx($con) {
    // Consulta SQL
    $xd = "Linux";
    $query = "SELECT * FROM products WHERE product_os = '$xd'";
    $result = $con->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta SQL: " . $con->error);
    }

    // Procesa los resultados
    if ($result->num_rows > 0) {
        $productslnx = [];
        while ($row = $result->fetch_assoc()) {
            $productslnx[] = $row;
        }
        return $productslnx;
    } else {
        return []; // Retorna un array vacío si no hay resultados
    }
}
if (isset($_POST['venta_pro'])) {
    $product_id = $_POST['product_id'];
    $nombres_comprador = $_POST['nombres_comprador'];
    $apellidos_comprador = $_POST['apellidos_comprador'];
    $num_tarjeta = $_POST['num_tarjeta'];
    $ci_comprador = $_POST['ci_comprador'];
    $query = "INSERT INTO `compras` (`nombres_comprador`, `apellidos_comprador`, `pro_id`, `num_tarjeta`, `ci_comprador`)VALUES ('$nombres_comprador', '$apellidos_comprador', '$product_id', '$num_tarjeta', '$ci_comprador')";
    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="../../assets/icons/shortcut-icon.ico" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../../js/modernizr.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¡Gracias por tu compra! 🎉 <br>

                Nos complace que hayas elegido ElectroCarly para tu compra. Sabemos que has tomado una excelente
                decisión al confiar en nosotros. 💡<br>

                Tu pedido será procesado y enviado en breve. Mientras tanto, te invitamos a descubrir más productos de
                alta calidad que tenemos para ti. ¡No te lo puedes perder! <br>

                Visita nuestra tienda en línea para encontrar las últimas novedades, promociones exclusivas y productos
                que harán tu vida más fácil y divertida. 🎁 <br>

                Te esperamos pronto de nuevo. ¡Tu satisfacción es nuestra prioridad! <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-seccess">De nada!!!</button>
            </div>
        </div>
    </div>
</div>
<script>
            // Espera a que la página cargue completamente
            window.onload = function () {
                // Muestra el modal
                $('#exampleModalCenter').modal('show');

                // Redirige después de 5 segundos
                setTimeout(function() {
                    window.location.href = "../../../product.php"; // Redirige a la tienda después de mostrar el modal
                }, 5000); // Espera 5 segundos antes de redirigir
            };
        </script>
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
       # header("Location: ../../../product.php"); // Redirige al archivo HTML
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}
?>