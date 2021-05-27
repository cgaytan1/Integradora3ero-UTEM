<?php
include 'conexion.php';
include 'menu.php';

$resultado1 = mysqli_query($conexion, "SELECT * FROM usr WHERE usuario = '".$_SESSION["usuario"]."' LIMIT 1");
$datos = $resultado1->fetch_assoc();

if ($_SESSION['usuario'] && $datos['rol'] == 1) {
	
?>
<center><h1 style="font-size: 300%;">CONTROL DE EMPLEADOS</h1></center>
<center>
<table class="responsive-table">
	<thead>
		<tr>
			<th width="5%" style="text-align: center; border: 1px solid;">ID</th>
			<th width="20%" style="text-align: center; border: 1px solid;">Nombre</th>
			<th width="15%" style="text-align: center; border: 1px solid;">Apellido Paterno</th>
			<th width="15%" style="text-align: center; border: 1px solid;">Apellido Materno</th>
			<th width="10%" style="text-align: center; border: 1px solid;">Género</th>
			<th width="10%" style="text-align: center; border: 1px solid;">Usuario</th>
			<th width="15%" style="text-align: center; border: 1px solid;">Correo</th>
			<th width="10%" style="text-align: center;"><a href="alta_vend.php"><button type="button" class="waves-effect waves-light btn" style="width: 187%;">Nuevo</button></a></th>
		</tr>
	</thead>
<?php
include 'conexion.php';
$consulta = "SELECT * FROM vempleados";
$resultado = mysqli_query($conexion, $consulta);

if($resultado){
	while ($filas = mysqli_fetch_assoc($resultado)) {
			echo "<tr>";
			echo "<td width='5%' style='text-align: center; border: 1px solid;'>"; echo $filas["id"]; echo "</td>";
			echo "<td width='20%' style='text-align: center; border: 1px solid;'>"; echo $filas["nombre"]; echo "</td>";
			echo "<td width='15%' style='text-align: center; border: 1px solid;'>"; echo $filas["app"]; echo "</td>";
			echo "<td width='15%' style='text-align: center; border: 1px solid;'>"; echo $filas["apm"]; echo "</td>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["genero"]; echo "</td>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["usuario"]; echo "</td>";
			echo "<td width='15%' style='text-align: center; border: 1px solid;'>"; echo $filas["correo"]; echo "</td>";
			echo "<td width='10%' style='text-align: center;'> <a href='mod_vend.php?id=".$filas['id']."'><button type='button' class='btn btn success' style='background: green;'>Modificar</button></a> </td>";
			if ($filas['id'] == 13) {
				echo "<td style='text-align: center;'>Dueño</td>";
			}else{
				echo "<td width='10%' style='text-align: center;'> <a href='delvend.php?id=".$filas['id']."'><button type='button' class='btn btn danger' style='background: red; width: 100%;'>Eliminar</button></a> </td>";
			}
		echo "</tr>";
	}
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
</table>
</center>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
<?php }else{ header('location:index.php'); }?>