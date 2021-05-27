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
	<title>Carxonline - Modificar</title>
</head>
<body>
<?php

ModificarVendedor($_POST['status'], $_POST['no_id']);

function ModificarVendedor($status, $no_id){
	include 'conexion.php';
	$sentencia = "UPDATE detalle_ventas SET status='".$status."' WHERE id_dv='".$no_id."' ";
	$resultado = mysqli_query($conexion, $sentencia);
	if($resultado){
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Éxito!",
		  text: "Pedido actualizado correctamente.",
		  showConfirmButton: false,
		  timer: 1500
		})
		var pagina = "modpedidosadm.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 1600);
		</script>';
	}else{
		echo '<script>
		Swal.fire({
		  type: "error",
		  title: "¡Error!",
		  text: "Intentalo de nuevo.",
		  showConfirmButton: false,
		  timer: 1500
		})
		var pagina = "modpedidosadm.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 1600);
		</script>';
	}
}
?>
</body>
</html>

