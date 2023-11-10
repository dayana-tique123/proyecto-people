<a href="inicio.php">inicio</a>
<a href="base.php">volver</a><br>
<?php
require_once ("./function/funciones.php");

$user= $_GET['id'].".". ' ';


echo $user;
echo consulta_por_persona($user);


?>


