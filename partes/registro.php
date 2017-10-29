<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/CSS.css" media="screen" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<?php
			include '../funciones/function.php';
			if($_POST['pass'] != null && $_POST['correo'] != null){
				if($_POST['correo'] != $_POST['confcorreo'] || $_POST['correo'] == null || $_POST['confcorreo'] == null){
					echo '<p align="center" class="blanco">Los correos no coinciden</p>';
					$email = false;
				}else{
					$email = true;
				}
				if($_POST['pass'] != $_POST['confpass'] || $_POST['pass'] == null || $_POST['confpass'] == null){
					echo '<p align="center" class="blanco">Las contraseñas no coinciden</p>';
					$pass = false;
				}else{
					$pass = true;
				}
			}
		?>
		<?php
			if($_POST['nombre'] == null || $email == false || $_POST['pais'] == null || $_POST['provincia'] == null || $_POST['localidad'] == null || $_POST['direccion'] == null || $_POST['telefono'] == null || $_POST['nif'] == null || $pass == false){
		?>
		<div class="centrarR" align="center">
			<table border="0" width="100%" height="100%"><tr><td valign="center" align="100%">
				<table border="0">				
					<form action="registro.php" method="post">
						<tr><td colspan="2" align="center"><h3>Registro</h3></td></tr>
						<tr><td align="right" width="50%">Nombre de academia: </td><td><input type="text" name="nombre" class="fields"<?php if($_POST['nombre']!=null)echo 'value="'.$_POST['nombre'].'"';?>/></td></tr>
						<tr><td align="right" width="50%">Correo: </td><td><input type="email" name="correo" class="fields"<?php if($_POST['correo']!=null)echo 'value="'.$_POST['correo'].'"';?>/></td></tr>
						<tr><td align="right" width="50%">Confirmar correo: </td><td><input type="email" name="confcorreo" class="fields"/></td></tr>
						<tr><td align="right" width="50%">Pais: </td><td><input type="text" name="pais" class="fields"<?php if($_POST['pais']!=null)echo 'value="'.$_POST['pais'].'"';?>/></td></tr>
						<tr><td align="right" width="50%">Provincia: </td><td><input type="text" name="provincia" class="fields"<?php if($_POST['provincia']!=null)echo 'value="'.$_POST['provincia'].'"';?>/></td></tr>
						<tr><td align="right" width="50%">Localidad: </td><td><input type="text" name="localidad" class="fields"<?php if($_POST['localidad']!=null)echo 'value="'.$_POST['localidad'].'"';?>/></td></tr>
						<tr><td align="right" width="50%">Direccion: </td><td><input type="text" name="direccion" class="fields"<?php if($_POST['direccion']!=null)echo 'value="'.$_POST['direccion'].'"';?>/></td></tr>
						<tr><td align="right" width="50%">Telefono: </td><td><input type="tel" name="telefono" class="fields"<?php if($_POST['telefono']!=null)echo 'value="'.$_POST['telefono'].'"';?>/></td></tr>
						<tr><td align="right" width="50%">NIF: </td><td><input type="text" name="nif" class="fields"<?php if($_POST['nif']!=null)echo 'value="'.$_POST['nif'].'"';?>/></td></tr>
						<tr><td align="right" width="50%">Contraseña: </td><td><input type="password" name="pass" class="fields"/></td></tr>
						<tr><td align="right" width="50%">Confirmar contraseña: </td><td><input type="password" name="confpass" class="fields"/></td></tr>
						<?php
						$fecha= date ("j-n-Y");
						echo "<tr><td align='right' width='50%'></td><td><input type='text' name='date' value='".$fecha."' class='fields' disabled style='display:none;'/></td></tr>";
						?>
						<tr><td colspan="2" align="center" width="50%"</br></br><input type="submit" value="Registrarse" class="btn" class="fields"/></td></tr>
					</form>
					<tr><td colspan="2" align="center" width="50%"></br><a href="../" class="btn">volver</a></td></tr>
				</table>
			</td></tr></table>
		</div>
		<?php
			}else{
				$nombre = $_POST['nombre'];
				$email = $_POST['correo'];
				$pais = $_POST['pais'];
				$provincia = $_POST['provincia'];
				$localidad = $_POST['localidad'];
				$direccion = $_POST['direccion'];
				$telefono = $_POST['telefono'];
				$nif = $_POST['nif'];
				$pass = $_POST['pass'];
				$fecha= date ("Y-n-j");
				if(insertar_academia($nombre,$email,$pais,$provincia,$localidad,$direccion,$telefono,$nif,$pass,$fecha) != null){
					?>
					<div class="centrar" align="center">
						<table border = 0 width="100%" height="100%">
							<tr>
								<td valign="center" align="center">
									<p>Ahora debes verificar su cuenta para poder usar PsicotecnicosTropa</p>
									<a href="../index.php" class="btn" align="center">Inicio</a>
								</td>
							</tr>
						</table>
					</div>
					<?php
				}else{
					?>
						<div class="centrarR" align="center">
							<table border="0" width="100%" height="100%"><tr><td valign="center" align="100%">
								<table border="0">				
									<form action="registro.php" method="post">
										<tr><td colspan="2" align="center"><h3>Registro</h3></td></tr>
										<tr><td align="right" width="50%">Nombre de academia: </td><td><input type="text" name="nombre" class="fields"<?php if($_POST['nombre']!=null)echo 'value="'.$_POST['nombre'].'"';?>/></td></tr>
										<tr><td align="right" width="50%">Correo: </td><td><input type="email" name="correo" class="fields"<?php if($_POST['correo']!=null)echo 'value="'.$_POST['correo'].'"';?>/></td></tr>
										<tr><td align="right" width="50%">Confirmar correo: </td><td><input type="email" name="confcorreo" class="fields"/></td></tr>
										<tr><td align="right" width="50%">Pais: </td><td><input type="text" name="pais" class="fields"<?php if($_POST['pais']!=null)echo 'value="'.$_POST['pais'].'"';?>/></td></tr>
										<tr><td align="right" width="50%">Provincia: </td><td><input type="text" name="provincia" class="fields"<?php if($_POST['provincia']!=null)echo 'value="'.$_POST['provincia'].'"';?>/></td></tr>
										<tr><td align="right" width="50%">Localidad: </td><td><input type="text" name="localidad" class="fields"<?php if($_POST['localidad']!=null)echo 'value="'.$_POST['localidad'].'"';?>/></td></tr>
										<tr><td align="right" width="50%">Direccion: </td><td><input type="text" name="direccion" class="fields"<?php if($_POST['direccion']!=null)echo 'value="'.$_POST['direccion'].'"';?>/></td></tr>
										<tr><td align="right" width="50%">Telefono: </td><td><input type="tel" name="telefono" class="fields"<?php if($_POST['telefono']!=null)echo 'value="'.$_POST['telefono'].'"';?>/></td></tr>
										<tr><td align="right" width="50%">NIF: </td><td><input type="text" name="nif" class="fields"<?php if($_POST['nif']!=null)echo 'value="'.$_POST['nif'].'"';?>/></td></tr>
										<tr><td align="right" width="50%">Contraseña: </td><td><input type="password" name="pass" class="fields"/></td></tr>
										<tr><td align="right" width="50%">Confirmar contraseña: </td><td><input type="password" name="confpass" class="fields"/></td></tr>
										<?php
										$fecha= date ("j-n-Y");
										echo "<tr><td align='right' width='50%'></td><td><input type='text' name='date' value='".$fecha."' class='fields' disabled style='display:none;'/></td></tr>";
										?>
										<tr><td colspan="2" align="center" width="50%"</br></br><input type="submit" value="Registrarse" class="btn" class="fields"/></td></tr>
									</form>
									<tr><td colspan="2" align="center" width="50%"></br><a href="../" class="btn">volver</a></td></tr>
								</table>
							</td></tr></table>
						</div>
					<?php
				}
			}
		?>		
	</body>
</html>