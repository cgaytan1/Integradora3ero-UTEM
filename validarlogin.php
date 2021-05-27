<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	  <title>Validación</title>
	  
      <link href="css/Estilos2.css" rel="stylesheet" type="text/css">
	  <link rel="icon" type="image/.jpg" href="img/icon.png"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="js/jquery-3.4.1.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="js/sweetalert2.all.min.js"></script>
	  <link rel="stylesheet" href="css/sweetalert.css">
</head>
<body>

<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

$consulta = "SELECT * FROM usr WHERE usuario = '$usuario' and pass = '$password'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);
if($resultado){
	if ($filas > 0) {
	
	session_start();
	$_SESSION['usuario'] = $usuario;
	echo '<script>
		var pagina = "carxousr.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 100);
		</script>';
	
	}else{
	echo '<script>
		Swal.fire({
		  type: "error",
		  title: "¡Error!",
		  text: "Error en los datos, verificalos.",
		  showConfirmButton: false,
		  timer: 1800
		})
		var pagina = "login.html";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 1900);
		</script>';
	}
}else{
	echo "Problemas: " . mysqli_error($conexion);
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>

</body>
</html>
