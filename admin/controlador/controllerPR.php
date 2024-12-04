<?php
#$con = new mysqli("localhost","root","","electrocarly");
$con = new mysqli("bxazrgknaogpic9zs3xf-mysql.services.clever-cloud.com","u0lwdmkdqqdc0yrr","yIwJXBNh8OFceY7Fwg90","bxazrgknaogpic9zs3xf");
$con->set_charset("utf8");
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

// Función para borrar un usuario
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Realiza la consulta para borrar el usuario
    $query = "DELETE FROM compras WHERE id_reg_pk  = $id";

    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        header("Location: ../providerslist.php"); // Redirige al archivo de lista de usuarios
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

function getProviers($con) {
    // Consulta SQL para obtener los usuarios
    $query = "SELECT * FROM compras";
    $result = $con->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta SQL: " . $con->error);
    }

    // Procesa los resultados
    if ($result->num_rows > 0) {
        $proviers = [];
        while ($row = $result->fetch_assoc()) {
            $proviers[] = $row;
        }
        return $proviers;
    } else {
        return []; // Retorna un array vacío si no hay resultados
    }
}

?>