<?php
session_start();
include 'menu.php';
$SID2 = session_id();
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
<center><h1 style="font-size: 300%;">MIS PEDIDOS</h1></center>

<center>

<table class="responsive-table">
	<thead style="text-align: center;">
		<tr>
			<th width='10%' style="text-align: center; border: 1px solid;">ID venta</th>
			<th width='10%' style="text-align: center; border: 1px solid;">ID producto</th>
			<th width='20%' style="text-align: center; border: 1px solid;">Precio Unitario</th>
			<th width='10%' style="text-align: center; border: 1px solid;">Cantidad</th>
			<th width='30%' style="text-align: center; border: 1px solid;">Estado</th>
			<th width='20%' style="text-align: center; border: 1px solid;">--</th>
		</tr>
	</thead>
<?php
include 'conexion.php';
$consulta = "SELECT * FROM detalle_ventas";
$resultado = mysqli_query($conexion, $consulta);

if($resultado){
	while ($filas = mysqli_fetch_assoc($resultado)) {
		if($_SESSION['usuario'] == $filas['usr']) {

		echo "<tr>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["idventa"]; echo "</td>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["idprod"]; echo "</td>";
			echo "<td width='20%' style='text-align: center; border: 1px solid;'>"; echo $filas["prc_unitario"]; echo "</td>";
			echo "<td width='10%' style='text-align: center; border: 1px solid;'>"; echo $filas["cant"]; echo "</td>";
			echo "<td width='30%' style='text-align: center; border: 1px solid;'>"; echo $filas["status"]; echo "</td>";
			if($filas["status"] == 'pendiente' && $_SESSION['usuario'] == $filas['usr']) { 
			echo "<td width='20%' style='text-align: center; border: 1px solid;'> <a href='delpedido.php?id=".$filas['id_dv']."'><button type='button' class='btn btn error' style='background: red;'>Cancelar</button></a> </td>";
		 	}
		 	if($filas["status"] == 'enviado' && $_SESSION['usuario'] == $filas['usr']){
			echo "<td width='20%' style='text-align: center; border: 1px solid;'><button type='button' class='btn btn yellow' style='background: yellow; color: black;'>En proceso de envío</button></a> </td>";
			}
			if($filas["status"] == 'entregado' && $_SESSION['usuario'] == $filas['usr']){
			echo "<td width='20%' style='text-align: center; border: 1px solid;'><button type='button' class='btn btn green' style='background: yellow; color: black;'>Entregado</button></a> </td>";
			}

		echo "</tr>";
	}
}
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
</center>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>