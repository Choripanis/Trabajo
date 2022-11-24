<?php
/* este archivo se repite tantas veces como informes queramos tener*/
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$servidor="sql108.260mb.net";
	$usuario="n260m_32818451";
	$clave="jnkt186d";
	$baseDeDatos="n260m_32818451_videoclub";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
$queEmp = "SELECT socio.NOMBRE as socio,video.NOMBRE,arriendo.FECARR,arriendo.FECDEV,arriendo.DEVOLU
FROM socio,arriendo,video
WHERE (arriendo.SOCIO=socio.CODIGO) AND (arriendo.VIDEO=video.CODIGO) and (arriendo.DEVOLU>arriendo.FECDEV)";
$resEmp = mysqli_query($enlace, $queEmp) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				
				'socio'=>'<b>Socio</b>',
				'FECARR'=>'<b>Fecha de arriendo</b>',
				'FECDEV'=>'<b>Fecha de devolucion</b>',
				'DEVOLU'=>'<b>Fecha real</b>',
				
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>PREGUNTA 6</b>\n";


$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>