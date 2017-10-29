<?php
	if($_GET['opt'] == 'alumnos'){
		include 'alumnos/gestionalumnos.php';
	}else if($_GET['opt'] == 'preguntas'){
		include 'preguntas/gestionpreguntas.php';
	}
	
	if($_GET['opt'] == ''){
?>
		
<br/>
<h2>Bienvenido</h2>
<?php 
	}
?>
<table border=0>
	<tr>
		<td>
			<?php
				if($_GET['opt'] == ''){
				    echo '<div class="box" align="center">';
					echo '
						<form action="administracion.php?opt=alumnos" method="post">
							<input type="text" name="correo" value="'.$_POST['correo'].'" style="display:none;"/>
							<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="display:none;"/>
							<input type="text" name="opt" value="'.$_POST['opt'].'" style="display:none;"/>
							<input type="submit" value="" class="btnredondo" style="background-image: url(../img/Administracion-alumnos.png);"><br/>
						</form>
						';
					echo'
						<p><h3>Administrar alumnos</h3></p>
		                </div>	    
						';
					
					echo '<div class="box" align="center">';
					echo '
						<form action="administracion.php?opt=preguntas" method="post">
							<input type="text" name="correo" value="'.$_POST['correo'].'" style="display:none;"/>
							<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="display:none;"/>
							<input type="text" name="opt" value="'.$_POST['opt'].'" style="display:none;"/>
							<input type="submit" value="" class="btnredondo" style="background-image: url(../img/Administracion-preguntas.png);"><br/>
						</form>
						';
					echo '<p><h3>Administrar preguntas</h3></p>';
					echo '</div>';
				}
		     ?>
		</td>
	</tr>
	<tr>
		<td align="centre">
			<?php
				if($_GET['opt'] == 'alumnos'){
					if($_GET['ver'] == si || $_GET['editar'] == si || $_GET['borrar'] == si || $_GET['anadir'] == si){
						echo '
						<form action="administracion.php?opt=alumnos" method="post" align="center">
							<input type="text" name="correo" value="'.$_POST['correo'].'" style="display:none;"/>
							<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="display:none;"/>
							<input type="text" name="opt" value="'.$_POST['opt'].'" style="display:none;"/>
							<input type="submit" value="Volver" class="btn"><br/>
						</form>
						';
					}else{
						echo '
							<form action="administracion.php" method="post" align="center">
								<input type="text" name="correo" value="'.$_POST['correo'].'" style="display:none;"/>
								<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="display:none;"/>
								<input type="text" name="opt" value="'.$_POST['opt'].'" style="display:none;"/>
								<input type="submit" value="Volver" class="btn"><br/>
							</form>
							';
					}
				}
				if($_GET['opt'] == 'preguntas' && $_GET['tipo'] != null){
				    if($_GET['anadir'] == 'si' || $_GET['ver'] == 'si'){
				        echo '
				        <form action="administracion.php?opt=preguntas&tipo='.$_GET['tipo'].'" method="post" align="center">
				            <input type="text" name="correo" value="'.$_POST['correo'].'" style="display:none;"/>
				            <input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="display:none;"/>
			                <input type="text" name="opt" value="'.$_POST['opt'].'" style="display:none;"/>
                            <input type="submit" value="Volver" class="btn"><br/>
	                    </form>
				        ';
				    }else{
				    echo '
    						<form action="administracion.php?opt=preguntas" method="post" align="center">
    							<input type="text" name="correo" value="'.$_POST['correo'].'" style="display:none;"/>
    							<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="display:none;"/>
    							<input type="text" name="opt" value="'.$_POST['opt'].'" style="display:none;"/>
    							<input type="submit" value="Volver" class="btn"><br/>
    						</form>
    						';
				    }
				}else if($_GET['opt'] == 'preguntas'){
				    echo '
							<form action="administracion.php" method="post" align="center">
								<input type="text" name="correo" value="'.$_POST['correo'].'" style="display:none;"/>
								<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="display:none;"/>
								<input type="text" name="opt" value="'.$_POST['opt'].'" style="display:none;"/>
								<input type="submit" value="Volver" class="btn"><br/>
							</form>
							';
				}
			?>
		</td>
	</tr>
</table>