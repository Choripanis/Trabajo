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
         <b><h2>Editar apoderado </b></h2><br>
	<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
			<table border =1>
         <tr>
             <td>Rut: </td>
            <td><input type="text" name="rut" placeholder="Rut"></td>
        </tr>
        <tr>
            <td> Nombres:   </td>
            <td> <input type="text" name="nombre" placeholder="Nombre"> </td>
         </tr> 
         </tr>
        <tr>
            <td>  apellidos:  </td>
            <td> <input type="text" name="apellido" placeholder="Apellido">  </td>
         </tr>   
         <tr>
            <td> Fono:   </td>
            <td>  <input type="text" name="fono" placeholder="Fono">  </td>
         </tr>     

        <tr>
            <td> email:    </td>
            <td> <input type="text" name="email" placeholder="Email">  </td>
         </tr>  
         <tr>
         <td> clave:    </td>
            <td>  <input type="text" name="clave" placeholder="Clave">  </td>
         </tr>
		 <tr>
            <td><input type="submit" class="btn" name="consultar" value="consultar"></td>
			<td>  <input type="text" name="consulta?" placeholder="Rut a consultar">
			</tr>
		 <tr>
            <td><input type="submit" class="btn" name="registrarse" value="registrarse"></td>
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
||<a href="InformeApo.php">Informe PDF</a>||
 
				

				<ul class="error" id="error"></ul>
			</div>

			
		</form>
        <div class="tabla">
            <table>
                <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>apellido</th>
                <th>fono</th>
                <th>correo</th>
                <th>Clave</th>
                </tr>

					<?php
                    if(isset($_POST['consultar'])){
						$consul=$_POST['consulta?'];
						$consulta = "SELECT * FROM apoderado WHERE rut='$consul'";
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
						$consul=$_POST['consulta?'];
						$consulta = "SELECT * FROM apoderado";
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
</body>
</html>
<?php
	if(isset($_POST['editar'])){
		$ruta=$_POST["Ruta"];
		$rut =$_POST["rut"];
		$nombre =$_POST["nombre"];
		$apellido =$_POST["apellido"];
		$fono =$_POST["fono"];
		$email =$_POST["email"];
		$clave =$_POST["clave"];
		

		$actualizarDatos = "UPDATE apoderado SET Rut='$rut',Nombre='$nombre',Apellido='$apellido',Telefono='$fono',Email='$email',Clave='$clave' WHERE Rut='$ruta'";

		$ejecutarInsertar = mysqli_query($enlace,$actualizarDatos );

		if(!$actualizarDatos){
			echo"Error En la linea de sql";
		}
	}
	if(isset($_POST['borrar'])){
		$ruta=$_POST["Ruta"];
		
		$borrarDatos = "DELETE FROM apoderado WHERE Rut='$ruta'";
	
		$ejecutarInsertar = mysqli_query($enlace,$borrarDatos );
	
		if(!$borrarDatos){
			echo"Error En la linea de sql";
		}
	}

	if(isset($_POST['registrarse'])){
		$rut =$_POST["rut"];
		$nombre =$_POST["nombre"];
		$apellido =$_POST["apellido"];
		$fono =$_POST["fono"];
		$email =$_POST["email"];
		$clave =$_POST["clave"];
		$a=2;
		

		$insertarDatos = "INSERT INTO apoderado (`Rut`, `Nombre`, `Apellido`, `Telefono`, `Email`, `Clave`, `Tipo`)
		 VALUES ('$rut','$nombre','$apellido','$fono','$email','$clave','$a');";


		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error En la linea de sql a";
		}
	}
?>
       