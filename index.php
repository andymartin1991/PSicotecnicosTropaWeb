<?php
	include 'funciones/function.php';
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/CSS.css" media="screen" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div class="centrar">
			<?php
				$nologer = false;
				$dentro = true;
				if($_POST['correo'] == '' || $_POST['correo'] == null){
					//echo '<p>Debes introducir su correo </p>';
					$dentro = false;
				}
				if($_POST['contrasenya'] == '' || $_POST['contrasenya'] == null){
					//echo '<p>Debes introducir su contrase&ntilde;a</p>';
					$dentro = false;
				}if($_POST['opt'] == '' || $_POST['opt'] == null){
					//echo '<p>Debes seleccionar su modalidad</p>';
					$dentro = false;
				}if($dentro == true){
				$bool = false;
					if(login($bool)!= null){
						$result = login($bool);
						while ($row = mysql_fetch_row($result)){
							//echo '<p>Academia: '.$row[0].' Usuario: '.$row[2].'</p>';
							if($_POST['opt'] == 'academia'){
								echo '
									<table border=0 width="100%" height="100%">
										<tr>
											<td align="center" valign="center">
												<form action="academia/administracion.php" method="post">
													<input type="text" name="correo" value="'.$row[2].'" style="display:none;"/>
													<input type="text" name="contrasenya" value="'.$row[3].'" style="display:none;"/>
													<input type="text" name="opt" value="'.$_POST['opt'].'" style="display:none;"/>
													<input type="submit" value="Entrar en academia" class="btn"/><br/>
												</form>
												</br>
												<a href="index.php" class="btn">Volver</a>
											</td>
										</tr>
									</table>';
							}else if ($_POST['opt'] == 'alumno'){
								echo '
									<form action="alumno/administracion.php" method="post">
										<input type="submit" value="Entrar en alumno" class="btn"/><br/>
									</form>';
							}
						}						
					}else{
						$nologer=true;
						include 'partes/login.php';
					}
				}if($_POST['correo'] == '' || $_POST['correo'] == null &&
					$_POST['contrasenya'] == '' || $_POST['contrasenya'] == null &&
					$_POST['opt'] == '' || $_POST['opt'] == null){
					include 'partes/login.php';
				}
			?>
		</div>
			<?php
				if($nologer == true)
				echo '<p align="center"><font color="#fff">Usuario o contrase&ntilde;a incorrectos</font></p>';
			?>
	</body>
</html>