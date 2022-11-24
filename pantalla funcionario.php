<?php
session_start();
if (isset($SESSION[tipo])){
    echo "el usuario conectado es :".$SESSION[nom];
}else{
    session_destroy();
    header("location: log in citador.php");
}
?>
<html>
<head> <title>pantalla funcionario</title> 
</head>
<body bgcolor=FDDA7D>
    <center>
    <b> pantalla funcionario
        

</body>    
</html>