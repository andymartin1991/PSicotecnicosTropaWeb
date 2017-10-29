<?php
    $id_test;
    if($_POST['pregunta'] != nul && ($_POST['respuesta'] != null || $_FILES["imgres"]["name"] != null)){
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
        if(insertar_test($tipo, $_POST['pregunta'], $_POST['optA'], $_POST['optB'], $_POST['optC'], $_POST['optD'], $_POST['respuesta'], $_POST['explicacion'], $id) != null){
            $result = sacarid_test($id, $tipo);
            if($result != null){
                while ($row = mysql_fetch_row($result)){
                    $id_test = $row[0];
                }
                $imgpregunta = null;
                $imgA = null;
                $imgB = null;
                $imgC = null;
                $imgD = null;
                $imgres = null;
                $imgexp = null;
                
                mkDirFix ($id);
                if($_FILES["imgpre"]["name"] != null){
                    subir ($id,"pre", $_FILES["imgpre"]["tmp_name"], $_FILES["imgpre"]["name"],$id_test);
                    $imgpregunta = $id.'_'.$id_test.'_pre.'.obtenerExtensionFichero($_FILES["imgpre"]["name"]);
                }
                if($_FILES["imgA"]["name"] != null){
                    subir ($id,"optA", $_FILES["imgA"]["tmp_name"], $_FILES["imgA"]["name"],$id_test);
                    $imgA = $id.'_'.$id_test.'_optA.'.obtenerExtensionFichero($_FILES["imgA"]["name"]);
                }
                if($_FILES["imgB"]["name"] != null){
                    subir ($id,"optB", $_FILES["imgB"]["tmp_name"], $_FILES["imgB"]["name"],$id_test);
                    $imgB = $id.'_'.$id_test.'_optB.'.obtenerExtensionFichero($_FILES["imgB"]["name"]);
                }
                if($_FILES["imgC"]["name"] != null){
                    subir ($id,"optC", $_FILES["imgC"]["tmp_name"], $_FILES["imgC"]["name"],$id_test);
                    $imgC = $id.'_'.$id_test.'_optC.'.obtenerExtensionFichero($_FILES["imgC"]["name"]);
                }
                if($_FILES["imgD"]["name"] != null){
                    subir ($id,"optD", $_FILES["imgD"]["tmp_name"], $_FILES["imgD"]["name"],$id_test);
                    $imgD = $id.'_'.$id_test.'_optD.'.obtenerExtensionFichero($_FILES["imgD"]["name"]);
                }
                if($_FILES["imgexpl"]["name"] != null){
                    subir ($id,"exp", $_FILES["imgexpl"]["tmp_name"], $_FILES["imgexpl"]["name"],$id_test);
                    $imgexp = $id.'_'.$id_test.'_exp.'.obtenerExtensionFichero($_FILES["imgexpl"]["name"]);
                }
                if(editarinsercion_test($imgpregunta,$imgA,$imgB,$imgC,$imgD,$imgexp,$id,$tipo,$id_test) != null ){
                    echo '<p align="center"><font style="color:red;">INSERTADO</font></p>';
                    include 'ver.php';
                    echo '<br/><br/>';
                }else{
                    //borrar la pregunta insertada si ubiera algun error, en principio no necesario
                }
            }else{
                //borrar la pregunta insertada si ubiera algun error, en principio no necesario
            }
        }
    }else{
        echo '<p><font style="color:red;"><b>NOTA: </b>La pregunta y la respuesta han de ser obligatoria. En el apartado de explicaci&oacute;n puedes a&ntilde;adir notas y explicaciones.</font></p>';
    }
?>

<font style="color:red;"><b>Nueva pregunta:</b></font><br/><br/>
<table border=0 align="center">
	<form data-ajax="false" enctype="multipart/form-data" action="administracion.php?opt=preguntas&tipo=<?php echo $_GET['tipo'];?>&ver=no&anadir=si&editar=no&borrar=no" method="post">
		<tr><td colspan="2"><hr/></td></tr>
    	<tr>
    		<td align="center" valign="top">Pregunta:</td>
    		<td align="center"><textarea name="pregunta" rows="3" cols="100"></textarea><br/><output id="prel"></output><br/><input type="file" name="imgpre" id="pre"/></td>
    	</tr>
    	<tr><td colspan="2"><hr/></td></tr>
    	<tr>
    		<td align="center" valign="top">A)</td>
    		<td align="center"><textarea name="optA" rows="3" cols="100"></textarea><br/><output id="opAl"></output><br/><input type="file" name="imgA" id="opA"/></td>
    	</tr>
    	<tr><td colspan="2"><hr/></td></tr>
    	<tr>
    		<td align="center" valign="top">B)</td>
    		<td align="center"><textarea name="optB" rows="3" cols="100"></textarea><br/><output id="opBl"></output><br/><input type="file" name="imgB" id="opB"/></td>
    	</tr>
    	<tr><td colspan="2"><hr/></td></tr>
    	<tr>
    		<td align="center" valign="top">C)</td>
    		<td align="center"><textarea name="optC" rows="3" cols="100"></textarea><br/><output id="opCl"></output><br/><input type="file" name="imgC" id="opC"/></td>
    	</tr>
    	<tr><td colspan="2"><hr/></td></tr>
    	<tr>
    		<td align="center" valign="top">D)</td>
    		<td align="center"><textarea name="optD" rows="3" cols="100"></textarea><br/><output id="opDl"></output><br/><input type="file" name="imgD" id="opD"/></td>
    	</tr>
    	<tr><td colspan="2"><hr/></td></tr>
    	<tr>
    		<td align="center" valign="center">Respuesta:</td>
    		<td align="center"><br/><br/>
                <input type="radio" name="respuesta" value="a"> A)
                <input type="radio" name="respuesta" value="b"> B)
                <input type="radio" name="respuesta" value="c"> C)
                <input type="radio" name="respuesta" value="d"> D)
            <br/><br/></td>
    	</tr>
    	<tr><td colspan="2"><hr/></td></tr>
    	<tr>
    		<td align="center" valign="top">Explicaci&oacute;n:</td>
    		<td align="center"><textarea name="explicacion" rows="3" cols="100"></textarea><br/><output id="expl"></output><br/><input type="file" name="imgexpl" id="exp"/></td>
    	</tr>
    	<?php 
            echo '
            <input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
    	    <input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
	        <input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
            ';
    	?>
    	<tr><td colspan="2"><hr/></td></tr>
    	<tr>
    		<td><input type="submit" value="Registrar" class="btn"/></td>
	</form>
	<?php $tipoo = $_GET['tipo']?>
		<td align="right"></br><?php echo'
			<form action="administracion.php?opt=preguntas&tipo='.$tipoo.'&ver=no&anadir=si&editar=no&borrar=no" method="post">
				<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
				<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
				<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
				<input type="submit" value="Limpiar" class="btn"/><br/>
			</form>';?>
		</td>
	</tr>
</table>
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
                 document.getElementById("prel").innerHTML = ['<img style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
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
                 document.getElementById("opAl").innerHTML = ['<img style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
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
                 document.getElementById("opBl").innerHTML = ['<img style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
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
                 document.getElementById("opCl").innerHTML = ['<img style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
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
                 document.getElementById("opDl").innerHTML = ['<img style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
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
                 document.getElementById("expl").innerHTML = ['<img style="height: 200px; border: 1px solid #000;margin: 10px 5px 0 0;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
     
            reader.readAsDataURL(f);
          }
      }
      

      document.getElementById('exp').addEventListener('change', exp, false);
      document.getElementById('opD').addEventListener('change', opD, false);
      document.getElementById('opC').addEventListener('change', opC, false);
      document.getElementById('opB').addEventListener('change', opB, false);
      document.getElementById('opA').addEventListener('change', opA, false);
      document.getElementById('pre').addEventListener('change', pre, false);
</script>