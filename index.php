<?php
include 'conexion.php';

include 'menu.php';

include 'carrito.php';
?>
    <div class="row">
      <div class="col s12 m4 l3" style="background: rgba(0,0,0,0.3);"> 

  			<div class="section">
   				<h5 style="text-align: center;">BUSCADOR</h5>
   				<nav style="background:rgba(0,0,0,0.3);">
				  <div class="nav-wrapper" style="width: 70%; left: 5%;">
				  	<form action="buscador.php" method="POST">
				    	<input id="busca" name="busca" type="text" required>
					    <button style="position: absolute; top: 25%; left: 110%;" class="btn waves-effect waves-light" type="submit">Ir
	  					</button>
				    </form>
				  </div>
				</nav>
  			</div>
		<div class="divider"></div>
				<?php
		  	 	include 'listacategorias.php';
		  	 	?>
		<div class="divider"></div>
  		</div>

      <div class="col s12 m8 l9"> 

      	<div class="row">
		      <div class="col s12" style="background:rgba(0,0,0,0.7); text-align: center; font-size: 300%; color: #00FA9A;">
		      NUEVOS PRODUCTOS
		      </div>
		      	<?php
					$consulta = "SELECT * FROM productos";
					$resultado = mysqli_query($conexion, $consulta);
						if($resultado){
							while ($filas = mysqli_fetch_assoc($resultado)) {
									echo "<div class='col s5' style='background:rgba(0,0,0,0.5); text-align: center; font-size: 150%; color: #00FA9A; margin: 5px; margin-left: 5.5%; margin-bottom: 2%; height: 295px; width: 41.5%;'>"; 
									echo "<h5 style='font-size: 75%;'>";
									echo $filas["nombre"];
									echo "</h5>";
									echo "<div>";
									echo "<center><img src='img/"; echo $filas["imagen"]; echo "' style='height: 150px; width: 70%; padding-top: 1%;'></center>";
									echo "<div class='data1'>";
									echo "$";
									echo $filas["prc"];
									echo " ";
									echo "<form action='' method='POST'>";
									echo "<input type='hidden' name='id' id='id' value='"; echo $filas['id']; echo "'>";
									echo "<input type='hidden' name='nombre' id='nombre' value='"; echo $filas['nombre']; echo "'>";
									echo "<input type='hidden' name='prc' id='prc' value='"; echo $filas['prc']; echo "'>";
									echo "<input style='width: 15%;' type='number' name='cant' id='cant' max='"; echo $filas['cant']; echo "' value='"; echo 1; echo "'>";
									?>
									<?php { ?>
									<button class="btn waves-effect waves-light" type="submit" name="btnAccion" value="agregar">Comprar
   									<i class="material-icons right">add_shopping_cart</i>
  									</button>
								    <?php } ?>
								    <?php
 									echo "</form>";
									echo "</div>";
									echo "</div>";
									echo "</div>";
							}
						}
						mysqli_free_result($resultado);
						mysqli_close($conexion);
				?>
		</div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>

