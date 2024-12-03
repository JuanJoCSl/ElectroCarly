<?php
$con = new mysqli("localhost","root","","electrocarly");
#$con = new mysqli("bxazrgknaogpic9zs3xf-mysql.services.clever-cloud.com","u0lwdmkdqqdc0yrr","yIwJXBNh8OFceY7Fwg90","bxazrgknaogpic9zs3xf");
$con->set_charset("utf8");
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}
// Función para agregar un producto
if (isset($_POST['add_product'])) {
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];
    $product_model = $_POST['product_model'];
    $product_price = $_POST['product_price'];
    $product_provider = $_POST['product_provider'];
    $product_category = $_POST['product_category'];

    // Realiza la consulta para insertar el producto
    $query = "INSERT INTO products (product_code, product_name, product_brand, product_model, product_price, product_provider, product_category) 
              VALUES ('$product_code', '$product_name', '$product_brand', '$product_model', '$product_price', '$product_provider', '$product_category')";
    
    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        header("Location: products.php"); // Redirige al archivo HTML
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

// Función para borrar un producto
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Realiza la consulta para borrar el producto
    $query = "DELETE FROM products WHERE id = $id";

    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        header("Location: products.php"); // Redirige al archivo HTML
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
    $product_price = $_POST['product_price'];

    // Realiza la consulta para actualizar el producto
    $query = "UPDATE products SET product_code = '$product_code', product_name = '$product_name', product_brand = '$product_brand', product_price = '$product_price' WHERE id = $id";

    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        header("Location: products.php"); // Redirige al archivo HTML
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

// Función para obtener todos los productos (se usa en el HTML)
function getProducts($con) {
    // Consulta SQL
    $query = "SELECT id, product_code, product_name, product_brand, product_price FROM products";
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
?>
