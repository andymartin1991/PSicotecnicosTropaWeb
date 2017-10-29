<h3>Gesti&oacute;n de alumnos</h3>
<table border=0 width="95%">
	<tr>
		<td align="left">
        	<p>
        		<?php
        			if($_GET['ver'] != si && $_GET['editar'] != si && $_GET['borrar'] != si && $_GET['anadir'] != si){
        				echo '<form action="administracion.php?opt=alumnos&ver=no&anadir=si&editar=no&borrar=no" method="post" style="margin-bottom:0px;">
        					<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
        					<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
        					<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
        					<input type="submit" value="Nuevo alumno" class="btn">
        				</form>';
        			}
        		?>
        	</p>
		</td>
		<td align="right">
			<?php
    			if($_GET['ver'] != si && $_GET['editar'] != si && $_GET['borrar'] != si && $_GET['anadir'] != si){
    				echo '<form action="administracion.php?opt=alumnos" method="post" style="margin-bottom:0px;">
    					<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
    					<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
    					<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
    					Introduce DNI: <input type="text" name="dni" value="'.$_POST['dni'].'"/>
    					<input type="submit" value="Buscar" class="btn">
    				</form>';
    			}
    		?>
		</td>
	</tr>
</table>

<?php
if($_GET['id'] != null && $_GET['id'] != ''){
	
}else{
		if($_GET['anadir'] != 'si'){
?>
<table border=1 style="border: 1px solid #000; border-collapse: collapse;" width="95%">
	<tr bgcolor="#585858">
		<td align="center"><b class="blanco">Nombre</b></td>
		<td align="center"><b class="blanco">Apellidos</b></td>
		<td align="center"><b class="blanco">Correo</b></td>
		<td align="center"><b class="blanco">Alta</b></td>
		<td align="center"><b class="blanco">Caducidad</td>
		<td colspan="3" align="center"><b class="blanco">Acciones</b></td>
	</tr>
<?php
		}
}
	if(alumnos($id,$_POST['dni'])!= null){
		$result = alumnos($id,$_POST['dni']);
		while ($row = mysql_fetch_row($result)){
			if($_GET['ver'] == 'si' && $_GET['id'] == $row[0]){
				include 'ver.php';
				return;
			}else if($_GET['editar'] == 'si' && $_GET['id'] == $row[0]){
				include 'editar.php';
				return;
			}else if($_GET['borrar'] == 'si' && $_GET['id'] == $row[0]){
				include 'borrar.php';
				return;
			}else if($_GET['anadir'] == 'si'){
				include 'anadir.php';
				return;
			}else if($_GET['id'] == null || $_GET['id'] == ''){
				include 'gestionalumnodefault.php';
			}
		}						
	}
	if($_GET['id'] != null && $_GET['id'] != ''){
		
	}else{
		echo '</table>';
	}
?>