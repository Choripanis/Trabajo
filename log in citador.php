
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
<head> <title>Log in</title> 
</head>
<body bgcolor=FDDA7D>
    <form action="" method=""postb>
        <center>
            <b> Log in 
                <br>
                <br>
                usuario: <input type="text" values="" name="txtuser" maxLength="20">
                <br>
                clave: <input type="password" values="" name="txtpassword" maxlength="10">
                <br>
                <input type=submit name="btnconfirmar" value="confirmar" >
                <br>
                <input type=submit name="btnentrar" value="acceder" >
                <br>
                <?php
                error_reporting(0);
                isset($_post ["btnconfirmar"]);
                $username= $_post['txtuser'];
                $password= $_post['txtpassword'];
                $sql= " select * from  users where username = '$username' and password = '$password '";
                $re4sult = mysql_query ($sql) or die (mysql_error());
                $nemrows = mysql_num_rows($result);
                if($numrows > 0 )
                {
                    echo 'listo ';
                }
                else
                {
                 echo 'clave incorrecta';
                }
                 ?>
                 <?php
        if ($_POST['btnentrar']=="acceder"){
            include("funiciones.php");
            $cnn = conectar();
            $us= $_POST['txtUser'];
            $pa=$_POST['txtPasword'];
            $sql="select * from usuario where usua= '$us'and pass ='$pa'";
            $rs= mysqli_query($cnn,$sql);
            if (mysqli_num_rows($rs)!=0){
                $SESSION[nom]=$row[1];//el nombre
                $SESSION[car]=$row[2];//el cargo
                $SESSIONt[tip]=$row[3];//el tipo
                switch($SESSIONt[tip]){
                    case 1:
                        echo "<script>alert('usted es $SESSION[nom] y es $SECCION[car] ')</script >";
                        echo "<script type= 'text/javascript'>window.location='pantalla alumno.php' </script>";
                        break;
                    case 2:
                        echo "<script>alert('usted es $SESSION[nom] y es $SECCION[car]')</script >";
                        echo "<script type= 'text/javascript'>window.location='pantalla profesor.php' </script>";
                        break;
                    case 3:
                        echo "<script>alert('usted es $SESSION[nom] y es $SECCION[car]')</script >";
                        echo "<script type= 'text/javascript'>window.location='pantalla apoderado.php' </script>";
                        break;
                    case 4:
                        echo "<script>alert('usted es $SESSION[nom] y es $SECCION[car]')</script >";
                        echo "<script type= 'text/javascript'>window.location='pantalla funcionario.php' </script>";
                        break;
                    default:
                       echo "<script>alert('usted no es un Usuario)</script >";
                       echo "<script type= 'text/javascript'>window.location='log in.php' </script>";


                }
            }

        } else{
            echo "<script>alert('usuario o clave incorrecta')</script>";
        }



        ?>        

</body>    
</html>