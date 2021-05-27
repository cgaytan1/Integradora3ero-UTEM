<?php
include 'conexion.php';
include 'menu.php';
include 'carrito.php';
$usuario = $_SESSION['usuario'];

$resultado1 = mysqli_query($conexion, "SELECT * FROM usr WHERE usuario = '".$_SESSION["usuario"]."' LIMIT 1");
$datos = $resultado1->fetch_assoc();

$id = $datos['id'];
?>

<?php
if ($_POST) {
	$total=0;
	$SID=session_id();
	$correo=$_POST['email'];

	foreach($_SESSION['carrito'] as $indice=>$producto){
		$total = $total+($producto['prc']*$producto['cant']);
	}
	$sentencia = $conexion->prepare("INSERT INTO `ventas` (`id`, `cve_transaccion`, `paypaldatos`, `fecha`, `correo`, `total`) VALUES (NULL, '".$usuario."', '".$SID."', NOW(), '".$correo."', '".$total."');");
	$sentencia->execute();

	$consulta = "SELECT * FROM ventas";
	$resultado = mysqli_query($conexion, $consulta);

	if($resultado){
	while ($filas = mysqli_fetch_assoc($resultado)) {
			$idventa = $filas['id'];
			}
		}

	foreach($_SESSION['carrito'] as $indice=>$producto){
  
	$sentencia = $conexion->prepare("INSERT INTO `detalle_ventas` (`id_dv`, `idventa`, `idprod`, `usr`, `prc_unitario`, `cant`, `status`, `id_usr`) VALUES (NULL, '".$idventa."', '".$producto['id']."', '".$usuario."', '".$producto['prc']."', '".$producto['cant']."', 'pendiente', '".$id."');");
	$sentencia->execute();
	}
}

$verificar = "SELECT * FROM productos WHERE id='".$producto['id']."'";
$res = mysqli_query($conexion, $verificar);
$filas = mysqli_fetch_assoc($res);

$resta = number_format($filas['cant']-$producto['cant'],2);

$consulta = $conexion->prepare("UPDATE productos SET cant='".$resta."' WHERE id='".$producto['id']."' ");
$consulta->execute();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=MXN"></script>
<script>
     paypal.Buttons({
    createOrder: function(data, actions) {
      // Set up the transaction
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $total; ?>'
          },
          description:"Compra de productos a CARXONLINE: $<?php echo number_format($total,2);?>",
          custom:"<?php echo $SID ?>#<?php echo $idventa; ?>"
        }]
      });
    },
  onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
      	console.log(data);
        $tran = data.orderID;
      	window.location="verificador.php?orderID="+$tran
      });
    }
  }).render('#paypal-button-container');
</script>
    <style>
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
            }
        }
    </style>
<div>
	<center><h1 style="font-weight: bold; font-size: 60px;">¡PASO FINAL!</h1></center>
	<hr><br>
	<center>
	<p style="text-align: center;">Estás a punto de pagar con PayPal la cantidad de:
	<h4 style="font-weight: bold; font-size: 50px;">$<?php echo number_format($total,2); ?></h4>
	<div id="paypal-button-container"></div>
	</p>
	</center>
	<br>
	<p style="font-size: 100%; text-align: center;">Tus productos entrarán en un estado <strong style="font-weight: bold;">"Pendiente"</strong> de envío y tú solicitud será revisada contra disponibilidad de inventario.
	<strong style="font-weight: bold;">(Para aclaraciones: aclaraciones@carxonline.com)</strong>
	</p>
</div>
<script type="text/javascript" src="js/materialize.min.js"></script>
