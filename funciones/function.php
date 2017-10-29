<?php
	function conexion(){
		$host_name = 'db694281392.db.1and1.com';
		$database = 'db694281392';
		$user_name = 'dbo694281392';
		$password = 'Permiso1991@';
		$connect = mysql_connect($host_name, $user_name, $password, $database);
		mysql_set_charset('utf8',$connect);
		if (mysql_errno()) {
			#echo('<p>Error al conectar con servidor MySQL: '.mysql_error().'</p>');
			return null;
		} else {
			#echo '<p>Se ha establecido la conexión al servidor MySQL con éxito.</p >';
			return $connect;
		}
	}
	
	function login($bool){
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				if($_POST['correo'] != null && $_POST['contrasenya'] != null && $_POST['correo'] != '' && $_POST['contrasenya'] != ''){
					if($_POST['opt'] == 'academia'){
						$correo = $_POST['correo'];
						$pass = $_POST['contrasenya'];
						if($bool == false){
							$sql = 'SELECT * FROM ACADEMIA WHERE ACTIVO="1" AND CORREO_ACA=\''.limpiarString($correo).'\' AND CONTRASENYA_ACA=md5(\''.limpiarString($pass).'\')';
						}else{
							$sql = 'SELECT * FROM ACADEMIA WHERE ACTIVO="1" AND CORREO_ACA=\''.limpiarString($correo).'\' AND password=\''.limpiarString($pass).'\'';
						}
					}
					else{
						
					}
					$result = mysql_query ($sql);
					// verificamos que no haya error
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$número_filas = mysql_num_rows($result);
						if($número_filas != null && $número_filas >0){
							return $result;
						}else{
							return null;
						}
					}
				}else{
					return null;
				}	
			}
		}
	}
	
	function alumnos($id,$dni){
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				if($id != null || $id != ''){	
				    if($dni == null || $dni == ''){
					   $sql = 'SELECT * FROM USUARIO WHERE ID_ACADEMIA ="'.limpiarString($id).'"';		
				    }else{
				       $sql = 'SELECT * FROM USUARIO WHERE ID_ACADEMIA ="'.limpiarString($id).'" AND DNI ="'.limpiarString($dni).'"';
				    }
					$result = mysql_query ($sql);
					// verificamos que no haya error
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$número_filas = mysql_num_rows($result);
						if($número_filas != null && $número_filas >0){
							return $result;
						}else{
							return null;
						}
					}
				}else{
					return null;
				}	
			}
		}
	}
	
	function buscar_aca_nombre($nombre){
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				if($nombre != null || $nombre != ''){					
					$sql = 'SELECT "NOMBRE_ACA" FROM ACADEMIA WHERE NOMBRE_ACA = "'.limpiarString($nombre).'"';						
					$result = mysql_query ($sql);
					// verificamos que no haya error
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$número_filas = mysql_num_rows($result);
						if($número_filas != null && $número_filas >0){
							return $result;
						}else{
							return null;
						}
					}
				}else{
					return null;
				}	
			}
		}
	}
	
	function buscar_aca_correo($email){
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				if($email != null || $email != ''){					
					$sql = 'SELECT "CORREO_ACA" FROM ACADEMIA WHERE CORREO_ACA = "'.limpiarString($email).'"';						
					$result = mysql_query ($sql);
					// verificamos que no haya error
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$número_filas = mysql_num_rows($result);
						if($número_filas != null && $número_filas >0){
							return $result;
						}else{
							return null;
						}
					}
				}else{
					return null;
				}	
			}
		}
	}
	
	function buscar_aca_nif($nif){
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				if($nif != null || $nif != ''){					
					$sql = 'SELECT "NIF_ACA" FROM ACADEMIA WHERE NIF_ACA = "'.limpiarString($nif).'"';						
					$result = mysql_query ($sql);
					// verificamos que no haya error
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$número_filas = mysql_num_rows($result);
						if($número_filas != null && $número_filas >0){
							return $result;
						}else{
							return null;
						}
					}
				}else{
					return null;
				}	
			}
		}
	}
	
	function insertar_academia($nombre,$email,$pais,$provincia,$localidad,$direccion,$telefono,$nif,$pass,$fecha){	
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				$name = false;
				$correo = false;
				$idaca = false;
				$sql = '';	
				if(buscar_aca_nombre($nombre) != null){
					echo '<p  align="center" class="blanco">El nombre ya existe</p>';
					$name = true;
				}
				if(buscar_aca_correo($email) != null){
					echo '<p  align="center" class="blanco">El correo ya existe</p>';
					$correo = true;
				}
				if(buscar_aca_nif($nif) != null){
					echo '<p  align="center" class="blanco">El nif ya existe</p>';
					$idaca = true;
				}
				if($name == false && $correo == false && $idaca == false){
					$sql = 'INSERT INTO ACADEMIA (NOMBRE_ACA, CORREO_ACA, CONTRASENYA_ACA, PAIS_ACA, PROVINCIA_ACA, LOCALIDAD_ACA, DIRECCION_ACA, TELEFONO_ACA, NIF_ACA, FECH_CREA_ACA) VALUES 
					("'.limpiarString($nombre).'", "'.limpiarString($email).'", MD5("'.limpiarString($pass).'"), "'.limpiarString($pais).'", "'.limpiarString($provincia).'", "'.limpiarString($localidad).'", "'.limpiarString($direccion).'", "'.limpiarString($telefono).'", "'.limpiarString($nif).'", "'.limpiarString($fecha).'")';
				}	
				$result = mysql_query ($sql);
				// verificamos que no haya error
				if($sql!=''){
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$result = 'insertado';
						return $result;
					}
				}else{
					return null;
				}
			}
		}
	}
	
	function buscar_usu_correo($email, $id_aca, $id_alu){
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				if($email != null){		
				    if($id_alu == null){
					   $sql = 'SELECT "CORREO_USU" FROM USUARIO WHERE ID_ACADEMIA = "'.$id_aca.'" AND CORREO_USU = "'.limpiarString($email).'"';	
				    }else{
				       $sql = 'SELECT "CORREO_USU" FROM USUARIO WHERE (ID_ACADEMIA = "'.$id_aca.'" AND CORREO_USU = "'.limpiarString($email).'") AND ID_USUARIO <> "'.$id_alu.'"';
				    }
					$result = mysql_query ($sql);
					// verificamos que no haya error
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$número_filas = mysql_num_rows($result);
						if($número_filas != null && $número_filas >0){
							return $result;
						}else{
							return null;
						}
					}
				}else{
					return null;
				}	
			}
		}
	}
	
	function buscar_usu_nif($dni, $id_aca, $id_alu){
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				if($dni != null){	
				    if($id_alu == null){
					   $sql = 'SELECT "DNI" FROM USUARIO WHERE ID_ACADEMIA = "'.$id_aca.'" AND DNI = "'.limpiarString($dni).'"';
				    }else{
				       $sql = 'SELECT "DNI" FROM USUARIO WHERE (ID_ACADEMIA = "'.$id_aca.'" AND DNI = "'.limpiarString($dni).'") AND ID_USUARIO <> "'.$id_alu.'"';
				    }
					$result = mysql_query ($sql);
					// verificamos que no haya error
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$número_filas = mysql_num_rows($result);
						if($número_filas != null && $número_filas >0){
							return $result;
						}else{
							return null;
						}
					}
				}else{
					return null;
				}	
			}
		}
	}
	
	function insertar_usuario($email,$nombre,$apellidos,$telefono,$creacion,$caducidad,$dni,$contrasenia,$id_aca){	
		$database = 'db694281392';
		$con = conexion();
		if($con != null){
			$basedato = mysql_select_db($database,$con);
			if (!$basedato){
				echo 'ERROR CONEXION CON BD: '.mysql_error();
				return null;
			}else{		
				$correo_usu = false;
				$dni_usu = false;
				$sql = '';	
				
				if(buscar_usu_correo($email, $id_aca, null) != null){
					echo '<p  align="center">El correo ya existe</p>';
					$correo_usu = true;
				}
				if(buscar_usu_nif($dni, $id_aca, null) != null){
					echo '<p  align="center">El dni ya existe</p>';
					$dni_usu = true;
				}
				if($dni_usu == false && $correo_usu == false){
					$sql = 'INSERT INTO USUARIO (CORREO_USU, CONTRASENYA_USU, ID_ACADEMIA, NOMBRE_ALU, APELLIDOS_ALU, TLF_ALU, FECHACREA_ALU, CADUCIDAD, DNI) VALUES 
					("'.limpiarString($email).'", MD5("'.limpiarString($contrasenia).'"), "'.limpiarString($id_aca).'", "'.limpiarString($nombre).'", "'.limpiarString($apellidos).'", "'.limpiarString($telefono).'", "'.limpiarString($creacion).'", "'.limpiarString($caducidad).'", "'.limpiarString($dni).'")';
				}	
				$result = mysql_query ($sql);
				// verificamos que no haya error
				if($sql!=''){
					if (!$result){
					   echo 'La consulta SQL contiene errores'.mysql_error();
					   return null;
					}else {
					//obtenemos los datos resultado de la consulta
						$result = 'insertado';
						return $result;
					}
				}else{
					return null;
				}
			}
		}
	}
	
	function editaralu($nombre,$apellidos,$email,$dni,$telefono,$creacion,$caducidad,$pass, $id_aca, $id_usu){
	    $database = 'db694281392';
	    $con = conexion();
	    if($con != null){
	        $basedato = mysql_select_db($database,$con);
	        if (!$basedato){
	            echo 'ERROR CONEXION CON BD: '.mysql_error();
	            return null;
	        }else{
	            $correo_usu = false;
	            $dni_usu = false;
	            $sql = '';
	    
	            if(buscar_usu_correo($email, $id_aca, $id_usu) != null){
	                echo '<p  align="center">El correo ya existe</p>';
	                $correo_usu = true;
	            }
	            if(buscar_usu_nif($dni, $id_aca, $id_usu) != null){
	                echo '<p  align="center">El dni ya existe</p>';
	                $dni_usu = true;
	            }
	            if($dni_usu == false && $correo_usu == false){
	                $sql = 'UPDATE USUARIO SET CORREO_USU = "'.limpiarString($email).'", CONTRASENYA_USU = MD5("'.limpiarString($pass).'"), NOMBRE_ALU = "'.limpiarString($nombre).'", APELLIDOS_ALU = "'.limpiarString($apellidos).'", FECHACREA_ALU = "'.limpiarString($creacion).'", CADUCIDAD = "'.limpiarString($caducidad).'", DNI = "'.limpiarString($dni).'" WHERE ID_USUARIO = "'.limpiarString($id_usu).'"';
	            }
	            $result = mysql_query ($sql);
	            // verificamos que no haya error
	            if($sql!=''){
	                if (!$result){
	                    echo 'La consulta SQL contiene errores'.mysql_error();
	                    return null;
	                }else {
	                    //obtenemos los datos resultado de la consulta
	                    $result = 'insertado';
	                    return $result;
	                }
	            }else{
	                return null;
	            }
	        }
	    }
	    return 'sas';
	}
	
	function borrarALU($id_alu){
	    $database = 'db694281392';
	    $con = conexion();
	    if($con != null){
	        $basedato = mysql_select_db($database,$con);
	        if (!$basedato){
	            echo 'ERROR CONEXION CON BD: '.mysql_error();
	            return null;
	        }else{
	            if($id_alu != null){
	                $sql = 'DELETE FROM USUARIO WHERE ID_USUARIO = "'.$id_alu.'"';
	                $result = mysql_query ($sql);
	                // verificamos que no haya error
	                if (!$result){
	                    echo 'La consulta SQL contiene errores'.mysql_error();
	                    return null;
	                }else {
	                    return true;
	                 }
	            }else{
                    return null;
                }
	        }
	    }
	}
	
	function limpiarString($string){
		$array = array("'", "<", ">", "\"", ";");
		$limpio = str_replace($array,"",$string);
		return $limpio;
	}
	
	function formato($valor){
		$res = str_pad($valor, 2, '0', STR_PAD_LEFT);
		return $res;
	}
	
	function mkDirFix ($path) {
	    $path = explode("/PsicotecnicosTropa/dirAcademias/",$path);
	    $conn_id = @ftp_connect("home593975487.1and1-data.host");
	    if(!$conn_id) {
	        echo '<p align="center">error de conexion a servidor ftp</p>';
	        return false;
	    }
	    if (@ftp_login($conn_id, 'u82399341', 'permiso1991')) {
	
	        foreach ($path as $dir) {
	            if(!$dir) {
	                continue;
	            }
	            $currPath.="/PsicotecnicosTropa/dirAcademias/".trim($dir);
	            if(!@ftp_chdir($conn_id,$currPath)) {
	                if(!@ftp_mkdir($conn_id,$currPath)) {
	                    @ftp_close($conn_id);
	                    return false;
	                }
	                @ftp_chmod($conn_id,0777,$currPath);
	            }
	        }
	    }
	    @ftp_close($conn_id);
	    return $currPath;
	}
	
	function subir ($path, $img, $tmp, $image, $id_test) {
	    $file = $tmp;
	    $remote_file = '/PsicotecnicosTropa/dirAcademias/'.$path.'/'.$path.'_'.$id_test.'_'.$img.'.'.obtenerExtensionFichero($image).'';
	    $conn_id = ftp_connect("home593975487.1and1-data.host") or die("Problema con servidor");
	    if (@ftp_login($conn_id, "u82399341", "permiso1991")) {
	
	    } else {
	        echo "<p align='center'>Error de conexion ftp</p>";
	    }
	    if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
	
	    }
	    else {
	        echo "<p align='center'>Se ha encontrado un problema al subir $file\n</p>";
	
	    }
	    ftp_close($conn_id);
	}
	
	function obtenerExtensionFichero($str){
	    return end(explode(".", $str));
	}
	
	function insertar_test($tipo_test, $pregunta, $res_a, $res_b, $res_c, $res_d, $solucion, $explicacion, $id_academia){
	    $database = 'db694281392';
	    $con = conexion();
	    if($con != null){
	        $basedato = mysql_select_db($database,$con);
	        if (!$basedato){
	            echo 'ERROR CONEXION CON BD: '.mysql_error();
	            return null;
	        }else{
	            $creacion_fecha = date("Y-n-j");
	            $sql = "INSERT INTO TEST
	            (ID_TEST, TIPO_TEST, PREGUNTA, RES_A, RES_B, RES_C, RES_D, SOLUCION, EXPLICACION, ID_ACADEMIA, FECHA_CREA_TEST, FECHA_MODI_TEST) VALUES 
	            (NULL, '".limpiarString($tipo_test)."', '".limpiarString($pregunta)."', '".limpiarString($res_a)."', '".limpiarString($res_b)."', '".limpiarString($res_c)."', 
	            '".limpiarString($res_d)."', '".limpiarString($solucion)."', '".limpiarString($explicacion)."','".limpiarString($id_academia)."', '".limpiarString($creacion_fecha)."', '')";
	            
	            $result = mysql_query ($sql);
	            // verificamos que no haya error
	            if($sql!=''){
	                if (!$result){
	                    echo 'Error sql al insertar test por primera vez: '.mysql_error();
	                    return null;
	                }else {
	                    //obtenemos los datos resultado de la consulta
	                    $result = 'insertado';
	                    return $result;
	                }
	            }else{
	                return null;
	            }
	        }
	    }
	}
	
	function sacarid_test($id, $tipo){
	    $database = 'db694281392';
	    $con = conexion();
	    if($con != null){
	        $basedato = mysql_select_db($database,$con);
	        if (!$basedato){
	            echo 'ERROR CONEXION CON BD: '.mysql_error();
	            return null;
	        }else{
	            $sql = "SELECT MAX(ID_TEST) FROM TEST AS ID_TEST WHERE ID_ACADEMIA = ".limpiarString($id)." AND TIPO_TEST = ".limpiarString($tipo);
                $result = mysql_query ($sql);
                // verificamos que no haya error
                if (!$result){
                    echo 'La consulta SQL contiene errores'.mysql_error();
                    return null;
                }else {
                    //obtenemos los datos resultado de la consulta
                    $número_filas = mysql_num_rows($result);
                    if($número_filas != null && $número_filas >0){
                        return $result;
                    }else{
                        return null;
                    }
                }
	        }
	    }
	}
	
	function editarinsercion_test($imgpregunta,$imgA,$imgB,$imgC,$imgD,$imgexp,$id,$tipo,$id_test){
	    $database = 'db694281392';
	    $con = conexion();
	    if($con != null){
	        $basedato = mysql_select_db($database,$con);
	        if (!$basedato){
	            echo 'ERROR CONEXION CON BD: '.mysql_error();
	            return null;
	        }else{
	            $sql = "UPDATE TEST SET IMG_PRE = '".limpiarString($imgpregunta)."', IMG_A = '".limpiarString($imgA)."', IMG_B = '".limpiarString($imgB)."', IMG_C = '".limpiarString($imgC)."', IMG_D = '".limpiarString($imgD)."', IMG_EXPLI = '".limpiarString($imgexp)."' WHERE ID_TEST = ".limpiarString($id_test)." AND TIPO_TEST = ".limpiarString($tipo)." AND ID_ACADEMIA = ".limpiarString($id);
	            $result = mysql_query ($sql);
	            // verificamos que no haya error
	            if($sql!=''){
	                if (!$result){
	                    echo 'La consulta SQL contiene errores'.mysql_error();
	                    return null;
	                }else {
	                    //obtenemos los datos resultado de la consulta
	                    $result = 'insertado';
	                    return $result;
	                }
	            }else{
	                return null;
	            }
	        }
	    }
	    return 'sas';
	}
	
	function test($id,$tipo){
	    $database = 'db694281392';
	    $con = conexion();
	    if($con != null){
	        $basedato = mysql_select_db($database,$con);
	        if (!$basedato){
	            echo 'ERROR CONEXION CON BD: '.mysql_error();
	            return null;
	        }else{
	            $sql = "SELECT * FROM TEST WHERE ID_ACADEMIA = $id AND TIPO_TEST = $tipo";
                $result = mysql_query ($sql);
                // verificamos que no haya error
                if (!$result){
                    echo 'La consulta SQL contiene errores'.mysql_error();
                    return null;
                }else {
                    //obtenemos los datos resultado de la consulta
                    $número_filas = mysql_num_rows($result);
                    if($número_filas != null && $número_filas >0){
                        return $result;
                    }else{
                        return null;
                    }
                }
	        }
	    }
	}
	
	function testver($id_test){
	    $database = 'db694281392';
	    $con = conexion();
	    if($con != null){
	        $basedato = mysql_select_db($database,$con);
	        if (!$basedato){
	            echo 'ERROR CONEXION CON BD: '.mysql_error();
	            return null;
	        }else{
	            $sql = "SELECT * FROM TEST WHERE ID_TEST = $id_test";
	            $result = mysql_query ($sql);
	            // verificamos que no haya error
	            if (!$result){
	                echo 'La consulta SQL contiene errores'.mysql_error();
	                return null;
	            }else {
	                //obtenemos los datos resultado de la consulta
	                $número_filas = mysql_num_rows($result);
	                if($número_filas != null && $número_filas >0){
	                    return $result;
	                }else{
	                    return null;
	                }
	            }
	        }
	    }
	}
	
	function borrar_test($id_test){
	    $database = 'db694281392';
	    $con = conexion();
	    if($con != null){
	        $basedato = mysql_select_db($database,$con);
	        if (!$basedato){
	            echo 'ERROR CONEXION CON BD: '.mysql_error();
	            return null;
	        }else{
	            $sql = "DELETE FROM TEST WHERE ID_TEST = $id_test";
	            $result = mysql_query ($sql);
	            // verificamos que no haya error
	            if (!$result){
	                echo 'La consulta SQL contiene errores'.mysql_error();
	                return null;
	            }else {
	                return true;
	            }
	        }
	    }
	}
	
?>