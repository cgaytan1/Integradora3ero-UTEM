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

ModificarVendedor($_POST['id'], $_POST['nombre'], $_POST['categoria'], $_POST['dic'], $_POST['prc'], $_POST['modelo'], $_POST['cant'], $_POST['imagen'], $_POST['no_id']);

function ModificarVendedor($id, $nombre, $categoria, $dic, $prc, $modelo, $cant, $imagen, $no_id){
	include 'conexion.php';
	$sentencia = "UPDATE productos SET id='".$id."', nombre='".$nombre."', categoria='".$categoria."', dic='".$dic."', prc='".$prc."', modelo='".$modelo."', cant='".$cant."', imagen='".$imagen."' WHERE id='".$no_id."' ";
	$resultado = mysqli_query($conexion, $sentencia);
	if($resultado){
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Éxito!",
		  text: "Cambios realizados correctamente.",
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
		echo '<script>
		Swal.fire({
		  type: "error",
		  title: "¡Error!",
		  text: "Intentalo de nuevo.",
		  showConfirmButton: false,
		  timer: 1500
		})
		var pagina = "modprod.php";
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

