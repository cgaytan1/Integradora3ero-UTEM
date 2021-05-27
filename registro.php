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

RegistroCliente($_POST['id'], $_POST['nombre'], $_POST['app'], $_POST['apm'], $_POST['usuario'], md5($_POST['pass']), $_POST['rol'], $_POST['correo'], $_POST['genero']);

function RegistroCliente($id, $nombre, $app, $apm, $usuario, $pass, $rol, $correo, $genero){
	include 'conexion.php';
	$sentencia = "CALL registro('".$id."', '".$nombre."','".$app."','".$apm."', '".$usuario."', '".$pass."', '".$rol."', '".$correo."', '".$genero."' )";
	$resultado = mysqli_query($conexion, $sentencia);
	if($resultado){
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Éxito!",
		  text: "Registro exitoso, inicia sesión con tus datos.",
		  showConfirmButton: false,
		  timer: 1500
		})
		var pagina = "login.html";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 1600);
		</script>';
	}else{
		echo "Error al realizar el cambio, intentelo de nuevo.".mysqli_error($conexion);
	}
}
?>
</body>
</html>

