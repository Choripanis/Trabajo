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
        <title>Formulario De Funcioanrio</title>
        <link rel="stylesheet" type="text/css" >
    </head>
    <body>
	<center>
         <b><h2>Registrar Funcionario </b></h2><br>
	<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
            <table border =1>
         <tr>
             <td>Rut : </td>
            <td><input type="text" name="Ruta" placeholder="Rut"></td>
        </tr>
		<tr>
            <td><input type="submit" class="btn" name="consultar" value="consultar"></td>
			<td> INGRESE RUT A CONSULTAR</td>
			</tr>
</table>
||<a href="index.php">regresar</a>||

<ul class="error" id="error"></ul>
			</div>

			
		</form>
        <div class="tabla">
            <table>
                <tr>
                <th>Numero</th>
                <th>Motivo</th>
                <th>Caracter</th>
                <th>Rut funcionario</th>
                <th>Rut apoderado</th>
                <th>Fecha </th>
                <th>Acuerdo</th>
                <th>Estado</th>
                <th>fecha hoy</th>
                <th>Observacion</th>
                <th>confirmar/reagendar</th>
                </tr>
                <?php
                    if(isset($_POST['consultar'])){
						$consul=$_POST['Ruta'];
						$consulta = "SELECT * FROM citacion WHERE Rut_Apoderado ='$consul'";
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
											<td>'.$fila[7].'</td>
											<td>'.$fila[8].'</td>
											<td>'.$fila[9].'</td>
                                            <td>'.$fila[10].'</td>
                                           
										</tr>
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);

								}

							}
						}
                    }