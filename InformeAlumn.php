<?php
/* este archivo se repite tantas veces como informes queramos tener*/
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="gestor";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
$queEmp = "SELECT * FROM estudiante";
$resEmp = mysqli_query($enlace, $queEmp) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				
				'Rut'=>'<b>Codigo</b>',
				'Rut_Apo'=>'<b>Nombre</b>',
				'Nombre_E'=>'<b>Caracter</b>',
				'Apellido_E'=>'<b>Estado</b>',
				'Fecha_Nac'=>'<b>Fecha</b>',
				'Curso'=>'<b>Curso</b>',
				'Estado'=>'<b>Estado</b>',
				
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>Estudiantes</b>\n";
$txttit.= " \n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>