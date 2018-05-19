<?php
$result = null;
if($_GET['id_test'] != null || $_GET['id_test'] != ''){
    $result = testver($_GET['id_test']);
}else if($id_test != null || $id_test != ''){
    $result = testver($id_test);
}
if($result != null){
while ($row = mysql_fetch_row($result)){
    
    $correcta = 0;

?>
<p><b>ID de pregunta:</b>&nbsp;<i><?php echo $row[0];?></i>&nbsp;&nbsp;-&nbsp;&nbsp;
<b>Fecha de creaci&oacute;n:</b>&nbsp;<i><?php echo $row[15];?></i>&nbsp;&nbsp;-&nbsp;&nbsp;
<b>Ultima modificaci&oacute;n:</b>&nbsp;<i><?php if($row[16] == null || $row[16] == '' || $row[16] == '0000-00-00'){
        echo '<label id="fechamod">NUNCA</label>';
    }else{
        echo '<label id="fechamod">'.$row[16].'</label>';
        
    }?></i></p>
    <form data-ajax="false" enctype="multipart/form-data" action="administracion.php?opt=preguntas&tipo=<?php echo $_GET['tipo'];?>&ver=no&anadir=no&editar=si&borrar=no&default=yes" method="post">
        <input type="hidden" id="fechaput" name ="fechaput" value="<?php echo $row[16];?>"></input>
        <input type="hidden" id="id" name ="id" value ="<?php echo $row[0];?>"></input>
        <input type="hidden" id="pre_php_js"  name="pre_php_js" value="<?php echo $row[3];?>"></input>
		<input type="hidden" id="a_php_js"    name="a_php_js" value="<?php echo $row[9];?>"></input>
		<input type="hidden" id="b_php_js"    name="b_php_js" value="<?php echo $row[10];?>"></input>
		<input type="hidden" id="c_php_js"    name="c_php_js" value="<?php echo $row[11];?>"></input>
		<input type="hidden" id="d_php_js"    name="d_php_js" value="<?php echo $row[12];?>"></input>
		<input type="hidden" id="sol_php_js"  name="sol_php_js" value="<?php echo $row[13];?>"></input>
		<!-- <input type="hidden" id="name_php_js"  name="name_php_js" value="<?//php echo $row[14];?>"></input>-->
		
		<table id="tabla_mod" border=0 bgcolor="#fff" style="border: 0px solid #000; border-collapse: collapse;" align="center">
        	<!-- Texto de pregunta -->
        	<?php if($row[2]!= null || $row[2] !=''){?><tr>
        		<td align="right"><b>Pregunta:</b></td><td align="left"><i><textarea id="mod_pregunta" rows="3" cols="100" name="pregunta"><?php echo $row[2];?></textarea></i></td>
        	</tr><?php }else{?>
        	<td align="right"></td><td align="left"><i><textarea id="mod_pregunta" rows="3" cols="100" name="pregunta"></textarea></i></td>
        	</tr><?php }?>
        	
        	<!-- Imagen de pregunta -->
        	<?php if($row[3]!= null || $row[3] !=''){?><tr>
        		<td align="right"></td><td align="center"><i><img id="prelO" src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[3];?>" style="max-width: 200px"/></i></td>
        	</tr><?php }?>
        	<tr><td></td>
        		<td align="center">
        			<input type="file" name="preguntaIMG" id="preguntaIMG">
        		</td>
        	</tr>
        	<!-- <tr>
        		<td colspan ="2" align="center">
        			<output id="prel"></output><br/><input type="file" name="imgpre" id="pre"><br/><label class="btn">Quitar</label><?php //if($row[3] != null) echo "<br/><label class='btn'>Original</label>"; ?><hr/>
        		</td>
        	</tr>-->
        	
        	
        	
    
    
    
    
        	
        	<!-- Texto respuesta A -->
        	<?php if($row[4]!= null || $row[4] !=''){if($row[17] == 'a'){echo '<tr>'; $correcta = 1;}else{echo '<tr>';}?>
        		<td align="right"><b>A):</b></td><td align="left"><i><textarea id="mod_textoA" rows="3" cols="100" name="a"><?php echo $row[4];?></textarea></i></td>
        	</tr><?php }else{?>
        	<td align="right"><b>A):</b></td><td align="left"><i><textarea id="mod_textoA" rows="3" cols="100" name="a"></textarea></i></td>
        	</tr><?php }?>
        	
        	<!-- Imagen de respuesta A -->
        	<?php if($row[9]!= null || $row[9] !=''){if($row[17] == 'a'){echo '<tr>'; $correcta = 1;}else{echo '<tr>';}?>
        		<td align="right"></td><td align="center"><i><img id ="opAlO" src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[9];?>" style="max-width: 200px"/></i></td>
        	</tr><?php }?>
        	<tr><td></td>
        		<td align="center">
        			<input type="file" name="aIMG" id="aIMG">
        		</td>
        	</tr>
        	<!-- <tr>
        		<td colspan ="2" align="center">
        			<output id="opAl"></output><br/><input type="file" name="imgA" id="opA"/><br/><label class="btn">Quitar</label><?php //if($row[9] != null) echo "<br/><label class='btn'>Original</label>"; ?><hr/>
        		</td>
        	</tr>--!
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	<!-- Texto respuesta B -->
        	<?php if($row[5]!= null || $row[5] !=''){if($row[17] == 'b'){echo '<tr>'; $correcta = 2;}else{echo '<tr>';}?>
        		<td align="right"><b>B):</b></td><td align="left"><i><textarea id="mod_textoB" rows="3" cols="100" name="b"><?php echo $row[5];?></textarea></i></td>
        	</tr><?php }else{?>
        	<td align="right"><b>B):</b></td><td align="left"><i><textarea id="mod_textoB" rows="3" cols="100" name="b"></textarea></i></td>
        	</tr><?php }?>
        	
        	<!-- Imagen de respuesta B -->
        	<?php if($row[10]!= null || $row[10] !=''){if($row[17] == 'b'){echo '<tr>'; $correcta = 2;}else{echo '<tr>';}?>
        		<td align="right"></td><td align="center"><i><img id="opBlO" src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[10];?>" style="max-width: 200px"/></i></td>
        	</tr><?php }?>
        	<tr><td></td>
        		<td align="center">
        			<input type="file" name="bIMG" id="bIMG">
        		</td>
        	</tr>
        	<!-- <tr>
        		<td colspan ="2" align="center">
        			<output id="opBl"></output><br/><input type="file" name="imgB" id="opB"/><br/><label class="btn">Quitar</label><?php //if($row[10] != null) echo "<br/><label class='btn'>Original</label>"; ?><hr/>
        		</td>
        	</tr>-->
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	<!-- Texto respuesta C -->
        	<?php if($row[6]!= null || $row[6] !=''){if($row[17] == 'c'){echo '<tr>'; $correcta = 3;}else{echo '<tr>';}?>
        		<td align="right"><b>C):</b></td><td align="left"><i><textarea id="mod_textoC" rows="3" cols="100" name="c"><?php echo $row[6];?></textarea></i></td>
        	</tr><?php }else{?>
        	<td align="right"><b>C):</b></td><td align="left"><i><textarea id="mod_textoC" rows="3" cols="100" name="c"></textarea></i></td>
        	</tr><?php }?>
        	
        	<!-- Imagen de respuesta C -->
        	<?php if($row[11]!= null || $row[11] !=''){if($row[17] == 'c'){echo '<tr>'; $correcta = 3;}else{echo '<tr>';}?>
        		<td align="right"></td><td align="center"><i><img id="opClO" src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[11];?>" style="max-width: 200px"/></i></td>
        	</tr><?php }?>
        	<tr><td></td>
        		<td align="center">
        			<input type="file" name="cIMG" id="cIMG">
        		</td>
        	</tr>
        	<!-- <tr>
        		<td colspan ="2" align="center">
        			<output id="opCl"></output><br/><input type="file" name="imgC" id="opC"/><br/><label class="btn">Quitar</label><?php //if($row[11] != null) echo "<br/><label class='btn'>Original</label>"; ?><hr/>
        		</td>
        	</tr>-->
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	<!-- Texto respuesta D -->
        	<?php if($row[7]!= null || $row[7] !=''){if($row[17] == 'd'){echo '<tr>'; $correcta = 4;}else{echo '<tr>';}?>
        		<td align="right"><b>D):</b></td><td align="left"><i><textarea id="mod_textoD" rows="3" cols="100" name="d"><?php echo $row[7];?></textarea></i></td>
        	</tr><?php }else{?>
        	<td align="right"><b>D):</b></td><td align="left"><i><textarea id="mod_textoD" rows="3" cols="100" name="d"></textarea></i></td>
        	</tr><?php }?>
        	
        	<!-- Imagen de respuesta D -->
        	<?php if($row[12]!= null || $row[12] !=''){if($row[17] == 'd'){echo '<tr>'; $correcta = 4;}else{echo '<tr>';}?>
        		<td align="right"></td><td align="center"><i><img id="opDlO" src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[12];?>" style="max-width: 200px"/></i></td>
        	</tr><?php }?>
        	<tr><td></td>
        		<td align="center">
        			<input type="file" name="dIMG" id="dIMG">
        		</td>
        	</tr>
        	<!-- <tr>
        		<td colspan ="2" align="center">
        			<output id="opDl"></output> <br/><input type="file" name="imgD" id="opD"/><br/><label class="btn">Quitar</label><?php //if($row[12] != null) echo "<br/><label class='btn'>Original</label>"; ?><hr/>
        		</td>
        	</tr>-->
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	<!-- Texto explicacion -->
        	<?php if($row[8]!= null || $row[8] !=''){?><tr>
        		<td align="right"><b>Explicaci&oacute;n:</b></td><td align="left"><i><textarea id="mod_textores" rows="3" cols="100" name="explicacion"><?php echo $row[8];?></textarea></i></td>
        	</tr><?php }else{?>
        	<td align="right"><b>Explicaci&oacute;n:</b></td><td align="left"><i><textarea id="mod_textores" rows="3" cols="100" name="explicacion"></textarea></i></td>
        	</tr><?php }?>
        	
        	<!-- Imagen explicacion -->
        	<?php if($row[13]!= null || $row[13] !=''){?><tr>
        		<td align="right"><b>Imagen explicaci&oacute;n)</b></td><td align="center"><i><img id="explO" src="./../dirAcademias/<?php echo $row[14];?>/<?php echo $row[13];?>" style="max-width: 200px"/></i></td>
        	</tr><?php }?>
        	<tr><td></td>
        		<td align="center">
        			<input type="file" name="explicacionIMG" id="explicacionIMG">
        		</td>
        	</tr>
        	<!-- <tr>
        		<td colspan ="2" align="center">
        			<output id="expl"></output><br/><input type="file" name="imgexpl" id="exp"/><br/><label class="btn">Quitar</label><?php //if($row[13] != null) echo "<br/><label class='btn'>Original</label>"; ?><hr/>
        		</td>
        	</tr>-->
        	
        	
        	
        	
        	
        	
        	<tr>
        		<td colspan="2" align="center">
        			<p>
        				Selecciona la respuesta correcta, por defecto es la marcada:
        			</p>
        			<label>A: </label>
        			<input type="radio" name="correcta" id="a" value="a"<?php if ($correcta == 1){?> checked="checked"<?php }?>>
                    &nbsp;&nbsp;&nbsp;
                    <label>B: </label>
                    <input type="radio" name="correcta" id="b" value="b" <?php if ($correcta == 2){?> checked="checked"<?php }?>>
                    &nbsp;&nbsp;&nbsp;
                    <label>C: </label>
                    <input type="radio" name="correcta" id="c" value="c" <?php if ($correcta == 3){?> checked="checked"<?php }?>>
                    &nbsp;&nbsp;&nbsp;
                    <label>D: </label>
                    <input type="radio" name="correcta" id="d" value="d" <?php if ($correcta == 4){?> checked="checked"<?php }?>>
                    
        		</td>
        	</tr>
        	

        </table>
		
		
		
		
        <table id="tabla_rev" border=0 bgcolor="#fff" style="border: 0px solid #000; border-collapse: collapse; display:none;" align="center">
        	
			<tr>
        		<td align="right" valign="top">
        			<b>Pregunta:</b>
        		</td>
        		<td>
        			<p><label id="rev_pregunta"></label></p>
					<p><label id="rev_preguntaimg"></label></p>
        		</td>
        	</tr>
			<tr id="verdea">
				<td align="right" valign="center">
					<b>A:</b>
				</td>
				<td>
					<p><label id="rev_textoA"></label></p>
					<p><label id="rev_textoAimg"></label></p>
				</td>
			</tr>
			<tr id="verdeb">
				<td align="right" valign="center">
					<b>B:</b>
				</td>
				<td>
					<p><label id="rev_textoB"></label></p>
					<p><label id="rev_textoBimg"></label></p>
					
				</td>
			</tr>
			<tr id="verdec">
				<td align="right" valign="center">
					<b>C:</b>
				</td>
				<td>
					<p><label id="rev_textoC"></label></p>
					<p><label id="rev_textoCimg"></label></p>
				</td>
			</tr>
			<tr id="verded">
				<td align="right" valign="center">
					<b>D:</b>
				</td>
				<td>
					<p><label id="rev_textoD"></label></p>
					<p><label id="rev_textoDimg"></label></p>
				</td>
			</tr>
			<tr>
				<td align="right" valign="top">
					<b>Explicaci&oacute;n:</b>
				</td>
				<td>
					<p><label id="rev_textores"></label></p>
					<p><label id="rev_textoresimg"></label></p>
				</td>
			</tr>
        </table>
        <br/>
        <div width="100%" align="center">
        	<?php
    			echo'
    			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
    			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
    			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
    			';
    	     ?>	
            <input type="submit" id="insertar_mod" value="Modificar" class="btn manita" style="display:none"/>
            <label class="btn" id="insertar_rev" onclick="modificar()">Modificar</label>
            <p id="volver_pre_rev" style="display:none;"><br/><br/><label class="btn" onclick="volver()">Volver</label></p>
        </div>
	</form>
	
<br/>


<?php 
    }
}
?>

<script>
	function pre(evt) {
	  var files = evt.target.files; // FileList object

	  // Obtenemos la imagen del campo "file".
	  for (var i = 0, f; f = files[i]; i++) {
		//Solo admitimos imágenes.
		if (!f.type.match('image.*')) {
			continue;
		}

		var reader = new FileReader();

		reader.onload = (function(theFile) {
			return function(e) {
			  // Insertamos la imagen
				document.getElementById("prel").innerHTML = ['<img id="prel1" style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/><br/>'].join('');
				if(document.getElementById("prelO")) {
					document.getElementById('prelO').style.display = 'none';
				}
			 };
		})(f);

		reader.readAsDataURL(f);
	  }
	}

	function opA(evt) {
	  var files = evt.target.files; // FileList object

	  // Obtenemos la imagen del campo "file".
	  for (var i = 0, f; f = files[i]; i++) {
		//Solo admitimos imágenes.
		if (!f.type.match('image.*')) {
			continue;
		}

		var reader = new FileReader();

		reader.onload = (function(theFile) {
			return function(e) {
			  // Insertamos la imagen
				document.getElementById("opAl").innerHTML = ['<img id="opAl1" style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/><br/>'].join('');
				if(document.getElementById("opAlO")) {
					document.getElementById('opAO').style.display = 'none';
				}
			};
		})(f);

		reader.readAsDataURL(f);
	  }
	}

	function opB(evt) {
	  var files = evt.target.files; // FileList object

	  // Obtenemos la imagen del campo "file".
	  for (var i = 0, f; f = files[i]; i++) {
		//Solo admitimos imágenes.
		if (!f.type.match('image.*')) {
			continue;
		}

		var reader = new FileReader();

		reader.onload = (function(theFile) {
			return function(e) {
			  // Insertamos la imagen
				document.getElementById("opBl").innerHTML = ['<img id="opBl1" style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/><br/>'].join('');
				if(document.getElementById("opBlO")) {
					document.getElementById('opBlO').style.display = 'none';
				}
			};
		})(f);

		reader.readAsDataURL(f);
	  }
	}

	function opC(evt) {
	  var files = evt.target.files; // FileList object

	  // Obtenemos la imagen del campo "file".
	  for (var i = 0, f; f = files[i]; i++) {
		//Solo admitimos imágenes.
		if (!f.type.match('image.*')) {
			continue;
		}

		var reader = new FileReader();

		reader.onload = (function(theFile) {
			return function(e) {
			  // Insertamos la imagen
				document.getElementById("opCl").innerHTML = ['<img id="opCl1" style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/><br/>'].join('');
				if(document.getElementById("opClO")) {
					document.getElementById('opClO').style.display = 'none';
				}
			};
		})(f);

		reader.readAsDataURL(f);
	  }
	}

	function opD(evt) {
	  var files = evt.target.files; // FileList object

	  // Obtenemos la imagen del campo "file".
	  for (var i = 0, f; f = files[i]; i++) {
		//Solo admitimos imágenes.
		if (!f.type.match('image.*')) {
			continue;
		}

		var reader = new FileReader();

		reader.onload = (function(theFile) {
			return function(e) {
			  // Insertamos la imagen
				document.getElementById("opDl").innerHTML = ['<img id="opDl1" style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/><br/>'].join('');
				if(document.getElementById("opDlO")) {
					document.getElementById('opDlO').style.display = 'none';
				}
			};
		})(f);

		reader.readAsDataURL(f);
	  }
	}

	function exp(evt) {
	  var files = evt.target.files; // FileList object

	  // Obtenemos la imagen del campo "file".
	  for (var i = 0, f; f = files[i]; i++) {
		//Solo admitimos imágenes.
		if (!f.type.match('image.*')) {
			continue;
		}

		var reader = new FileReader();

		reader.onload = (function(theFile) {
			return function(e) {
			  // Insertamos la imagen
				document.getElementById("expl").innerHTML = ['<img id="expl1" style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/><br/>'].join('');
				if(document.getElementById("explO")) {
					document.getElementById('explO').style.display = 'none';
				}
			};
		})(f);

		reader.readAsDataURL(f);
	  }
	}


	/*document.getElementById('exp').addEventListener('change', exp, false);
	document.getElementById('opD').addEventListener('change', opD, false);
	document.getElementById('opC').addEventListener('change', opC, false);
	document.getElementById('opB').addEventListener('change', opB, false);
	document.getElementById('opA').addEventListener('change', opA, false);
	document.getElementById('pre').addEventListener('change', pre, false);*/

	function modificar(){
		var f = new Date();
		var fecha=(f.getFullYear()+'-'+(f.getMonth() +1)+'-'+f.getDate());
		document.getElementById('fechamod').innerHTML = fecha;
	  	document.getElementById("fechaput").value = fecha;
		
		limpiar();
          document.getElementById('insertar_mod').setAttribute("style", "");
          document.getElementById('insertar_rev').setAttribute("style", "display:none;");
        
          document.getElementById('tabla_mod').setAttribute("style", "border: 0px solid #000; border-collapse: collapse; display:none;");
          document.getElementById('tabla_rev').setAttribute("style", "border: 0px solid #000; border-collapse: collapse;");
        
          document.getElementById('volver_pre').setAttribute("style", "display:none;");
          document.getElementById('volver_pre_rev').setAttribute("style", "");
        
          if(document.getElementById('mod_pregunta') != null)document.getElementById('rev_pregunta').innerHTML = document.getElementById('mod_pregunta').value;
          if(document.getElementById('mod_textoA') != null)document.getElementById('rev_textoA').innerHTML = document.getElementById('mod_textoA').value;
          if(document.getElementById('mod_textoB') != null)document.getElementById('rev_textoB').innerHTML = document.getElementById('mod_textoB').value;
          if(document.getElementById('mod_textoC') != null)document.getElementById('rev_textoC').innerHTML = document.getElementById('mod_textoC').value;
          if(document.getElementById('mod_textoD') != null)document.getElementById('rev_textoD').innerHTML = document.getElementById('mod_textoD').value;
          if(document.getElementById('mod_textores') != null)document.getElementById('rev_textores').innerHTML = document.getElementById('mod_textores').value;
          /*
          if(document.getElementById('prelO') != null)document.getElementById('rev_preguntaimg').innerHTML = '<i><img id ="prelO" src="./../dirAcademias/'+document.getElementById('name_php_js').value+'/'+document.getElementById('pre_php_js').value+'" style="max-width: 200px"/></i>';
          if(document.getElementById('opAlO') != null)document.getElementById('rev_textoDimg').innerHTML = '<i><img id ="opAlO" src="./../dirAcademias/'+document.getElementById('name_php_js').value+'/'+document.getElementById('a_php_js').value+'" style="max-width: 200px"/></i>';
          if(document.getElementById('opBlO') != null)document.getElementById('rev_textoAimg').innerHTML = '<i><img id ="opBlO" src="./../dirAcademias/'+document.getElementById('name_php_js').value+'/'+document.getElementById('b_php_js').value+'" style="max-width: 200px"/></i>';
          if(document.getElementById('opClO') != null)document.getElementById('rev_textoBimg').innerHTML = '<i><img id ="opClO" src="./../dirAcademias/'+document.getElementById('name_php_js').value+'/'+document.getElementById('c_php_js').value+'" style="max-width: 200px"/></i>';
          if(document.getElementById('opDlO') != null)document.getElementById('rev_textoCimg').innerHTML = '<i><img id ="opDlO" src="./../dirAcademias/'+document.getElementById('name_php_js').value+'/'+document.getElementById('d_php_js').value+'" style="max-width: 200px"/></i>';
          if(document.getElementById('explO') != null)document.getElementById('rev_textoresimg').innerHTML = '<i><img id ="explO" src="./../dirAcademias/'+document.getElementById('name_php_js').value+'/'+document.getElementById('sol_php_js').value+'" style="max-width: 200px"/></i>';
          
          if(document.getElementById('prel1') != null)document.getElementById('rev_preguntaimg').innerHTML = '<i><img id ="prelO" src="'+document.getElementById('prel1').getAttribute("src")+'" style="max-width: 200px"/></i>';
          if(document.getElementById('opAl1') != null)document.getElementById('rev_textoAimg').innerHTML = '<i><img id ="opAlO" src="'+document.getElementById('opAl1').getAttribute("src")+'" style="max-width: 200px"/></i>';
          if(document.getElementById('opBl1') != null)document.getElementById('rev_textoBimg').innerHTML = '<i><img id ="opBlO" src="'+document.getElementById('opBl1').getAttribute("src")+'" style="max-width: 200px"/></i>';
          if(document.getElementById('opCl1') != null)document.getElementById('rev_textoCimg').innerHTML = '<i><img id ="opClO" src="'+document.getElementById('opCl1').getAttribute("src")+'" style="max-width: 200px"/></i>';
          if(document.getElementById('opDl1') != null)document.getElementById('rev_textoDimg').innerHTML = '<i><img id ="opDlO" src="'+document.getElementById('opDl1').getAttribute("src")+'" style="max-width: 200px"/></i>';
          if(document.getElementById('expl1') != null)document.getElementById('rev_textoresimg').innerHTML = '<i><img id ="explO" src="'+document.getElementById('expl1').getAttribute("src")+'" style="max-width: 200px"/></i>';
          */
          if(document.getElementById('a').checked)document.getElementById('verdea').setAttribute("bgcolor","#A9F5BC");
          if(document.getElementById('b').checked)document.getElementById('verdeb').setAttribute("bgcolor","#A9F5BC");
          if(document.getElementById('c').checked)document.getElementById('verdec').setAttribute("bgcolor","#A9F5BC");
          if(document.getElementById('d').checked)document.getElementById('verded').setAttribute("bgcolor","#A9F5BC");

		  
	  }

      function volver(){
          document.getElementById('insertar_mod').setAttribute("style", "display:none;");
          document.getElementById('insertar_rev').setAttribute("style", "");

          document.getElementById('tabla_mod').setAttribute("style", "border: 0px solid #000; border-collapse: collapse;");
          document.getElementById('tabla_rev').setAttribute("style", "border: 0px solid #000; border-collapse: collapse; display:none;");

          document.getElementById('volver_pre').setAttribute("style", "");
          document.getElementById('volver_pre_rev').setAttribute("style", "display:none;");
          
      }
	  
	  function limpiar(){
		document.getElementById('verdea').setAttribute("bgcolor", "#fff");
		document.getElementById('verdeb').setAttribute("bgcolor", "#fff");
		document.getElementById('verdec').setAttribute("bgcolor", "#fff");
		document.getElementById('verded').setAttribute("bgcolor", "#fff");
	  }
</script>

