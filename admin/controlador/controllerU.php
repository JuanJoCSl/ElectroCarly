<?php
#$con = new mysqli("localhost","root","","electrocarly");
$con = new mysqli("bxazrgknaogpic9zs3xf-mysql.services.clever-cloud.com","u0lwdmkdqqdc0yrr","yIwJXBNh8OFceY7Fwg90","bxazrgknaogpic9zs3xf");
$con->set_charset("utf8");
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}
// Función para agregar un usuario
if (isset($_POST['add_user'])) {
    $dni = $_POST['dni'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptamos la contraseña

    // Realiza la consulta para insertar el usuario
    $query = "INSERT INTO users (dni, first_name, last_name, gender, username, email, password) 
              VALUES ('$dni', '$first_name', '$last_name', '$gender', '$username', '$email', '$password')";

    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        header("Location: ../listadmin.php"); // Redirige al archivo de lista de usuarios
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

// Función para borrar un usuario
if (isset($_GET['delete_id'])) {
    $id_user = $_GET['delete_id'];

    // Realiza la consulta para borrar el usuario
    $query = "DELETE FROM users WHERE id_user = $id_user";

    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        header("Location: ../listadmin.php"); // Redirige al archivo de lista de usuarios
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

// Función para actualizar un usuario
if (isset($_POST['update_user'])) {
    $id_user = $_POST['id_user'];
    $dni = $_POST['dni'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null; // Si se deja la contraseña vacía, no se actualiza

    // Si no se actualiza la contraseña, no la incluimos en la consulta
    if ($password) {
        $query = "UPDATE users SET dni = '$dni', first_name = '$first_name', last_name = '$last_name', gender = '$gender', 
                  username = '$username', email = '$email', password = '$password' WHERE id_user = $id_user";
    } else {
        $query = "UPDATE users SET dni = '$dni', first_name = '$first_name', last_name = '$last_name', gender = '$gender', 
                  username = '$username', email = '$email' WHERE id_user = $id_user";
    }

    // Ejecuta la consulta
    if ($con->query($query) === TRUE) {
        header("Location: ../listadmin.php"); // Redirige al archivo de lista de usuarios
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}
// Función para obtener todos los usuarios (se usa en el HTML)
function getUsers($con) {
    // Consulta SQL para obtener los usuarios
    $query = "SELECT * FROM users";
    $result = $con->query($query);

    // Verifica si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta SQL: " . $con->error);
    }

    // Procesa los resultados
    if ($result->num_rows > 0) {
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    } else {
        return []; // Retorna un array vacío si no hay resultados
    }
}

?>