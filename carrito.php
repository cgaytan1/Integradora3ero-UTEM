<?php
include 'conexion.php';

$mensaje = "";
echo '<script type="text/javascript" src="js/materialize.min.js"></script>';


if (isset($_POST['btnAccion'])) {
	switch ($_POST['btnAccion']) {
		case 'agregar':

			if(is_numeric($_POST['id'])){
				$id = $_POST['id'];
				$mensaje.= "Ok... ID correcto ".$id."</br>";
			}else{
				$mensaje.= "Upss... ID incorrecto ".$id."</br>";
			}

			if(is_string($_POST['nombre'])){
				$nombre = $_POST['nombre'];
				$mensaje.= "Ok... Nombre: ".$nombre."</br>";
			}else{
				$mensaje.= "Upss... Nombre incorrecto"."</br>";
			}

			if(is_numeric($_POST['prc'])){
				$precio = $_POST['prc'];
				$mensaje.= "Ok... Precio $".$precio."</br>";
			}else{
				$mensaje.= "Upss... Precio incorrecto"."</br>";
			}

			if(is_numeric($_POST['cant'])){
				$cantidad = $_POST['cant'];
				$mensaje.= "Ok... Cantidad: ".$cantidad."</br>";
			}else{
				$mensaje.= "Upss... Cantidad incorrecta"."</br>";
			}



			if (!isset($_SESSION['carrito'])) {
				$producto = array(
				'id' => $id,
				'nombre' => $nombre,
				'prc' => $precio,
				'cant' => $cantidad
				);
				$_SESSION['carrito'][0] = $producto;
			}else{
				$entro = false;
				$NumeroProductos = count($_SESSION['carrito']);
				for($i = 0; $i<$NumeroProductos; $i++)
				{
					$consulta1 = "SELECT * FROM productos WHERE id = '$id'";
					$resultado1 = mysqli_query($conexion, $consulta1);
					$res = $resultado1->fetch_assoc();
					if($_SESSION['carrito'][$i]['id'] == $id)
					{
						if($res['cant'] <= $_SESSION['carrito'][$i]['cant'])
						{
							echo "<script>M.toast({html: 'No tenemos tantas cantidades disponibles'})</script>";
							$entro = true;
						}		
						else
						{
							$_SESSION['carrito'][$i]['cant'] = ($_SESSION['carrito'][$i]['cant']+1);
							$entro = true;
							echo "<script>M.toast({html: 'Agregado al carrito'})</script>";
						}
					}
				}
				if(!$entro)
				{
					$producto = array(
					'id' => $id,
					'nombre' => $nombre,
					'prc' => $precio,
					'cant' => $cantidad
					);
					$_SESSION['carrito'][$NumeroProductos] = $producto;
					echo "<script>M.toast({html: 'Agregado al carrito'})</script>";
				}
				
			}
			$mensaje = print_r($_SESSION, true);
			break;

			case 'eliminar':
				if (is_numeric($_POST['id'])) {
					$id = $_POST['id'];
					foreach($_SESSION['carrito'] as $indice=>$producto){
						if($producto['id'] == $id){
							unset($_SESSION['carrito'][$indice]);
							echo '<!DOCTYPE html>
							<html>
							<head>
								<title>Borrar</title>
								  <meta charset="utf-8">
								  <link rel="icon" type="image/.jpg" href="img/icon.png"/>
							      <script src="js/jquery-3.4.1.min.js"></script>
							      <script src="js/sweetalert2.all.min.js"></script>
								  <link rel="stylesheet" href="css/sweetalert.css">
							</head>
							<body>
							<script>
								Swal.fire({
								type: "success",
								title: "¡Éxito!",
								text: "Elemento borrado con éxito.",
								showConfirmButton: false,
								timer: 1500
								})
								var pagina = "vistacarrito.php";
								function redir(){
								location.href = pagina;
								}
								setTimeout("redir()", 1600);
								</script>
							</body>
							</html>';
						}
					}
				}else{
					$mensaje.= "Upss... ID incorrecto ".$id."</br>";
				}
			break;
	}
}

?>