<?php
    include("cnx.php");
    $id = $_GET["codigo"];
    $sql = "SELECT * FROM Articulo WHERE Articulo_id = $id";
    // echo $sql;
    $resultado = $conexion->query($sql);
    
    if ($resultado->num_rows > 0) {
        while ($row = $resultado -> fetch_assoc()) {
            $id = $row['Articulo_id'];
            $nombre = $row['Articulo_Nombre'];            
            $precio = $row['Articulo_precio'];
            $categoria = $row['Categoria_id'];
            $descripcion = $row['Articulo_descripcion'];
        };
        //$conexion->close();
        } else {
            echo "No hay resultados ...";
        }
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Edicion de Artículo</title>
	
		<meta name="viewport" content="width-device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
	
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
    <div class="container"><br>
        <h1>Edita artículo</h1>
    <form name="frm_cliente_U" action="index.php" method="post">
        Codigo:<br>
        <input type="text" name="codigo" class="form-control" 
        value="<?php echo $id; ?>" readonly><br>
        Nombre:<br>
        <input type="text" name="nombre" class="form-control"
        value="<?php echo $nombre; ?>"><br>
        <?php
            $sqlcat = "SELECT * FROM Categoria";
            $res = $conexion->query($sqlcat);        
        ?>
        Categoría:<br>
        <select name="categoria"  class="form-control">
        <?php 
            if ($res->num_rows > 0) {
                while ($row = $res -> fetch_assoc()) {
                    $sel = "";
                    if ($row['Categoria_id'] == $categoria){ $sel = " selected"; };
                    echo "<option value=".$row['Categoria_id'].$sel.">".$row['Categoria_nombre']."</option>";
                };
                $conexion->close();
            } else {
                    echo "No hay resultados ...";
            }
        ?>
      </select>
        <br>
        Descripción:<br>
        <input type="text" name="descripcion"  class="form-control"
        value="<?php echo $descripcion; ?>"><br>
        Precio:<br>
        <input type="text" name="precio"  class="form-control"
        value="<?php echo $precio; ?>"><br>
        <input type="submit" class="btn btn-dark" name="articulo_editar" value="Grabar">
        <a href="index.php?pag=articulo_listar" class="btn btn-secondary">Cancelar</a>        
    </form> 
    </div>
    
</body>
</html>