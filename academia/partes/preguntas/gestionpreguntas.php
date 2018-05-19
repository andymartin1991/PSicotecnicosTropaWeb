<h3>Gesti&oacute;n de preguntas</h3>
<table border=0 align="center">
	<tr>
		<td>
			<?php 
    			if($_GET['tipo'] == null){
    			    include 'default.php';
    			}else{
    			    if($_GET['editar'] == 'si'){
    			        
    			        if($_GET["default"] != null){
    			            if(editar_test($_POST["pregunta"], $_POST["a"], $_POST["b"], $_POST["c"], $_POST["d"], $_POST["explicacion"], $_POST["correcta"], $_POST["fechaput"], $_POST["id"],
    			                $_POST["pre_php_js"], $_POST["a_php_js"], $_POST["b_php_js"], $_POST["c_php_js"], $_POST["d_php_js"], $_POST["sol_php_js"]) == "insertado"){
    			            }
    			            if($_POST["preguntaIMG"] != null){
    			                echo "imagen en pregunta pasada";
    			            }else{
    			                echo "no imagen";
    			            }
    			            /*if(modificarimagenes_test() != null){
    			                echo "Modificado imagenes";
    			            }*/
    			         
    			            include 'gestiondefault.php';
    			        }else{
    			            include 'editar.php';
    			        }
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
    			}
			 ?>
		</td>
	</tr>
</table>