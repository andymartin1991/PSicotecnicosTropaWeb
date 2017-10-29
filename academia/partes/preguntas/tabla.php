<?php
$tipo;
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

echo '<tr><td align="center">'.$row[0].'</td>
    <td align="center">'.$row[15].'</td>
        <td align="center">';
    if($row[18] == null || $row[18] == '' || $row[18] == '0000-00-00'){
        echo 'NUNCA';
    }else{
        echo $row[18];
    }
 echo '</td>
	<td align="center" valign="center">
		<form action="administracion.php?opt=preguntas&tipo='.$tipo.'&ver=si&anadir=no&editar=no&borrar=no&id_test='.$row[0].'" method="post">
			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
			<input type="submit" value="Ver" class="btn">
		</form>
	</td>
	<td align="center" valign="center">
		<form action="administracion.php?opt=preguntas&tipo='.$tipo.'&ver=no&anadir=no&editar=si&borrar=no&id_test='.$row[0].'" method="post">
			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
			<input type="submit" value="Editar" class="btn">
		</form>
	</td>
	<td align="center" valign="center">
		<form action="administracion.php?opt=preguntas&tipo='.$tipo.'&ver=no&anadir=no&editar=no&borrar=si&id_test='.$row[0].'" method="post">
			<input type="text" name="correo" value="'.$_POST['correo'].'" style="Display:none;"/>
			<input type="text" name="contrasenya" value="'.$_POST['contrasenya'].'" style="Display:none;"/>
			<input type="text" name="opt" value="'.$_POST['opt'].'" style="Display:none;"/>
			<input type="submit" value="Borrar" class="btn">
		</form>
	</td></tr>';
?>