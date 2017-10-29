<?php
	$email = $_POST['email'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
	$creacion = $_POST['creacion'];
	$caducidad = $_POST['caducidad'];
	$dni = $_POST['dni'];
	$contrasenia = $_POST['pass'];
	
	if($_POST['pass'] != $_POST['passrep']){
		echo '<font style="color:red;"><b>Las contraseñas no coinciden</b></font><br/>';
		$contrasenia = null;
	}

	if($email != null && $nombre != null && $apellidos != null && $telefono != null && $creacion != null && $caducidad != null && $dni != null && $contrasenia != null){
		echo '<font style="color:red;"><b>Insertado</b></font><br/>';
		if(insertar_usuario($email,$nombre,$apellidos,$telefono,$creacion,$caducidad,$dni,$contrasenia,$id) != null){
			$_GET['limpiar'] = 'si';
		}
	}else{
		echo '<font style="color:red;"><b>Hay campos sin completa</b></font><br/>';
	}
	
	if($_GET['limpiar'] == 'si'){
		$email = null;
		$nombre = null;
		$apellidos = null;
		$telefono = null;
		$creacion = null;
		$caducidad = null;
		$dni = null;
		$contrasenia = null;
	}
?>
<table border=0>
	<form action="administracion.php?opt=alumnos&ver=no&anadir=si&editar=no&borrar=no" method="post">
		<tr>
			<td>Correo: </td>
			<td><input type="email" name="email" value="<?php if($email != null) echo $email;?>"/></td>
		</tr>
		<tr>
			<td>Nombre: </td>
			<td><input type="text" name="nombre" value="<?php if($nombre != null) echo $nombre;?>"/></td>
		</tr>
		<tr>
			<td>Apellidos: </td>
			<td><input type="text" name="apellidos" value="<?php if($apellidos != null) echo $apellidos;?>"/></td>
		</tr>
		<tr>
			<td>Telefono</td>
			<td><input type="tel" name="telefono" value="<?php if($telefono != null) echo $telefono;?>"/></td>
		</tr>
		<tr>
			<td>Fecha creaccion:</td>
			<td>
			<input type="text" name="creacion" value="<?php echo date("Y-n-j"); ?>" disabled/>
			<input type="text" name="creacion" value="<?php echo date("Y-n-j"); ?>" style="display:none;"/>
			</td>
		</tr>
		<tr>
			<td>Fecha caducidad:</td>
			<td><input type="date" name="caducidad" value="<?php if($caducidad != null) echo $caducidad;?>"/></td>
		</tr>
		<tr>
			<td>DNI:</td>
			<td><input type="text" name="dni" value="<?php if($dni != null) echo $dni;?>"/></td>
		</tr>
		<tr>
			<td>Contraseña</td>
			<td><input type="password" name="pass"/></td>
		</tr>
		<tr>
			<td>Confirmar contraseña</td>
			<td><input type="password" name="passrep"/></td>
		</tr>
		<?php
			echo'
			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
			';
		?>
		<tr>
			<td><input type="submit" value="Registrar" class="btn"/></td></form>
			<td align="right"></br><?php echo'
				<form action="administracion.php?opt=alumnos&ver=no&anadir=si&editar=no&borrar=no&limpiar=si" method="post">
					<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
					<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
					<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
					<input type="submit" value="Limpiar" class="btn"/><br/>
				</form>';?>
			</td>
		</tr>
</table>