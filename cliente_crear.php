<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Cliente Nuevo</title>
	
	
		<meta name="viewport" content="width-device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
	
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="evento.js"></script>


</head>
<body>
    <div class="container"><br>
        <h1>Nuevo cliente</h1>
    <form name="frm_cliente_C" action="index.php" method="post">
        Codigo:<br>
        <input type="text" name="codigo" class="form-control"><br>
        Nombre:<br>
        <input type="text" name="nombre"  class="form-control"><br>
        Apellido:<br>
        <input type="text" name="apellido"  class="form-control"><br>
        Usuario:<br>
        <input type="text" name="usuario"  class="form-control"><br>
        Password:<br>
        <input type="text" name="password"  class="form-control"><br>
        Email:<br>
        <input type="text" name="email"  class="form-control"><br>        
         <input type="submit" name="cliente_crear" class="btn btn-dark" value="Grabar" 
        onclick="alert('Seguro que desea registrar este cliente?')">
        <a href="index.php?pag=cliente_lista" class="btn btn-secondary">Cancelar</a>
    </form> 
    </div>
    
</body>

</html>
