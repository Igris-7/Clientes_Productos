<?php
$conexion=new mysqli("localhost","claseweb_pepe","ENEro2020",claseweb_ventas);
//mysqli: servidor, usuario, clave, basedatos
if ($conexion->connect_error){
    die("conexion fallida ".$conexion->connect_error);
} else {
    // echo "conectado exitosamente";
}
?>