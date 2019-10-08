<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Escritor</title>
</head>
<body>
<?php
 $hostname 	= 'localhost';
 $database   = 'noticias_bd';
 $username 	= 'root';
 $password 	= '';
 
 try {
     $con = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
     //print "Conexión exitosa!";
}
catch (PDOException $e) {
     print "¡Error conexion base de datos!: " . $e->getMessage();
     die();
} 
$id_escritor = $_GET["id"];
$get_escritor = "SELECT * FROM escritores WHERE id=$id_escritor;";
$escritor = $con->query($get_escritor); 
foreach ($escritor as $rows) {
   $nombre_escritor = $rows["apellido"]; 
   $apellido_escritor = $rows["nombre"]; 
   $nombre_completo_escritor = $nombre_escritor . " " . $apellido_escritor;
}
?>
    <article><h2>Deseas Eliminar al escritor <?=$nombre_completo_escritor?>?</h2></article>
    <form action="eliminar_escritor.php?id=<?=$id_escritor?>" method="post">
    <input type="submit" name="delete" value="Si" /><a href="escritores.php"> Cancelar </a>
</form>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete']))
    {
        $delete_escritor_query = "DELETE * FROM escritores WHERE id=$id_escritor;";
        $delete_escritor = $con->query($delete_escritor_query); 
    }
?>
</body>
</html>