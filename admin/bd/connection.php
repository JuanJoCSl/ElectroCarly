<?php

#$con = new mysqli("localhost","root","","electrocarly");
$con = new mysqli("bxazrgknaogpic9zs3xf-mysql.services.clever-cloud.com","u0lwdmkdqqdc0yrr","yIwJXBNh8OFceY7Fwg90","bxazrgknaogpic9zs3xf");
$con->set_charset("utf8");
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

?>