<?php
include('db.php');
$usuario=$_POST['usuario'];
$password=$_POST['password'];



$consulta="SELECT*FROM apoderado where nombre='$usuario' and Clave='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:Home.php");

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
