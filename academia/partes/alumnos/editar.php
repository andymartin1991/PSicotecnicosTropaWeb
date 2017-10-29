<?php 
    if($_GET['editado'] == 'si'){
        if($_POST['pass']!= null && $_POST['passconf']!= null ||  $_POST['pass']!= '' && $_POST['passconf']!= ''){
            if($_POST['pass'] == $_POST['passconf']){
                if(editaralu($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['dni'],$_POST['telefono'],$_POST['creacion'],$_POST['caducidad'],$_POST['pass'], $row[3], $row[0]) != null){
                    echo '<font style="color:red;"><b>EDITADO</b></font><br/>';
                }else{
                    echo '<font style="color:red;"><b>Problema al editar alumno</b></font><br/>';
                }
            }else{
                echo '<font style="color:red;"><b>Las contrase&ntilde;as no coinciden</b></font><br/>';
            }
        } else {
            echo '<font style="color:red;"><b>No se realizaron cambios</b></font><br/>';
        }
    }   
?>
<br/>
<table border=0>
	<form action="administracion.php?opt=alumnos&ver=no&anadir=no&editar=si&borrar=no&id=<?php echo $row[0];?>&editado=si" method="post">
    	<tr>
    		<td align="right"><b>Nombre:</b></td>
    		<td align="left"><input type="text" name="nombre" value="<?php if($_POST['nombre'] != null && $_POST['nombre'] != ''){echo $_POST['nombre'];}else echo $row[4];?>"/></td>
    	</tr>
    	<tr>
    		<td align="right"><b>Apellidos:</b></td>
    		<td align="left"><input type="text" name="apellidos" value="<?php if($_POST['apellidos'] != null && $_POST['apellidos'] != ''){echo $_POST['apellidos'];}else echo $row[5];?>"/></td>
    	</tr>
    	<tr>
    		<td align="right"><b>Correo:</b></td>
    		<td align="left"><input type="email" name="email" value="<?php if($_POST['email'] != null && $_POST['email'] != ''){echo $_POST['email'];}else echo $row[1];?>"/></td>
    	</tr>
    	<tr>
    		<td align="right"><b>DNI:</b></td>
    		<td align="left"><input type="text" name="dni" value="<?php if($_POST['dni'] != null && $_POST['dni'] != ''){echo $_POST['dni'];}else echo $row[9];?>"/></td>
    	</tr>
    	<tr>
    		<td align="right"><b>Tel&eacute;fono:</b></td>
    		<td align="left"><input type="tel" name="telefono" value="<?php if($_POST['telefono'] != null && $_POST['telefono'] != ''){echo $_POST['telefono'];}else echo $row[6];?>"/></td>
    	</tr>
    	<tr>
    		<td align="right"><b>Fecha creaci&oacute;n:</b></td>
    		<td align="left"><input type="date" value="<?php if($_POST['creacion'] != null && $_POST['creacion'] != ''){echo $_POST['creacion'];}else echo $row[7];?>" disabled/><input type="date" name="creacion" value="<?php if($_POST['creacion'] != null && $_POST['creacion'] != ''){echo $_POST['creacion'];}else echo $row[7];?>" style="Display:none;"/></td>
    	</tr>
    	<tr>
    		<td align="right"><b>Fecha caducidad:</b></td>
    		<td align="left"><input type="date" name="caducidad" value="<?php if($_POST['caducidad'] != null && $_POST['caducidad'] != ''){echo $_POST['caducidad'];}else echo $row[8];?>"/></td>
    	</tr>
    	<tr>
    		<td align="right"><b>Contrase&ntilde;a:</b></td>
    		<td align="left"><input type="password" name="pass"/></td>
    	</tr>
    	<tr>
    		<td align="right"><b>Confirmar contrase&ntilde;a:</b></td>
    		<td align="left"><input type="password" name="passconf"/></td>
    	</tr>
    	<?php
			echo'
			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
			';
		?>
    	<tr>
    		<td colspan="2" align="center"><input type="submit" value="Editar" class="btn"/></td>
    	</tr>
	</form>
</table>
<br/>
<br/>