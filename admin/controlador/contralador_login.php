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
            $sql = $con->query("SELECT * FROM users WHERE user_name = '$user' AND user_pass ='$pass'");
            if ($datos = $sql->fetch_object()) {
                $_SESSION['id_user']=$datos->id_user;
                $_SESSION['user']=$datos->user_name;
                $_SESSION['pass']=$datos->user_pass;
                $_SESSION['user_names'] = $datos->user_names;
                $_SESSION['user_lastname']= $datos->user_lastname;
                header("location: home.php");
            } else {
                echo "<div class='alert alert-danger' >Acceso denegado</div>";
            }
            
        }
    } else {
        echo "Campos vacios XD";
    }
    
}
?>