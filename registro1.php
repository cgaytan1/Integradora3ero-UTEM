<!DOCTYPE html>
<html>
<head>
	<title>CarxOnline-Registro</title>
	<meta charset="utf-8">
    <link href="css/Estilos2.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/.jpg" href="img/icon.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script src="js/jquery-3.4.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="css/sweetalert.css">
</head>
<body>
	<form action="registro.php" method="post" class="form-register" onsubmit="return validar();">
		<h2>CREA UNA CUENTA</h2>
		<input type="hidden" name="id" placeholder="ID del usuario">

		&#128697; Nombre: <input type="text" name="nombre" required placeholder="Nombre(s)">
        
        &#128697; Apellidos: <input type="text" name="app" required placeholder="Apellido paterno">

        <input type="text" name="apm" required placeholder="Apellido materno">

        &#128100; Usuario: <input type="text" name="usuario" required placeholder="Usuario">

        &#128273; Contraseña: <input type="password" id="password" name="pass" required placeholder="Contraseña">

         &#128273; Confirma contraseña: <input type="password" id="password2" name="pass" required placeholder="Vuelve a escribir tu contraseña">

        <input type="hidden" name="rol" required placeholder="Rol" value="0">

        &#128231; Correo Electronico: <input type="email" name="correo" required placeholder="Correo">

		&#128107; Género: <div class="input-field col s12">
                            <select id="genero" name="genero">
                            <option value="" disabled selected>Elige tú género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>>
                            </select>
                           </div>
        <script>
            $(document).ready(function(){
            $('select').formSelect();
            });
        </script>

		<input type="submit" value="Registrarse">

		<center><p style="padding-bottom: 2%;" class="link">¿Ya tienes una cuenta? <a href="login.html">Ingresa aquí</a></p></center>
		<a href="index.php"><input type="button" value="Volver a inicio"></a>
	</form>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<script>
        function checkIt(evt){
            evt = (evt) ? evt : window.event
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57)){
                    status = "ESTE CAMPO SOLO ACEPTA NUMEROS."
                    return false
                }
                status = "" 
                return true
            }
</script>
<script>
var password, password2;

password = document.getElementById('password');
password2 = document.getElementById('password2');

password.onchange = password2.onkeyup = passwordMatch;

function passwordMatch() {
    if(password.value !== password2.value)
        password2.setCustomValidity('Las contraseñas no coinciden.');
    else
        password2.setCustomValidity('');
}
</script>
</html>