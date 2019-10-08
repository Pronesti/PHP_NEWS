<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noticias</title>
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
  ?>
<div>
<a href="/agregar_noticia.php">Agregar noticia</a>
<a href="/index.php">Volver</a>
    <h1>Noticias</h1>
    <?php
        $querydos = "SELECT * FROM noticias;";
        $resultadodos = $con->query($querydos);              
        ?>   
                <?php foreach ( $resultadodos as $rowsdos) {?>
                <hr>
                    <article>
                        <h1><?=$rowsdos["titulo"]?></h1>
                        <h3><?=$rowsdos["subtitulo"]?></h3>
                        <h4><?=$rowsdos["fecha"]?></h4>
                        <p><?=$rowsdos["noticia"]?></p>
                        <h4><?=$rowsdos["tema"]?></h4>
                        <h4><?=$rowsdos["escritor"]?></h4>
                    </article>
                <?php }?>
    </div>
</body>
</html>