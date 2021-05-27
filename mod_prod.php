<?php

$consulta = ModProd($_GET['id']);

function ModProd($id){
	include 'conexion.php';
	$sentencia = "SELECT * FROM productos WHERE id='".$id."'";
	$resultado = mysqli_query($conexion, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return[
		$filas['id'],
		$filas['nombre'],
		$filas['categoria'],
		$filas['dic'],
		$filas['prc'],
		$filas['modelo'],
		$filas['cant'],
		$filas['imagen']
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
	<title>Carxonline - Modificar</title>
</head>
<body>
	<form action="saveprod.php" method="POST">
			<h2>MODIFICAR PRODUCTO</h2>
			ID: <input type="text" name="id" value="<?php echo $consulta[0] ?>">

			Nombre: <input type="text" name="nombre" required value="<?php echo $consulta[1] ?>">

			Categoria: <select name="categoria" id="categoria" required style="font-size: 100%;">
                    <option value="<?php echo $consulta[2] ?>" selected ><?php echo $consulta[2] ?></option>
                    <option value="Boligrafos">Boligrafos</option>
                    <option value="Plumones">Plumones</option>
                    <option value="Lapices">Lapices</option>
                    <option value="Crayones">Crayones</option>
                    <option value="Broches">Broches</option>
                    <option value="Clips">Clips</option>
                    <option value="Chinches">Chinches</option>
                    <option value="Engrapadoras">Engrapadoras</option>
                    <option value="Sujeta">Sujeta</option>
                    <option value="Puntillas">Puntillas</option>
                    <option value="Sellos">Sellos</option>
                    <option value="Tintas">Tintas</option>
                    <option value="Borradores">Borradores</option>
                    <option value="Sacapuntas">Sacapuntas</option>
                    <option value="Medicion">Medicion</option>
                    <option value="Libretas">Libretas</option>
                    <option value="Correctores">Correctores</option>
                    <option value="Resistol">Resistol</option>
                    <option value="Tijeras">Tijeras</option>
                    <option value="Pistolas">Pistolas</option>
                    <option value="Silicon">Silicon</option>
                    <option value="Pinturas">Pinturas</option>
                    <option value="Plastilinas">Plastilinas</option>
        </select>
        <script>
            $(document).ready(function(){
            $('select').formSelect();
            });
        </script>

			Descripción: <input type="text" name="dic" value="<?php echo $consulta[3] ?>">

			Precio: <input type="text" name="prc" value="<?php echo $consulta[4] ?>" onkeypress="return checkIt(event)">

			Modelo: <input type="text" name="modelo" value="<?php echo $consulta[5] ?>">

			Cantidad: <input type="text" name="cant" value="<?php echo $consulta[6] ?>" onkeypress="return checkIt(event)">

			Imagen: <input type="file" name="imagen" accept="image/*">

			<input type="hidden" name="no_id" value="<?php echo $_GET['id'] ?>">

			<input type="submit" value="Guardar"><br>
			<a href="modprod.php"><input type="button" value="Volver"></a>
	</form>
</body>
</html>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
        function checkIt(evt){
            evt = (evt) ? evt : window.event
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if (charCode > 31 && (charCode < 45 || charCode > 57)){
                    status = "ESTE CAMPO SOLO ACEPTA NUMEROS."
                    return false
                }
                status = "" 
                return true
            }
</script>