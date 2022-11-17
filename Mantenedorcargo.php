<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="gestor";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
?>
<!DOCTYPE html>
<html>
    <head>
	<body bgcolor="pink">
        <meta charset="utf-8"> 
        <title>Formulario De Registro</title>
        <link rel="stylesheet" type="text/css" >
    </head>
    <body>
	<center>
         <b><h2>Registrar cargo </b></h2><br>
	<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
			<table border =1>
         <tr>
             <td>ID: </td>
            <td><input type="text" name="A" placeholder="ID"></td>
        </tr>
        <tr>
            <td> Cargo:   </td>
            <td> <input type="text" name="cargo" placeholder="cargo"> </td>
         </tr>
	<td><input type="submit" class="btn" name="registrarse" value="Registrate"></td>
</tr> 
            <td><input type="submit" class="btn" name="todos" value="todos"></td>
			<td> MOSTRAR TODOS</td>
</tr> 
</tr>   
</table>
<table border =1>
<tr>
             <td>ID : </td>
            <td><input type="text" name="Ruta" placeholder="ID"></td>
        </tr>
<td><input type="submit" class="btn" name="borrar" value="borrar"></td>
			<td> Borrar</td>
			</tr>
			<td><input type="submit" class="btn" name="consultar" value="consultar"></td>
			</tr>
			||<a href="index.php">regresar</a>||
			</tr>
				<ul class="error" id="error"></ul>
			</div>

			
		</form>
        <div class="tabla">
            <table>
                <tr>
                <th>Cargo</th>
                <th>ID</th>
                
                </tr>

					<?php
					if(isset($_POST['consultar'])){
						$consul=$_POST['Ruta'];
						$consulta = "SELECT * FROM cargos WHERE ID='$consul'";
						$ejecutarConsulta = mysqli_query($enlace, $consulta);
                        $verFilas= mysqli_num_rows($ejecutarConsulta);
                        $fila = mysqli_fetch_array($ejecutarConsulta);
						if(!$ejecutarConsulta){
							echo"0";
						}else{
							if($verFilas<1){
								echo"<tr><td>Sin registros</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									echo'
										<tr>
											<td>'.$fila[0].'</td>
											<td>'.$fila[1].'</td>
									
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);

								}

							}
						}
                    }
                    if(isset($_POST['todos'])){
						$consulta = "SELECT * FROM cargos";
						$ejecutarConsulta = mysqli_query($enlace, $consulta);
                        $verFilas= mysqli_num_rows($ejecutarConsulta);
                        $fila = mysqli_fetch_array($ejecutarConsulta);
						if(!$ejecutarConsulta){
							echo"0";
						}else{
							if($verFilas<1){
								echo"<tr><td>Sin registros</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									echo'
										<tr>
											<td>'.$fila[1].'</td>
											<td>'.$fila[0].'</td>
											
										</tr>
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);

								}

							}
						}
                    }


					?>
						
						
				
				
			</table>
		</div>
	</div>
	
</body>
</html>
<?php
if(isset($_POST['borrar'])){
	$ruta=$_POST["Ruta"];
	
	$borrarDatos = "DELETE FROM cargos WHERE ID='$ruta'";

	$ejecutarInsertar = mysqli_query($enlace,$borrarDatos );

	if(!$borrarDatos){
		echo"Error En la linea de sql";
	}
}
	if(isset($_POST['registrarse'])){
		$ID =$_POST["A"];
		$cargo =$_POST["cargo"];
		
		

		$insertarDatos = "INSERT INTO cargos VALUES('$ID',
		                                              '$cargo')";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error En la linea de sql";
		}
	}

?>