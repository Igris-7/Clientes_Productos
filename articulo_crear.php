<?php
    $sql = "SELECT * FROM Categoria";
    $resultado = $conexion->query($sql);
?>    

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Articulo Nuevo</title>
	
	
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
        <h1>Nuevo artículo</h1>
    <form name="frm_articulo_C" action="index.php" method="post">
        Codigo:<br>
        <input type="text" name="codigo" class="form-control"><br>
        Nombre:<br>
        <input type="text" name="nombre"  class="form-control"><br>
        Categoría:<br>
        <select name="categoria"  class="form-control">
        <?php 
            if ($resultado->num_rows > 0) {
                while ($row = $resultado -> fetch_assoc()) {
                    echo "<option value=".$row['Categoria_id'].">".$row['Categoria_nombre']."</option>";
                };
                $conexion->close();
            } else {
                    echo "No hay resultados ...";
            }
        ?>
      </select>
        <br>
        Descripción:<br>
        <input type="text" name="descripcion"  class="form-control"><br>
        Precio:<br>
        <input type="text" name="precio"  class="form-control"><br>
        <input type="submit" class="btn btn-dark" name="articulo_crear" value="Grabar">
        <a href="index.php?pag=articulo_lista" class="btn btn-secondary">Cancelar</a>
    </form> 
    </div>
    
</body>
</html>