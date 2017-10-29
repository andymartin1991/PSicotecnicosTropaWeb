<form action="index.php" method="post">
	<table border=0 width="100%" height="100%" style="padding:40px;">
		<tr>
			<td align="center">
				Correo<br/>
				<input type="email" name="correo" size="30px" class="fields"/>
			</td>
		</tr>
		<tr>
			<td align="center">
				Contrase&ntilde;a<br/>
				<input type="password" name="contrasenya" size="30px" class="fields"/>
			</td>
		</tr>
		<tr>
			<td align="center">
				Tipo de acceso<br/>
				<input type="radio" name="opt" value="alumno"> Alumno
				<input type="radio" name="opt" value="academia"> Academia
			</td>
		</tr>	
		<tr>
			<td align="center">
				<input type="submit" value="Entrar" class="btn"><br/>
			</td>
		</tr>
		<tr>
			<td align="center">
				<br/>Si eres academia y no estas registrado registrese <a href="/PsicotecnicosTropa/partes/registro.php" class="btn">aqui</a><br/>
			</td>
		</tr>					
	</table>			
</form>