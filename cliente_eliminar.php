<?php
    include("cnx.php");
    $id = $_GET["codigo"];
    $sql = "SELECT * FROM Cliente WHERE Cliente_id = $id";
    // echo $sql;
    $resultado = $conexion->query($sql);
    
    if ($resultado->num_rows > 0) {
        while ($row = $resultado -> fetch_assoc()) {
            $id = $row['Cliente_id'];
            $nombre = $row['Cliente_nombre'];            
            $apellido = $row['Cliente_apellido'];
            $usuario = $row['Cliente_user'];
            $password = $row['Cliente_pass'];
            $email = $row['Cliente_email'];               
        };
        $conexion->close();
        } else {
            echo "No hay resultados ...";
        }
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	<title>Edición de Cliente</title>
	
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
        <h1>Edita cliente</h1>
    <form name="frm_cliente_D" action="index.php" method="post">
        Codigo:<br>
        <input type="text" name="codigo" class="form-control" 
        value="<?php echo $id; ?>" readonly><br>
        Nombre:<br>
        <input type="text" name="nombre" class="form-control"
        value="<?php echo $nombre; ?>" readonly><br>
        Apellido:<br>
        <input type="text" name="apellido"  class="form-control"
        value="<?php echo $apellido; ?>" readonly><br>
        Usuario:<br>
        <input type="text" name="usuario"  class="form-control"
        value="<?php echo $usuario; ?>" readonly><br>
        Password:<br>
        <input type="text" name="password"  class="form-control"
        value="<?php echo $password; ?>" readonly><br>
        Email:<br>
        <input type="text" name="email"  class="form-control"
        value="<?php echo $email; ?>" readonly><br>          
       
        <input type="submit" name="cliente_eliminar" class="btn btn-dark" value="Grabar" 
        onclick="alert('Seguro que desea eliminar este cliente?')">
        <a href="index.php?pag=cliente_lista" class="btn btn-secondary">Cancelar</a>        
    </form> 
    </div>
    
</body>

</html>