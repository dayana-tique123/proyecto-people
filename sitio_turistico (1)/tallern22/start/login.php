<a href="inicio.php">Inicio</a>
<a href="registrar.php?nombre=&usuario=&pasword=">registar</a><br>

<?php
require_once('./function/funciones.php');

$usuario = $_GET['nombre'];
$password = $_GET['password'];
echo login($usuario, $password);

?>

