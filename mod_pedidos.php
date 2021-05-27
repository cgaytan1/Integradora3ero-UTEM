<?php

$consulta = ModPed($_GET['id']);

function ModPed($id){
	include 'conexion.php';
	$sentencia = "SELECT * FROM detalle_ventas";
	$resultado = mysqli_query($conexion, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return[
	    $filas['id_dv'],
		$filas['status']
	];
}
?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
      <link href="css/Estilos2.css" rel="stylesheet" type="text/css">
	  <link rel="icon" type="image/.jpg" href="img/icon.png"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="js/jquery-3.4.1.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="js/sweetalert2.all.min.js"></script>
	  <link rel="stylesheet" href="css/sweetalert.css">
	<title>Carxonline - Modificar Pedido</title>
</head>
<body>
	<form action="savepedido.php" method="POST">
			<h2>MODIFICAR PEDIDO</h2>
            
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

			Estado: <div class="input-field col s12">
                            <select id="status" name="status">
                            <option value="<?php echo $consulta[1] ?>" selected><?php echo $consulta[1] ?></option>
                            <option value="enviado">Enviado</option>
                            <option value="entregado">Entregado</option>
                            </select>
                           </div>
	        <script>
	            $(document).ready(function(){
	            $('select').formSelect();
	            });
	        </script>

			<input type="hidden" name="no_id" value="<?php echo $_GET['id'] ?>">

			<input type="submit" value="Guardar"><br>
			<a href="modpedidosadm.php"><input type="button" value="Volver"></a>
	</form>
</body>
</html>
<script type="text/javascript" src="js/materialize.min.js"></script>