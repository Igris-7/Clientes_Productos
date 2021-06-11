<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
} else {
    
include("cnx.php");

if ($_POST["cliente_crear"] != "") {
    $id = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $email = $_POST["email"];    
    $sqlC="INSERT INTO Cliente VALUES ($id,'$nombre','$apellido','$usuario','$password','$email')";
    if ($conexion->query($sqlC) === TRUE) {
        //echo "Datos insertados correctamente ...";
    } else {
        echo "Error ".$conexion->error;
    }
    header("Location: index.php?pag=cliente_lista");
} 

if ($_POST["cliente_editar"] != "") {
    $id = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $email = $_POST["email"];    
    $sqlU="UPDATE Cliente SET Cliente_nombre='$nombre', Cliente_apellido='$apellido', ";
    $sqlU=$sqlU." Cliente_user='$usuario', Cliente_pass='$password', Cliente_email='$email' WHERE Cliente_id=$id";
    if ($conexion->query($sqlU) === TRUE) {
        echo "Datos actualizados correctamente ...";
    } else {
        echo "Error ".$conexion->error;
    }
    header("Location: index.php?pag=cliente_lista");
} 

if ($_POST["cliente_eliminar"] != "") {
    $id = $_POST["codigo"];
    $sqlD="DELETE FROM Cliente WHERE Cliente_id=$id";
    if ($conexion->query($sqlD) === TRUE) {
        echo "Datos eliminados correctamente ...";
    } else {
        echo "Error ".$conexion->error;
    }
    header("Location: index.php?pag=cliente_lista");
} 

// Articulo

if ($_POST["articulo_crear"] != "") {
    $id = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $sqlC="INSERT INTO Articulo VALUES ($id,'$nombre',$precio,$categoria,'$descripcion')";
    if ($conexion->query($sqlC) === TRUE) {
        //echo "Datos insertados correctamente ...";
    } else {
        echo "Error ".$conexion->error;
    }
    header("Location: index.php?pag=articulo_listar");
} 

if ($_POST["articulo_editar"] != "") {
    $id = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];      
    $sqlU="UPDATE Articulo SET Articulo_nombre='$nombre', Categoria_id=$categoria, ";
    $sqlU=$sqlU . " Articulo_descripcion='$descripcion', Articulo_precio=$precio WHERE Articulo_id=$id";
    if ($conexion->query($sqlU) === TRUE) {
        //echo "Datos actualizados correctamente ...";
    } else {
        echo "Error ".$conexion->error;
    }
    header("Location: index.php?pag=articulo_listar");
} 

if ($_POST["articulo_eliminar"] != "") {
    $id = $_POST["codigo"];
    $sqlD="DELETE FROM Articulo WHERE Articulo_id=$id";
    if ($conexion->query($sqlD) === TRUE) {
        //echo "Datos eliminados correctamente ...";
    } else {
        echo "Error ".$conexion->error;
    }
    header("Location: index.php?pag=articulo_listar");   
} 



?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="scripts/estilos_menu.css">
</head>
<body>
<?php
    if ($_SESSION["usuario"] != "") {
?>        
<div class="sidenav">
  <?php 
        include("menu.php"); 
  ?>
</div>

<div class="main">
    <?php
        $pagina = $_GET["pag"];
        switch($pagina) {
            case "cliente_lista": include("cliente_lista.php"); break;
            case "cliente_crear": include("cliente_crear.php"); break;
            case "cliente_editar": include("cliente_editar.php"); break;
            case "cliente_eliminar": include("cliente_eliminar.php"); break;

            case "articulo_listar": include("articulo_listar.php"); break;
            case "articulo_crear": include("articulo_crear.php"); break;
            case "articulo_editar": include("articulo_editar.php"); break;
            case "articulo_eliminar": include("articulo_eliminar.php"); break;
            
            default: include("fondo.php"); break;
        }
    ?>
</div>
<? } else {
    header("Location: noautorizado.php");
}?>   
</body>
</html>    
<?php 
}
?>    
    
    