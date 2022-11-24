<?php
/* este archivo se repite tantas veces como informes queramos tener*/
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="aaaa";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
$queEmp = "SELECT * FROM citacion";
$resEmp = mysqli_query($enlace, $queEmp) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				
				'Numero'=>'<b>Codigo</b>',
				'Motivo'=>'<b>Nombre</b>',
				'Caracter'=>'<b>Caracter</b>',
				'Estado'=>'<b>Estado</b>',
				'Rut_Funcionario'=>'<b>Rut Funcionario</b>',
				'Rut_Apoderado'=>'<b>Rut Apoderado</b>',
				'Fecha_Programada'=>'<b>Fecha</b>',
				'Acuerdo'=>'<b>Acuerdo</b>',
				'Estado'=>'<b>Estado</b>',
				'Observacion'=>'<b>Observacion</b>',
				'Confirmar_Reagendar'=>'<b>Confirmacion</b>',
				
				
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>550
			);
$txttit = "<b>Citaciones</b>\n";
$txttit.= " \n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>