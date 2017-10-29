<?php
echo '<tr><td align="center">'.$row[4].'</td>
	<td align="center">'.$row[5].'</td>
	<td align="center">'.$row[1].'</td>
	<td align="center">'.$row[7].'</td>
	<td align="center">'.$row[8].'</td>
	<td align="center" valign="center">
		<form action="administracion.php?opt=alumnos&ver=si&anadir=no&editar=no&borrar=no&id='.$row[0].'" method="post">
			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
			<input type="submit" value="Ver" class="btn">
		</form>
	</td>
	<td align="center" valign="center">
		<form action="administracion.php?opt=alumnos&ver=no&anadir=no&editar=si&borrar=no&id='.$row[0].'" method="post">
			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
			<input type="submit" value="Editar" class="btn">
		</form>
	</td>
	<td align="center" valign="center">
		<form action="administracion.php?opt=alumnos&ver=no&anadir=no&editar=no&borrar=si&id='.$row[0].'" method="post">
			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
			<input type="submit" value="Borrar" class="btn">
		</form>
	</td></tr>';
?>