<?php
session_start();
include 'menu.php';
include 'conexion.php';

$resultado1 = mysqli_query($conexion, "SELECT * FROM usr WHERE usuario = '".$_SESSION["usuario"]."' LIMIT 1");
$datos = $resultado1->fetch_assoc();

if ($_SESSION['usuario'] && $datos['rol'] == 1) {

?>

<?php
include 'conexion.php';
$consulta = "SELECT * FROM usr";
$resultado = mysqli_query($conexion, $consulta);

if($resultado){
	while ($filas = mysqli_fetch_assoc($resultado)) {
		$idcte = $filas["id"];
	}
}
?>
<center><h1 style="font-size: 300%;">CONTROL DE PEDIDOS</h1></center>

<center>

<table class="responsive-table">
	<thead style="text-align: center;">
		<tr>
			<th width='10%' style="text-align: center; border: 1px solid;">ID</th>
			<th width='10%' style="text-align: center; border: 1px solid;">ID venta</th>
			<th width='10%' style="text-align: center; border: 1px solid;">ID producto</th>
			<th width='15%' style="text-align: center; border: 1px solid;">Cliente</th>
			<th width='20%' style="text-align: center; border: 1px solid;">Precio Unitario</th>
			<th width='5%' style="text-align: center; border: 1px solid;">Cantidad</th>
			<th width='20%' style="text-align: center; border: 1px solid;">Estado</th>
			<th width='10%' style="text-align: center;">--</th>
			<th width='10%' style="text-align: center;">--</th>
		</tr>
	</thead>
<?php
include 'conexion.php';
$consulta = "SELECT * FROM detalle_ventas";
$resultado = mysqli_query($conexion, $consulta);

if($resultado){
	while ($filas = mysqli_fetch_assoc($resultado)) {

		echo "<tr>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["id_dv"]; echo "</td>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["idventa"]; echo "</td>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["idprod"]; echo "</td>";
			echo "<td width='15%' style='text-align: center; border: 1px solid;'>"; echo $filas["usr"]; echo "</td>";
			echo "<td width='20%' style='text-align: center; border: 1px solid;'>"; echo $filas["prc_unitario"]; echo "</td>";
			echo "<td width='5%' style='text-align: center; border: 1px solid;'>"; echo $filas["cant"]; echo "</td>";
			echo "<td width='20%' style='text-align: center; border: 1px solid;'>"; echo $filas["status"]; echo "</td>";
			echo "<td width='20%' style='text-align: center;'> <a href='mod_pedidos.php?id=".$filas['id_dv']."'><button type='button' class='btn btn success' style='background: green;'>Modificar</button></a> </td>";
			echo "<td width='20%' style='text-align: center;'> <a href='delpedido.php?id=".$filas['id_dv']."'><button type='button' class='btn btn error' style='background: red;'>Cancelar</button></a> </td>";
		echo "</tr>";
    }
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
</center>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
<?php }else{ header('location:index.php'); }?>