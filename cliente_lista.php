<?php
include("cnx.php");

$sql = "SELECT * FROM Cliente";
$resultado = $conexion->query($sql);

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Listado de Clientes</title>
	
	
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
<body>  <div class="container">
        <br>
        <h1>Listado de clientes</h1>
        <a href="index.php?pag=cliente_crear" class="btn btn-primary">Nuevo Cliente</a>
        <br><br>
<table id="datos" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Password</th>
            <th>Email</th>            
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if ($resultado->num_rows > 0) {
                while ($row = $resultado -> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['Cliente_id']."</td>";
                    echo "<td>".$row['Cliente_nombre']."</td>";            
                    echo "<td>".$row['Cliente_apellido']."</td>";
                    echo "<td>".$row['Cliente_user']."</td>";            
                    echo "<td>".$row['Cliente_pass']."</td>";
                    echo "<td>".$row['Cliente_email']."</td>";            
                    echo "<th><a class='btn btn-success' href='index.php?pag=cliente_editar&codigo=".$row['Cliente_id']."'>Editar</a></th>";
                    echo "<th><a class='btn btn-danger'  href='index.php?pag=cliente_eliminar&codigo=".$row['Cliente_id']."'>Eliminar</a></th>";
                    echo "</tr>";
                };
                $conexion->close();
            } else {
                echo "No hay resultados ...";
            }
        ?>
    </tbody>
</table>
</div>
</body>
</html>