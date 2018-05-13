<?php
    include '../funciones/function.php';
?>
<html>
	<head>
		<title>PsicotecnicosTropa</title>
		<link rel="stylesheet" type="text/css" href="../css/CSS.css" media="screen" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="../funciones/functionsJS.js"></script>
		<link rel="shortcut icon" href="http://s593975491.mialojamiento.es/PsicotecnicosTropa/img/LogoT.ico">
	</head>
	<body onload="deshabilitaRetroceso()">
		<?php
		if($_POST['correo'] != null || $_POST['correo'] != ''){
		?>
		<div id="contenedor">
			<div id="cabecera" align="center">	
                <?php include 'partes/cabecera.php';?>
			</div>	
			
            <div align="center">
                <div id="cuerpo">
                    <?php include'partes/cuerpo.php';?>
                </div>
            </div>
                
            <div id="pie" align="center">
            	<?php include'partes/pie.php';?>
            </div>
                
            </div>
        </div>
		<?php
		}
		?>
	</body>
</html>
