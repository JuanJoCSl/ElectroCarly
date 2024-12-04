<?php
session_start();
if (!empty($_POST['btningresar'])) {
    if (!empty($_POST['user']) or !empty($_POST['pass'])) {
        if (empty($_POST['user'])) {
            echo 'Campo usuario vacio';
        } elseif(empty($_POST['pass'])) {
            echo 'Campo contraseña vacio';
        } else {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            // Preparar la consulta para obtener el hash almacenado y otros datos
            $stmt = $con->prepare("SELECT id_user, dni, first_name, last_name, gender, username, email, password 
                                FROM users 
                                WHERE username = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Recuperar los datos del usuario
                $datos = $result->fetch_assoc();
                $stored_hash = $datos['password'];

                // Verificar la contraseña ingresada contra el hash almacenado
                if (password_verify($pass, $stored_hash)) {
                    // Iniciar sesión y guardar datos del usuario
                    $_SESSION['id_user'] = $datos['id_user'];
                    $_SESSION['user_names'] = $datos['first_name'];
                    $_SESSION['user_lastname'] = $datos['last_name'];

                    // Redirigir a la página principal
                    header("Location: home.php");
                    exit();
                } else {
                    // Contraseña incorrecta
                    echo "<div class='alert alert-danger'>Acceso denegado: Contraseña incorrecta</div>";
                }
            } else {
                // Usuario no encontrado
                echo "<div class='alert alert-danger'>Acceso denegado: Usuario no encontrado</div>";
            }

            // Cerrar la declaración
            $stmt->close();
            
            
        }
    } else {
        echo "Campos vacios XD";
    }
    
}
?>