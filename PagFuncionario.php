<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="gestor";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
	$queryapo = "SELECT * FROM apoderados";
	$resul1 = mysqli_query($enlace,$queryapo);
	?>
<!DOCTYPE html>
<html>
    <head>
	<body bgcolor="pink">
        <meta charset="utf-8"> 
        <title>PagFuncionario</title>
        <link rel="stylesheet" type="text/css" >
    </head>
    <body>
	<center>
         <b><h2>Crear citacion</b></h2><br>
	<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
			<table border =1>
            <tr>
            <td> Codigo :   </td>
            <td>  <input type="text" name="Codigo" placeholder="Codigo">  </td>
         </tr> 
		 <tr>
            <td> Caracter :   </td>
            <td>  <select name="Caracter" >
	<option value="">--- caracter ---</option>
	<option value="Academico">Academico</option>
	<option value="Administrarivo">Administrarivo</option>
	<option value="Diciplinario">Diciplinario</option>
</select>  </td>
         </tr>
         <tr>
             <td> Motivo de citacion: </td>
            <td><input type="text" name="Motivo" placeholder="Motivo"></td>
        </tr>
        <tr>
            <td> Rut Profesor o funcionario :   </td>
            <td> <input type="text" name="RutFun" placeholder="Rut"> </td>
         </tr> 
         </tr>
        <tr>
            <td>  Rut apoderado :  </td>
            <td> <select name="RutApo">
        <?php
        $sql="SELECT Rut FROM apoderado";
        $resul = mysqli_query($enlace,$sql);
        ?>
        <?php while ($row = mysqli_fetch_array($resul)) {
            echo '<option>'.$row["Rut"];}
            ?>
            </select> </td>
         </tr>   
         <tr>
            <td> Fecha programada :   </td>
            <td>  <input type="date" name="Fecha" placeholder="Fecha">  </td>
         </tr> 
		<tr>
            <td>  Fecha emision  :   </td>
            <td> <input type="date" name="FechaEmi" placeholder="Fecha"> </td>
        </tr>  
		<tr>
		<td><input type="submit" class="btn" name="Crear" value="Crear"></td>
        </tr>  
		</table>
		\\informes\\
		||<a href="citacion.php">Informe PDF</a>||

		<table border =1>
		<tr>
            <td>  ID citacion :  </td>
            <td> <select name="ID">
        <?php
        $sql="SELECT Numero FROM citacion";
        $resul = mysqli_query($enlace,$sql);
        ?>
        <?php while ($row = mysqli_fetch_array($resul)) {
            echo '<option>'.$row["Numero"];}
            ?>
            </select> </td>
         </tr>   
         <tr>
		<tr>
            <td> Acuerdo :   </td>
            <td>  <input type="text" name="Acuerdo" placeholder="Acuerdo">  </td>
         </tr>
		 <tr>
            <td>  Estado:   </td>
            <td>   <select name="Estado" >
	<option value="">--- Estado ---</option>
	<option value="Pendiente">Pendiente</option>
	<option value="Completada">Completada</option>
	<option value="Cancelada">Cancelada</option>
</select>   </td>
         </tr>
		 <tr>
            <td>  Observacion:   </td>
            <td>  <input type="text" name="Observacion" placeholder="Observacion">  </td>
         </tr>
		 <tr>
		<td><input type="submit" class="btn" name="Actualizar" value="Actualizar"></td>
        </tr>



<?php
if(isset($_POST['Actualizar'])){
	$Acuerdo1 =$_POST['Acuerdo'];
	$Estado1 = $_POST['Estado'];
	$Observacion1 =$_POST['Observacion'];
	$numero1=$_POST ['ID'];
	

	$insertarDatos = "UPDATE citacion SET Acuerdo='$Acuerdo1', Estado='$Estado1', Observacion='$Observacion1' WHERE Numero = '$numero1'";

	$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

	if(!$ejecutarInsertar){
		echo"Error En la linea de sql";
	}
}
	if(isset($_POST['Crear'])){
		$Numero =$_POST["Codigo"];
        $Motivo =$_POST["Motivo"];
		$Caracter= $_POST["Caracter"];
		$RutAFun =$_POST["RutFun"];
		$RutApo =$_POST["RutApo"];
		$Fecha =$_POST["Fecha"];
		$Acuerdo ="Pendiente";
		$Estado = 'Pendiente';
		$FechaEmi =$_POST["FechaEmi"];
		$Observacion ="Pendiente";
	    $Confirma='por confirmar';
		

		$insertarDatos = "INSERT INTO citacion(`Numero`, `Motivo`, `Caracter`, `Rut_Funcionario`, `Rut_Apoderado`, `Fecha_programada`, `Acuerdo`, `Estado`, `Fecha_Hoy`, `Observacion`, `Confirmar_Reagendar`) 
		VALUES ('$Numero','$Motivo','$Caracter','$RutAFun','$RutApo','$Fecha','$Acuerdo','$Estado','$FechaEmi','$Observacion','$Confirma')";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error En la linea de sql";
		}
	}
?>