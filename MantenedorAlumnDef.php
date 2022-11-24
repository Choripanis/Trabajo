<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="aaaa";

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
            <td> <select name="rutA">
        <?php
        $sql="SELECT Rut FROM apoderado";
        $resul = mysqli_query($enlace,$sql);
        ?>
        <?php while ($row = mysqli_fetch_array($resul)) {
            echo '<option>'.$row["Rut"];}
            ?>
            </select> </td>
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
            <td>  <input type="date" name="fecha" >  </td>
         </tr>     

        <tr>
            <td> curso:    </td>
            <td> <select name="Curso">
        <?php
        $sql="SELECT ID FROM curso";
        $resul = mysqli_query($enlace,$sql);
        ?>
        <?php while ($row = mysqli_fetch_array($resul)) {
            echo '<option>'.$row["ID"];}
            ?>
            </select>  </td>
			<tr>
			<td> Estado:    </td>
            <td> <input type="radio" name="Estado" value = "Pasivo" > Pasivo  <input type="radio" name="Estado" value = "Activo " > Activo </td>
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
||<a href="informealumn.php">Informe PDF</a>||
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
				<th>Estado</th>
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
											<td>'.$fila[6].'</td>
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
											<td>'.$fila[6].'</td>
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
	$rutapo =$_POST["rutA"];
	$nombre =$_POST["nombre"];
	$apellido =$_POST["apellido"];
	$fecha =$_POST["fecha"];
	$curso =$_POST["Curso"];
	$estado=$_POST["Estado"];
	$actualizarDatos = "UPDATE estudiante SET Rut='$rut',Rut_Apo='$rutapo',Nombre_E='$nombre',Apellido_E='$apellido',Fecha_Nac='$fecha',Curso='$curso',Estado='$estado'WHERE Rut='$ruta'";

	$ejecutarInsertar = mysqli_query($enlace,$actualizarDatos );

	if(!$actualizarDatos){
		echo"Error En la linea de sql";
	}
}
if(isset($_POST['borrar'])){
	$ruta=$_POST["Ruta"];
	$Estado1='Pasivo';
	
	$borrarDatos = "UPDATE estudiante SET Estado='$Estado1' WHERE Rut='$ruta'";

	$ejecutarInsertar = mysqli_query($enlace,$borrarDatos );

	if(!$borrarDatos){
		echo"Error En la linea de sql";
	}
}
	if(isset($_POST['registrarse'])){
		$rut =$_POST["rut"];
        $rutapo =$_POST["rutA"];
		$nombre =$_POST["nombre"];
		$apellido =$_POST["apellido"];
		$fecha =$_POST["fecha"];
		$curso =$_POST["Curso"];
		$estado=$_POST["Estado"];
		$a=1;
      

		$insertarDatos = "INSERT INTO estudiante (`Rut`, `Rut_Apo`, `Nombre_E`, `Apellido_E`, `Fecha_Nac`, `Curso`, `Estado`,`Tipo`) 
		VALUES ('$rut', '$rutapo', '$nombre', '$apellido', '$fecha', '$curso', '$estado','$a');";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error En la linea de sql a";
		}
	}
?>
