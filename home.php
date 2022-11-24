

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
        <title>PagApoderado</title>
        <link rel="stylesheet" type="text/css" >
    </head>
    <body>
	<center>
         <b><h2>Responder citacion</b></h2><br>
	<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
			<table border =1>  
             
            <tr>
            <td>  Rut a consultar  :   </td>
            <td> <input type="text" name="Rut" placeholder="rut"> </td>
        </tr>
        <tr>
            <td>  Confirmacion :  </td>
            <td> <select name="Confirmacion">
        <?php
        $sql="SELECT Confirmar FROM confirmacion_reagendar";
        $resul = mysqli_query($enlace,$sql);
        ?>
        <?php while ($row = mysqli_fetch_array($resul)) {
            echo '<option>'.$row["Confirmar"];}
            ?>
            </select> </td>
         </tr>   
         <tr>
            <td><input type="submit" class="btn" name="Consultar" value="Consultar"></td>

            <td><input type="submit" class="btn" name="Actualizar" value="Actualizar"></td>

            <td>||<a href="index.php">salir</a>||</td>
</tr>   
\\informes\\
<div class="tabla">
       <table>
           <tr>
           <th>Numero</th>
           <th>Motivo</th>
           <th>Caracter</th>
           <th>Rut funcionario</th>
           <th>Rut apoderado</th>
           <th>Fecha programada</th>
           <th>Acuerdo</th>
           <th>Estado</th>
           <th>Fecha de hoy</th>
           <th>Observacion</th>
           <th>Confirmacion</th>
           </tr>
<?php
    

            
               if(isset($_POST['Consultar'])){
                   $consul=$_POST['Rut'];
                   #actualizar
                   $consulta = "SELECT * FROM citacion WHERE Rut_Apoderado='$consul'";
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
               if(isset($_POST['Actualizar'])){
                $Estado =$_POST["Confirmacion"];
                $consul=$_POST['Rut'];
                $insertarDatos = "UPDATE citacion SET Confirmar_Reagendar='$Estado' WHERE Rut_Apoderado='$consul'";
        
                $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
        
                if(!$ejecutarInsertar){
                    echo"Error En la linea de sql";
                }
            }
?>
			</table>
		</div>
	</div>
</body>
</html>