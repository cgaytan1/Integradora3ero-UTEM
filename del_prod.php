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
	EliminarProducto($_GET['id']);

	function EliminarProducto($id){
		include 'conexion.php';
		$sentencia = "DELETE FROM productos WHERE id='".$id."' ";
		$resultado = mysqli_query($conexion, $sentencia);
		if($resultado){
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Éxito!",
		  text: "Producto borrado correctamente.",
		  showConfirmButton: false,
		  timer: 1500
		})
		var pagina = "modprod.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 1600);
		</script>';
	}else{
		echo "Error al realizar el cambio, intentelo de nuevo.";
	}
	}
?>
</body>
</html>	