<?php

/**
 * @conexion esta funcion sirve para conectarse a la base de datos 
 */
function conexion()
{
    $conexion = new mysqli('localhost', 'root', '', 'proyecto_tours_people');
    return $conexion;
}

/**
 * @param retur esta funcion retorna una autenticacion
 */
function login($usuario, $password)
{
    $mensaje = '';
    $conexion = conexion();
    $consulta = "SELECT * FROM usuario WHERE nombre_p='$usuario'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()){
                $passwordok = $fila['clave'];
            }
           $conexion->close();
            if($password == $passwordok){
                header('location: base.php');
            }else{
                $mensaje = 'no son correctos los datos';
                $mensaje .= '<br>';
                $mensaje .= $usuario. ' '. $password ;
                $mensaje .= '<br>';
                $mensaje.=  $passwordok;
            }
        }else{
            $mensaje = 'no se encontro el usuario';
        }
    } else {
        $mensaje = 'no sirve';
    }
    return $mensaje;
}


/**
 * @param funcion esta funcion sirve para registrar
 */
function registrar($nombre, $usuario, $password){
    $mensaje = "";
    $conexion = conexion();
    $consulta = "SELECT * FROM usuario WHERE nombre='$usuario'";
    $resultado = $conexion->query($consulta);

    if($resultado){
        if($resultado->num_rows > 0){
            $mensaje ="usuario ya existe";

        }else{
            if(strlen($usuario) > 0 ){
                $insert = "INSERT INTO usuario(nombre, apellido, contraseña) VALUES('$nombre', '$usuario', '$password')";
                $resultado1 = $conexion->query($insert);
                if($resultado1){
                    
                    header("location: base.php");
    
                }else{
                    $mensaje = "no registrado";
    
                }
            }else{
                $mensaje = 'el campo esta vacio';
            }
            

        }


    }else{
        
        

    }
    return $mensaje;


}

function mostrar_usuario(){
    $mensaje = "";
    $conexion = conexion();
    $consulta = "SELECT * FROM usuario";
    $resultado = $conexion->query($consulta);

    if($resultado){
        while($fila = $resultado->fetch_array()){
            $id = $fila['id_documento'];
            $mensaje .=  $fila['id_documento']. ' '. $fila['nombre_p']. ' '. ' usuario: ' .$fila['apellido_p']. ' '. "<a href='info.php?id=$id'>info</a>";
            $mensaje .= '<br>';

        }

    }else{
        $mensaje = "mal";
    }

    return $mensaje;

}

function consulta_por_persona($user){
    $mensaje = "";
    $conexion = conexion();
    $consulta = "SELECT * FROM usuario where id_documento='$user'";
    $resultado = $conexion->query($consulta);

    if($resultado)
    {
        if($resultado->num_rows > 0){
            while($fila = $resultado->fetch_assoc()){
                $mensaje .= "nombre:" . ' '. $fila['nombre_p']. "<br>";
                $mensaje .= "usuario:". ' '. $fila['apellido_p']. "<br>";
                $mensaje .= "contraseña:". ' '.$fila['clave']. "<br>";

            }
        }else{
            $mensaje = "algo anda mal";
        }

    }

    return $mensaje;

}
function consulta_por_persona2(){
    $mensaje = "";
    $conexion = conexion();
    $consulta = "SELECT * FROM sitios where id_sitios=''";
    $resultado = $conexion->query($consulta);

}
