<?php 
include 'conexion.php';
@session_start();

if(isset($_SESSION["usuario"]))
{
	$resultado1 = mysqli_query($conexion, "SELECT * FROM usr WHERE usuario = '".$_SESSION["usuario"]."' LIMIT 1");
	$datos = $resultado1->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/Estilos.css" rel="stylesheet" type="text/css">
	<title>CarxOnline</title>
	<link rel="icon" type="image/.jpg" href="img/icon.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script src="js/jquery-3.4.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="css/sweetalert.css">
	<link rel="icon" type="image/.jpg" href="img/icon.png"/>
</head>
<body>
<a title="Logo" href="index.php"><img class="logo" src="img/logo.png" alt="Logo"/></a>
<h5 class="sesion" style="font-size: 130%; text-align: right; position: absolute; top: 10%; left: 90%; max-left: 90%;">
	<?php if(isset($_SESSION["usuario"])){?>Hola, <strong><?php echo $_SESSION['usuario'] ?><?php } ?></strong></h5>

<header>
<script>
	$(document).ready(function(){
    	  $('.sidenav').sidenav();
  	});
</script>
<script>
	$(document).ready(function(){
	$(".dropdown-trigger").dropdown();
	{ hover: false }
	});
</script>
<script>
	
</script>

<?php
if (!isset($_SESSION['usuario'])) { 

	?>
	<ul id="dropdown1" class="dropdown-content">
	  <li><a href="conocenos.php">Conóce</a></li>
	  <li class="divider"></li>
	  <li><a href="contacto.php">Contacto</a></li>
	</ul>
	<ul id="dropdown0" class="dropdown-content">
	  <li><a href="conocenos.php">Conóce</a></li>
	  <li class="divider"></li>
	  <li><a href="contacto.php">Contacto</a></li>
	</ul>
<nav style="background-color: rgba(0,0,0,0.5); font-weight: bold;">
    <div class="nav-wrapper">
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
	        <li title="Inicio"><a href="index.php"><i class="material-icons">home</i></a></li>
	        <li title="Nosotros"><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons">store</i></a></li>
	        <li title="Mi Carrito"><a href="vistacarrito.php">Carrito(<?php echo (empty($_SESSION['carrito']))?0:count(($_SESSION['carrito'])); ?>)</a></li>
			<li><a class="waves-effect waves-light btn" href="registro1.php">Registrate</a></li>
			<li><a class="waves-effect waves-light btn" href="login.html">Iniciar Sesión</a></li>
      	</ul>
    </div>
</nav>
	<ul class="sidenav" id="mobile-demo">
		<a href="#!" class="brand-logo" style="font-size: 40px;" disable>MENU</a>
	    		<li title="Inicio"><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
				<li title="Nosotros"><a class="dropdown-trigger" href="#!" data-target="dropdown0"><i class="material-icons">store</i>Nosotros</a></li>
				<li title="Mi Carrito"><a href="vistacarrito.php"><i class="material-icons">local_grocery_store</i>Mi Carrito (<?php echo (empty($_SESSION['carrito']))?0:count(($_SESSION['carrito'])); ?>)</a></li>
				<li><a class="waves-effect waves-light btn" href="registro1.php">Registrate</a></li>
				<li><a class="waves-effect waves-light btn" href="login.html">Iniciar Sesión</a></li>
	</ul>

<?php } elseif (isset($_SESSION['usuario']) && $datos['rol'] == 0) { ?>
	
	<ul id="dropdown1" class="dropdown-content">
  <li><a href="perfil.php">Perfil</a></li>
  <li class="divider"></li>
  <li><a href="modpedidos.php">Pedidos</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a href="perfil.php">Perfil</a></li>
  <li class="divider"></li>
  <li><a href="modpedidos.php">Pedidos</a></li>
</ul>
<nav style="background-color: rgba(0,0,0,0.5); font-weight: bold;">
    <div class="nav-wrapper">
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
	        <li title="Inicio"><a href="carxousr.php"><i class="material-icons">home</i></a></li>
	        <li title="Mi Cuenta"><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons">account_circle</i></a></li>
	        <li title="Mi Carrito"><a href="vistacarrito.php">Carrito(<?php echo (empty($_SESSION['carrito']))?0:count(($_SESSION['carrito'])); ?>)</a></li>
      		<li><a class="waves-effect waves-light btn" href="cerrar_sesion.php" style="background-color: red;">Cerrar Sesión</a></li>
      	</ul>
    </div>
</nav>
	<ul class="sidenav" id="mobile-demo">
		<a href="#!" class="brand-logo" style="font-size: 40px;" disable>MENU</a>
	    <li><a href="carxousr.php"><i class="material-icons">home</i> Inicio</a></li>
				<li title="Mi Cuenta"><a class="dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons">account_circle</i> Mi Cuenta</a></li>
	        	<li title="Mi Carrito"><a href="vistacarrito.php"><i class="material-icons">local_grocery_store</i>Mi Carrito (<?php echo (empty($_SESSION['carrito']))?0:count(($_SESSION['carrito'])); ?>)</a></li>
      			<li><a class="waves-effect waves-light btn" href="cerrar_sesion.php" style="background-color: red;">Cerrar Sesión</a></li>
	</ul>

<?php }elseif (isset($_SESSION['usuario']) && $datos['rol'] == 1) { ?>

	<nav style="background-color: rgba(0,0,0,0.5); font-weight: bold;">
    <div class="nav-wrapper">
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
	        <li title="Inicio"><a href="carxousr.php"><i class="material-icons">home</i></a></li>
	        <li title="Control Productos"><a href="modprod.php"><i class="material-icons">folder_special</i></a></li>
	        <li title="Control Empleados"><a href="modvend.php"><i class="material-icons">folder_shared</i></a></li>
	        <li title="Control Pedidos"><a href="modpedidosadm.php"><i class="material-icons">assignment</i></a></li>
	        <li title="Control Pedidos"><a href="control_usr.php"><i class="material-icons">assignment_turned_in</i></a></li>
	        <li title="Mi Carrito"><a href="vistacarrito.php">Carrito(<?php echo (empty($_SESSION['carrito']))?0:count(($_SESSION['carrito'])); ?>)</a></li>
      		<li><a class="waves-effect waves-light btn" href="cerrar_sesion.php" style="background-color: red;">Cerrar Sesión</a></li>
      	</ul>
    </div>
</nav>
	<ul class="sidenav" id="mobile-demo">
		<a href="#!" class="brand-logo" style="font-size: 40px;" disable>MENU</a>
	    		<li title="Inicio"><a href="carxousr.php"><i class="material-icons">home</i> Inicio</a></li>
	    		<li title="Control Productos"><a href="modprod.php"><i class="material-icons">folder_special</i> Control Productos</a></li>
	        	<li title="Control Empleados"><a href="modvend.php"><i class="material-icons">folder_shared</i> Control Empleados</a></li>
	        	<li title="Control Pedidos"><a href="modpedidosadm.php"><i class="material-icons">assignment</i> Control Pedidos</a></li>
	        	<li title="Control Pedidos"><a href="control_usr.php"><i class="material-icons">assignment_turned_in</i></a></li>
	        	<li title="Mi Carrito"><a href="vistacarrito.php"><i class="material-icons">local_grocery_store</i>Mi Carrito (<?php echo (empty($_SESSION['carrito']))?0:count(($_SESSION['carrito'])); ?>)</a></li>
      			<li><a class="waves-effect waves-light btn" href="cerrar_sesion.php" style="background-color: red;">Cerrar Sesión</a></li>
	</ul>

<?php } ?>