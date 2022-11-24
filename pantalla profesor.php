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
<head> <title>pantalla profesor</title> 
</head>
<body bgcolor=FDDA7D>
    <b> pantalla profesor 

</body>    
</html>