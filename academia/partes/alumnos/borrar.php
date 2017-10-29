<?php 
    if($_POST['borrado'] == 'si'){
        if(borrarALU($row[0]) != null){
            echo "<font style='color:red;'><b>borrado</b></font><br/>";
        }
    }else{
?>
<table border=0>
	<tr>
		<td><b>Nombre:</b> <i><?php echo $row[4];?></i></td>
	</tr>
	<tr>
		<td><b>Apellidos:</b> <i><?php echo $row[5];?></i></td>
	</tr>
	<tr>
		<td><b>Correo:</b> <i><?php echo $row[1];?></i></td>
	</tr>
	<tr>
		<td><b>DNI:</b> <i><?php echo $row[9];?></i></td>
	</tr>
	<tr>
		<td><b>Fecha Creaci&oacute;n:</b> <i><?php echo $row[7];?></i></td>
	</tr>
	<tr>
		<td><b>Fecha Caducidad:</b> <i><?php echo $row[8];?></i></td>
	</tr>
	<tr>
		<td><b>Tel&eacute;fono:</b><i> <?php echo $row[6];?></i></td>
	</tr>
</table>
<br/>
&iquest;Seguro que quieres borrar este alumno?
<table>
	<tr>
		<td>
			<form action="administracion.php?opt=alumnos&ver=no&anadir=no&editar=no&borrar=si&id=<?php echo $row[0];?>" method="post">
        		<?php
        			echo'
        			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
        			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
        			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
		            <input type="text" name="borrado" value="si" style="Display:none;"/>
        			';
        		?>
    			<input type="submit" value="SI" class="btn" style="width:100px;"/>
    		</form>
		</td>
		<td>
			<form action="administracion.php?opt=alumnos" method="post">
    			<?php
        			echo'
        			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
        			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
        			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
        			';
    		     ?>
    		     <input type="submit" value="NO" class="btn" style="width:100px;"/>
    		</form>
		</td>
	</tr>
</table>
<?php 
    }
?>