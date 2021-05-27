<?php
include 'conexion.php';
include 'menu.php';

$resultado1 = mysqli_query($conexion, "SELECT * FROM usr WHERE usuario = '".$_SESSION["usuario"]."' LIMIT 1");
$datos = $resultado1->fetch_assoc();

if ($_SESSION['usuario'] && $datos['rol'] == 1) {

?>
<center><h1 style="font-size: 300%;">CONTROL DE PRODUCTOS</h1></center>
<center>
<table class="responsive-table">
	<thead style="text-align: center;">
		<tr>
			<th style="width: 5%; text-align: center; border: 1px solid;">ID</th>
			<th style="width: 10%; text-align: center; border: 1px solid;">Nombre</th>
			<th style="width: 10%; text-align: center; border: 1px solid;">Categoría</th>
			<th style="width: 25%; text-align: center; border: 1px solid;">Descripción</th>
			<th style="width: 5%; text-align: center; border: 1px solid;">Precio</th>
			<th style="width: 10%; text-align: center; border: 1px solid;">Modelo</th>
			<th style="width: 5%; text-align: center; border: 1px solid;">Cantidad</th>
			<th style="width: 10%; text-align: center; border: 1px solid;">Imagen</th>
			<th style="width: 10%; text-align: center;"><a href="regprod.html"><button type="button" class="waves-effect waves-light btn" style="width: 200%;">Nuevo</button></a></th>
		</tr>
	</thead>
<?php
include 'conexion.php';
$consulta = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $consulta);

if($resultado){
	while ($filas = mysqli_fetch_assoc($resultado)) {
		echo "<tr>";
			echo "<td style='width: 5%; text-align: center; border: 1px solid;'>"; echo $filas["id"]; echo "</td>";
			echo "<td style='width: 10%; text-align: center; border: 1px solid;'>"; echo $filas["nombre"]; echo "</td>";
			echo "<td style='width: 10%; text-align: center; border: 1px solid;'>"; echo $filas["categoria"]; echo "</td>";
			echo "<td style='width: 25%; text-align: center; border: 1px solid;'>"; echo $filas["dic"]; echo "</td>";
			echo "<td style='width: 5%; text-align: center; border: 1px solid;'>"; echo $filas["prc"]; echo "</td>";
			echo "<td style='width: 10%; text-align: center; border: 1px solid;'>"; echo $filas["modelo"]; echo "</td>";
			echo "<td style='width: 5%; text-align: center; border: 1px solid;'>"; echo $filas["cant"]; echo "</td>";
			echo "<td style='width: 10%; text-align: center; border: 1px solid;'>"; echo "<img src='img/".$filas['imagen']."' style='width: 50px;'>"; echo "</td>";

			echo "<td style='width: 10%; text-align: center;'> <a href='mod_prod.php?id=".$filas['id']."'><button type='button' class='btn btn success' style='background: green;'>Modificar</button></a> </td>";

			echo "<td style='width: 10%; text-align: center;'> <a href='del_prod.php?id=".$filas['id']."'><button type='button' class='btn btn danger' style='background: red;'>Eliminar</button></a> </td>";
			
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