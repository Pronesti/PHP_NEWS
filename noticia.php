<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noticias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CRUD PHP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="noticias.php">Noticias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="escritores.php">Escritores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="agregar_noticia.php">Agregar Noticia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="agregar_escritor.php">Agregar Escritor</a>
      </li>
    </ul>
  </div>
</nav>
<div>
    <h1>Noticia</h1>
    <?php
        $querydos = "SELECT * FROM noticias WHERE ID=$id_noticia;";
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
                        <a href="editar_noticia.php?id=<?=$rowsdos['id']?>" class="btn btn-warning">editar</a>
                        <a href="eliminar_noticia.php?id=<?=$rowsdos['id']?>" class="btn btn-danger">eliminar</a>
                    </article>
                <?php }?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>