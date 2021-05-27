<!DOCTYPE html>
<html>
<head>
	<title>Cerrar sesión</title>
	<meta charset="utf-8">
    <link href="css/Estilos2.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/.jpg" href="img/icon.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script src="js/jquery-3.4.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="css/sweetalert.css">
	<link href="css/Estilos2.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/.jpg" href="img/icon.png"/>
</head>
<body>

<?php
session_start();
session_destroy();
echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Adiós!",
		  text: "Cerraste sesión con éxito.",
		  showConfirmButton: false,
		  timer: 1800
		})
		var pagina = "index.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 1900);
		</script>';
?>

</body>
</html>
