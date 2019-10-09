<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Noticia</title>
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
$id_noticia = $_GET["id"];
$get_noticia = "SELECT * FROM noticias WHERE id=$id_noticia;";
$noticia = $con->query($get_noticia); 
foreach ($noticia as $rows) {
   $titulo_noticia = $rows["titulo"];
}
?>
    <article><h2>Deseas Eliminar la noticia: <?=$titulo_noticia?>?</h2></article>
    <form action="eliminar_noticia.php?id=<?=$id_noticia?>" method="post">
    <input type="submit" name="delete" value="Si" /><a href="noticias.php"> Cancelar </a>
</form>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete']))
    {
        $delete_noticia_query = "DELETE FROM noticias WHERE id=$id_noticia;";
        $delete_noticia = $con->query($delete_noticia_query);
    }
?>
</body>
</html>