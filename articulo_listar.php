<?php
include("cnx.php");
$sql = "SELECT * FROM Articulo";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Listado de artículos</title>
	
	
		<meta name="viewport" content="width-device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
	
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script>
	    $(document).ready( function(){
	       $('#datos').DataTable();
	    });
	</script>
</head>
<body><div class="container"><br>
        <h1>Listado de Artículos</h1>
        <a href="index.php?pag=articulo_crear" class="btn btn-primary">Nuevo Artículo</a>
        <br><br>
<table id="datos" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Descripción</th>            
            <th>Precio</th>
            <th>Editar</th>
            <th>Eliminar</th>            
        </tr>
    </thead>
    <tbody>
        <?php
            if ($resultado->num_rows > 0) {
                while ($row = $resultado -> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['Articulo_id']."</td>";
                    echo "<td>".$row['Articulo_Nombre']."</td>";            
                    $catid = $row['Categoria_id'];
                    $sqlcat = "SELECT * FROM Categoria WHERE Categoria_id = ".$catid;
                    $res = $conexion->query($sqlcat);
                    $fila = $res -> fetch_assoc();
                    $cat = $fila['Categoria_nombre'];
                    echo "<td>".$cat."</td>";
                    echo "<td>".$row['Articulo_descripcion']."</td>";
                    echo "<td>".$row['Articulo_precio']."</td>";   
                    echo "<th><a class='btn btn-success' href='index.php?pag=articulo_editar&codigo=".$row['Articulo_id']."'>Editar</a></th>";
                    echo "<th><a class='btn btn-danger'  href='index.php?pag=articulo_eliminar&codigo=".$row['Articulo_id']."'>Eliminar</a></th>";                    
                    echo "</tr>";
                }
            } else {
                echo "No hay resultados ...";
            }
        ?>
    </tbody>
</table>
</div>
</body>
</html>