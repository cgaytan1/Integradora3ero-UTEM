<?php
session_start();
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
	<title>Carxonline - Registro</title>
</head>
<body>
<?php
error_reporting(0);

RegistroProductos($_POST['id'], $_POST['nombre'], $_POST['categoria'], $_POST['dic'], $_POST['prc'], $_POST['modelo'], $_POST['cant'], $_POST['imagen']);

function RegistroProductos($id, $nombre, $categoria, $dic, $prc, $modelo, $cant, $imagen){
	include 'conexion.php';
	$sentencia = "INSERT INTO productos (id, nombre, categoria, dic, prc, modelo, cant, imagen) VALUES ('".$id."', '".$nombre."', '".$categoria."', '".$dic."', '".$prc."', '".$modelo."','".$cant."', '".$imagen."' )";
	$resultado = mysqli_query($conexion, $sentencia);
	if($resultado){
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Éxito!",
		  text: "Producto registrado con éxito.",
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
		var pagina = "regprod.html";
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