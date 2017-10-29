<table style="margin-top:10px; color:#fff;" width="95%" border=0>
    <tr>
        <td>
            <img src="../img/Logo.png" width="80px">
        </td>
        <td align="right">
            <?php 
                if(conexion()){
                    if($_POST['correo'] != '' && $_POST['contrasenya'] != '' && $_POST['opt'] != ''){
					$bool = true;
                        if(login($bool)!= null){
                            $result = login($bool);
                            while ($row = mysql_fetch_row($result)){
                                echo '<p>Academia: '.$row[1].'</p>';
                                $id = $row[0];
                                include 'partes/salir.php';
                            }						
                        }else{
                            echo 'Usuario o contraseña incorrectos<a href="../index.php" class="btn">Salir</a>';
                        }
                    }else{
                        echo 'correo, contraseña y opcion vacio';
                    }
                } else{
                    echo '<p>Problemas con la conexión con el servidor</p>';
                }
            ?>
        </td>
    </tr>
</table>	
