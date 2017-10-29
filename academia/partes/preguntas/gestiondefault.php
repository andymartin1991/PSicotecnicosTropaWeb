<table border=0 width="95%" style="min-width: 700px;" align="center">
	<tr>
		<td align="left">
        	<p>
        		<?php
    				echo '<form action="administracion.php?opt=preguntas&tipo='.$_GET['tipo'].'&ver=no&anadir=si&editar=no&borrar=no" method="post" style="margin-bottom:0px;">
    					<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
    					<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
    					<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
    					<input type="submit" value="A&ntilde;adir pregunta" class="btn">
    				</form>';
        		?>
        	</p>
		</td>
		<td align="right">
			<?php
				echo '<form action="administracion.php?opt=preguntas&tipo='.$_GET['tipo'].'" method="post" style="margin-bottom:0px;">
					<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
					<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
					<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
					Introduce ID Pregunta: <input type="text" name="id" value="'.$_POST['dni'].'"/>
					<input type="submit" value="Buscar" class="btn">
				</form>';
    		?>
		</td>
	</tr>
</table>

<table border=1 style="border: 1px solid #000; border-collapse: collapse; min-width: 700px;"  align="center">
	<tr bgcolor="#585858" width="100%">
		<td align="center"><b class="blanco">ID Pregunta</b></td>
		<td align="center"><b class="blanco">Fecha creaci&oacute;n</b></td>
		<td align="center"><b class="blanco">&Uacute;ltima modificaci&oacute;n</b></td>
		<td colspan="3" align="center"><b class="blanco">Acciones</b></td>
	</tr> 
    <!-- 	   
        0 -- verbal
        1 -- numerico
        2 -- espacial
        3 -- mecanico
        4 -- perceptiva
        5 -- memoria
        6 -- abstracto 
    -->
	<?php 
	   if($_GET['tipo'] != null || $_GET['tipo'] != ''){
	       $tipo = null;
	       switch($_GET['tipo']){
	           case 'verbal': $tipo = 0;
	               break;
	           case 'numerico': $tipo = 1;
	               break;
	           case 'espacial': $tipo = 2;
	               break;
	           case 'mecanico': $tipo = 3;
	               break;
	           case 'perceptiva': $tipo = 4;
	               break;
	           case 'memoria': $tipo = 5;
	               break;
	           case 'abstracto': $tipo = 6;
	               break;
	       }
	       $result = test($id,$tipo);
	       if($result != null){
    	       while ($row = mysql_fetch_row($result)){
    	           include 'tabla.php';
    	       }
	       }
	       echo '</table>';
	   }else{
	       echo '</table>';
	   }
	?>