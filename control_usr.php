<?php
include 'conexion.php';
include 'menu.php';

$resultado1 = mysqli_query($conexion, "SELECT * FROM usr WHERE usuario = '".$_SESSION["usuario"]."' LIMIT 1");
$datos = $resultado1->fetch_assoc();

if ($_SESSION['usuario'] && $datos['rol'] == 1) {
	
?>
<center><h1 style="font-size: 300%;">CONTROL DE REGISTRO</h1></center>
<center>
<table class="responsive-table">
	<thead>
		<tr>
			<th width="5%" style="text-align: center; border: 1px solid;">ID</th>
			<th width="10%" style="text-align: center; border: 1px solid;">Tabla</th>
			<th width="10%" style="text-align: center; border: 1px solid;">Nuevo ID</th>
			<th width="15%" style="text-align: center; border: 1px solid;">Acción</th>
			<th width="15%" style="text-align: center; border: 1px solid;">Usuario</th>
			<th width="45%" style="text-align: center; border: 1px solid;">Fecha de inserción</th>
		</tr>
	</thead>
<?php
include 'conexion.php';
$consulta = "SELECT * FROM control_usr";
$resultado = mysqli_query($conexion, $consulta);

if($resultado){
	while ($filas = mysqli_fetch_assoc($resultado)) {
			echo "<tr>";
			echo "<td width='5%' style='text-align: center; border: 1px solid;'>"; echo $filas["id"]; echo "</td>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["tabla"]; echo "</td>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["newdata"]; echo "</td>";
			echo "<td width='15%' style='text-align: center; border: 1px solid;'>"; echo $filas["action"]; echo "</td>";
			echo "<td width='15%' style='text-align: center; border: 1px solid;'>"; echo $filas["user"]; echo "</td>";
			echo "<td width='45%' style='text-align: center; border: 1px solid;'>"; echo $filas["dateedit"]; echo "</td>";
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