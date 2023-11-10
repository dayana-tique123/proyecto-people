<a href="inicio.php">Inicio</a>
<a href="login.php?usuario=&password="> login </a><br>

<?php
require_once('./function/funciones.php');

$nombre = $_GET['nombre'];
$usuario = $_GET['usuario'];
$password = $_GET['pasword'];

echo registrar($nombre, $usuario, $password);


?>
