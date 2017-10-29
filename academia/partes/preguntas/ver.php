
<?php
$result = null;
if($_GET['id_test'] != null || $_GET['id_test'] != ''){
    $result = testver($_GET['id_test']);
}else if($id_test != null || $id_test != ''){
    $result = testver($id_test);
}
if($result != null){
while ($row = mysql_fetch_row($result)){

?>
<p><b>ID de pregunta:</b>&nbsp;<i><?php echo $row[0];?></i>&nbsp;&nbsp;-&nbsp;&nbsp;
<b>Fecha de creaci&oacute;n:</b>&nbsp;<i><?php echo $row[15];?></i>&nbsp;&nbsp;-&nbsp;&nbsp;
<b>Ultima modificaci&oacute;n:</b>&nbsp;<i><?php if($row[18] == null || $row[18] == '' || $row[18] == '0000-00-00'){
        echo 'NUNCA';
    }else{
        echo $row[18];
    }?></i></p>
<table border=0 bgcolor="#fff" style="border: 0px solid #000; border-collapse: collapse;" align="center">
	<?php if($row[2]!= null || $row[2] !=''){?><tr>
		<td align="right"><b>Pregunta:</b></td><td align="left"><i><?php echo $row[2];?></i></td>
	</tr><?php }?>
	<?php if($row[3]!= null || $row[3] !=''){?><tr>
		<td align="right"></td><td align="left"><i><img src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[3];?>" style="max-width: 200px"/></i></td>
	</tr><?php }?>
	<?php if($row[4]!= null || $row[4] !=''){if($row[17] == 'a'){echo '<tr bgcolor="#A9F5BC">';}else{echo '<tr>';}?>
		<td align="right"><b>A):</b></td><td align="left"><i><?php echo $row[4];?></i></td>
	</tr><?php }?>
	<?php if($row[9]!= null || $row[9] !=''){if($row[17] == 'a'){echo '<tr bgcolor="#A9F5BC">';}else{echo '<tr>';}?>
		<td align="right"><b>A)</b></td><td align="left"><i><img src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[9];?>" style="max-width: 200px"/></i></td>
	</tr><?php }?>
	<?php if($row[5]!= null || $row[5] !=''){if($row[17] == 'b'){echo '<tr bgcolor="#A9F5BC">';}else{echo '<tr>';}?>
		<td align="right"><b>B):</b></td><td align="left"><i><?php echo $row[5];?></i></td>
	</tr><?php }?>
	<?php if($row[10]!= null || $row[10] !=''){if($row[17] == 'b'){echo '<tr bgcolor="#A9F5BC">';}else{echo '<tr>';}?>
		<td align="right"><b>B)</b></td><td align="left"><i><img src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[10];?>" style="max-width: 200px"/></i></td>
	</tr><?php }?>
	<?php if($row[6]!= null || $row[6] !=''){if($row[17] == 'c'){echo '<tr bgcolor="#A9F5BC">';}else{echo '<tr>';}?>
		<td align="right"><b>C):</b></td><td align="left"><i><?php echo $row[6];?></i></td>
	</tr><?php }?>
	<?php if($row[11]!= null || $row[11] !=''){if($row[17] == 'c'){echo '<tr bgcolor="#A9F5BC">';}else{echo '<tr>';}?>
		<td align="right"><b>C)</b></td><td align="left"><i><img src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[11];?>" style="max-width: 200px"/></i></td>
	</tr><?php }?>
	<?php if($row[7]!= null || $row[7] !=''){if($row[17] == 'd'){echo '<tr bgcolor="#A9F5BC">';}else{echo '<tr>';}?>
		<td align="right"><b>D):</b></td><td align="left"><i><?php echo $row[7];?></i></td>
	</tr><?php }?>
	<?php if($row[12]!= null || $row[12] !=''){if($row[17] == 'd'){echo '<tr bgcolor="#A9F5BC">';}else{echo '<tr>';}?>
		<td align="right"><b>D)</b></td><td align="left"><i><img src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[12];?>" style="max-width: 200px"/></i></td>
	</tr><?php }?>
	
	<?php if($row[8]!= null || $row[8] !=''){?><tr>
		<td align="right"><b>Explicaci&oacute;n:</b></td><td align="left"><i><?php echo $row[8];?></i></td>
	</tr><?php }?>
	<?php if($row[13]!= null || $row[13] !=''){?><tr>
		<td align="right"><b>Imagen explicaci&oacute;n)</b></td><td align="left"><i><img src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[13];?>" style="max-width: 200px"/></i></td>
	</tr><?php }?>
</table>
<br/>
<?php if($_GET['borrar'] == 'si'){?>
<div align="center">
	&iquest;Seguro que quieres borrar este alumno?
    <table border = 0>
    	<tr>
    		<td>
    		<?php 
                $tipo = null;
                switch($row[1]){
                   case '0': $tipo = verbal;
                       break;
                   case '1': $tipo = numerico;
                       break;
                   case '2': $tipo = espacial;
                       break;
                   case '3': $tipo = mecanico;
                       break;
                   case '4': $tipo = perceptiva;
                       break;
                   case '5': $tipo = memoria;
                       break;
                   case '6': $tipo = abstracto;
                       break;
                }
	       ?>
    			<form action="administracion.php?opt=preguntas&tipo=<?php echo $tipo;?>&borrado=si&id_test=<?php echo $row[0];?>" method="post">
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
    			<form action="administracion.php?opt=preguntas&tipo=<?php echo $tipo;?>" method="post">
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
</div>
<?php 
 }
    }
}
?>