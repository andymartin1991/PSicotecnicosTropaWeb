<h3>Gesti&oacute;n de preguntas</h3>
<table border=0 align="center">
	<tr>
		<td>
			<?php 
    			if($_GET['tipo'] == null){
    			    include 'default.php';
    			}else{
    			    if($_GET['anadir'] == 'si'){
    			        include 'anadir.php';
    			    }
    			    else{
    			        if($_GET['ver'] == 'si'){
    			            include 'ver.php';
    			        }else if($_GET['borrar'] == 'si'){
    			            include 'ver.php';
    			        }
    			        else{
    			            if($_GET['borrado'] == 'si'){
    			                if(borrar_test($_GET['id_test']) != null){
    			                    echo '<p align="center"><font style="color:red;">BORRADO</font></p>';
    			                }
    			            }
                            include 'gestiondefault.php';
    			        }
    			    }
    			}
			 ?>
		</td>
	</tr>
</table>