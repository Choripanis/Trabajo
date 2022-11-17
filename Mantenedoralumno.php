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
        <title>Formulario De alumno</title>
        <link rel="stylesheet" type="text/css" >
    </head>
    <body>
	<center>
         <b><h2>Registrar alumno </b></h2><br>
	<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
			<table border =1>
         <tr>
             <td>Rut: </td>
            <td><input type="text" name="rut" placeholder="Rut"></td>
        </tr>
        <tr>
            <td> Rutapo:   </td>
            <td> <input type="text" name="rutapo" placeholder="rut apoderado"> </td>
         </tr> 
         </tr>
        <tr>
            <td>  Nombre:  </td>
            <td> <input type="text" name="nombre" placeholder="nombre">  </td>
         </tr>   
         <td>  apellido:  </td>
            <td> <input type="text" name="apellido" placeholder="apellido">  </td>
         </tr>   
         <tr>
            <td> Fecha Nac:   </td>
            <td>  <input type="text" name="fecha" placeholder="year/moth/day ">  </td>
         </tr>     

        <tr>
            <td> curso:    </td>
            <td> <input type="text" name="curso" placeholder="curso">  </td>
         </tr> 
            <td><input type="submit" class="btn" name="consultar" value="consultar"></td>
			<td>  <input type="text" name="consulta?" placeholder="Rut a consultar">
			</tr> 
		 <tr>
            <td><input type="submit" class="btn" name="registrarse" value="Registrate"></td>
</tr>   
<tr>
            <td><input type="submit" class="btn" name="todos" value="todos"></td>
			<td> MOSTRAR TODOS</td>
</tr>   
</table>
<table border =1>
<tr>
             <td>Rut : </td>
            <td><input type="text" name="Ruta" placeholder="Rut"></td>
        </tr>
		<tr>
            <td><input type="submit" class="btn" name="editar" value="editar"></td>
			<td> INGRESE RUT A EDITAR</td>
			</tr>
			<td><input type="submit" class="btn" name="borrar" value="borrar"></td>
			<td> Borrar</td>
			</tr>
</table>
||<a href="index.php">regresar</a>||
</tr>
</table>
				

				<ul class="error" id="error"></ul>
			</div>

			
		</form>
        <div class="tabla">
            <table>
                <tr>
                <th>Rut</th>
                <th>Rut A</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha Nac</th>
                <th>Curso</th>
                </tr>

					<?php
					if(isset($_POST['consultar'])){
						$consul=$_POST['consulta?'];
						$consulta = "SELECT * FROM estudiante WHERE rut='$consul'";
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
											<td>'.$fila[2].'</td>
											<td>'.$fila[3].'</td>
                                            <td>'.$fila[4].'</td>
                                            <td>'.$fila[5].'</td>
										</tr>
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);

								}

							}
						}
                    }
                    if(isset($_POST['todos'])){
						$consulta = "SELECT * FROM estudiante";
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
											<td>'.$fila[2].'</td>
											<td>'.$fila[3].'</td>
                                            <td>'.$fila[4].'</td>
                                            <td>'.$fila[5].'</td>
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
	<script src="formulario.js"></script>
</body>
</html>
<?php
 if(isset($_POST['editar'])){
	$ruta=$_POST["Ruta"];
	$rut =$_POST["rut"];
	$rutA =$_POST["rutapo"];
	$nombre =$_POST["nombre"];
	$apellido =$_POST["apellido"];
	$fecha =$_POST["fecha"];
	$curso =$_POST["curso"];
	$actualizarDatos = "UPDATE estudiante SET Rut='$rut',Rut_Apo='$rutA',Nombre_E='$nombre',Apellido_E='$apellido',Fecha_Nac='$fecha',Curso='$curso' WHERE Rut='$ruta'";

	$ejecutarInsertar = mysqli_query($enlace,$actualizarDatos );

	if(!$actualizarDatos){
		echo"Error En la linea de sql";
	}
}
if(isset($_POST['borrar'])){
	$ruta=$_POST["Ruta"];
	
	$borrarDatos = "DELETE FROM estudiante WHERE Rut='$ruta'";

	$ejecutarInsertar = mysqli_query($enlace,$borrarDatos );

	if(!$borrarDatos){
		echo"Error En la linea de sql";
	}
}
	if(isset($_POST['registrarse'])){
		$rut =$_POST["rut"];
        $rutA =$_POST["rutapo"];
		$nombre =$_POST["nombre"];
		$apellido =$_POST["apellido"];
		$fecha =$_POST["fecha"];
		$curso =$_POST["curso"];
      

		$insertarDatos = "INSERT INTO estudiante VALUES('$rut',
		                                              '$rutA',
													  '$nombre',
													  '$apellido',
													  '$fecha',
                                                      '$curso')";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error En la linea de sql";
		}
	}
?>
