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
	<title>Borrar Producto</title>
</head>
<body>
	<?php

	Cancelar($_GET['id']);

	function Cancelar($id){
		include 'conexion.php';
		session_start();
		$usuario = $_SESSION['usuario'];
		$resultado1 = mysqli_query($conexion, "SELECT * FROM usr WHERE usuario = '".$_SESSION["usuario"]."' LIMIT 1");
		$datos = $resultado1->fetch_assoc();
		$sentencia = "DELETE FROM detalle_ventas WHERE id_dv='".$id."' ";
		$resultado = mysqli_query($conexion, $sentencia);
		if($resultado && $datos['rol']==1){
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Listo!",
		  text: "Pedido cancelado éxitosamente.",
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
		if ($resultado && $datos['rol']==0) {
			echo
			'<script>
			Swal.fire({
			  type: "success",
			  title: "¡Listo!",
			  text: "Pedido cancelado éxitosamente.",
			  showConfirmButton: false,
			  timer: 1500
			})
			var pagina = "modpedidos.php";
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