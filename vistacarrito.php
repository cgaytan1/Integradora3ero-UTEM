<?php
include 'menu.php';
include 'carrito.php';
?>
<br>
<h3 style="font-weight: bold; padding-left: 1%;">LISTA DEL CARRITO</h3>
<?php if (!empty($_SESSION['carrito'])) { ?>
<table class="responsive-table">
	<tbody>
			<tr>
				<th width="30%">Nombre</th>
				<th width="25%" style="text-align: center;">Precio</th>
				<th width="15%" style="text-align: center;">Cantidad</th>
				<th width="15%" style="text-align: center;">Total</th>
				<th width="15%">--</th>
			</tr>
			<?php $total=0; ?>
			<?php foreach ($_SESSION['carrito'] as $indice=>$producto) { ?>
			<tr>
				<td width="30%"><?php echo $producto['nombre']; ?></td>
				<td width="25%" style="text-align: center;"><?php echo $producto['prc']; ?></td>
				<td width="15%" style="text-align: center;"><?php echo $producto['cant']; ?></td>
				<td width="15%" style="text-align: center;"><?php echo number_format($producto['prc']*$producto['cant'],2); ?></td>
				<td width="15%">
					<form action="" method="POST">
						<input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
						<button class="btn waves-effect waves-light red" type="submit" name="btnAccion" value="eliminar">Eliminar
    					<i class="material-icons right">clear</i>
  						</button>
					</form>
				</td>
			</tr>
			<?php 
			$total=$total+($producto['prc']*$producto['cant']); 
			?>
			<?php } ?>
			<tr>
				<td colspan="3" align="right"><h3>TOTAL:</h3></td>
				<td align="right"><h3 style="font-weight: bold;">$<?php echo number_format($total,2); ?></h3></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="5">
					<?php if(isset($_SESSION["usuario"])) { ?>
					<form action="pago.php" method="POST">
						<center>
					<div class="col s5" style="background:rgba(0,0,0,0.5); text-align: center; font-size: 150%; color: #00FA9A; margin: 5px; margin-left: 5.5%; margin-bottom: 2%; height: 120px; width: 415px;">
						<label style="font-size: 30px; color: black; font-weight: bold;">CORREO DE CONTACTO:</label><br>
						<input  style="width: 50%;" type="email" id="email" name="email" placeholder="Escribe tú correo" required>
					</div>
					<button class="btn waves-effect waves-light green" type="submit" name="btnAccion" value="proceder">Proceder al pago >>
  					</button>
  					<?php }else{ ?>
  						<center>
  						<h5>Inicia sesión para continuar con tú compra, puedes hacerlo <a style="font-weight: bold;" href="login.html">aquí</a>.</h5>
  						</center>
  					<?php } ?>
  					</center>
					</form>
				</td>

			</tr>
	</tbody>
</table>
<?php }else{ ?>
<div>
	<h5 style="font-size: 120%; padding-left: 1%;">No hay productos en el carrito... :(</h5>
</div>
<?php } ?>
<script type="text/javascript" src="js/materialize.min.js"></script>
