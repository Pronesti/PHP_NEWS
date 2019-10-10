<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escritores</title>
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
$id_escritor = $_GET["id"];
$get_escritor = "SELECT * FROM escritores WHERE id=$id_escritor;";
$escritor = $con->query($get_escritor); 
$get_publicaciones = "SELECT * FROM noticias WHERE escritor=$id_escritor  ORDER BY fecha DESC";
$publicaciones = $con->query($get_publicaciones); 
$get_cantidad_publicaciones = "SELECT COUNT(id) FROM noticias WHERE escritor=$id_escritor";
$query_cantidad_publicaciones = $con->query($get_cantidad_publicaciones);
$cantidad_publicaciones = $query_cantidad_publicaciones->fetch(PDO::FETCH_NUM);
$cantidad_publicaciones = (implode($cantidad_publicaciones));
$query_ultima_publicacion = "SELECT * FROM noticias WHERE escritor=$id_escritor  ORDER BY fecha DESC LIMIT 1";
$ultima_publicacion = $con->query($query_ultima_publicacion);
$id_ultima_publicacion = 1;
foreach($ultima_publicacion as $rows){
  $id_ultima_publicacion = $rows['id'];
};
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
        <h1>Escritor</h1>  
                <?php foreach ( $escritor as $rows) {?>

                    <div class="card" style="width: 18rem;">
  <div class="card-header">
  <?=$rows["id"]?> | <?=$rows["nombre"]?> <?=$rows["apellido"]?>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Edad: <?=$rows["edad"]?></li>
    <li class="list-group-item">Publicaciones: <?=$cantidad_publicaciones?></li>
    <li class="list-group-item">Ultima: <a href="noticia.php?id=<?=$id_ultima_publicacion?>">Link</a></li>
    <li class="list-group-item"><a href="editar_escritor.php?id=<?=$rows['id']?>" class="btn btn-warning">editar</a>
                        <a href="eliminar_escritor.php?id=<?=$rows['id']?>" class="btn btn-danger">eliminar</a></li>

  </ul>
</div>
<?php }?>
<div>
<br>
<hr>
<h3>Publicaciones de <?=$rows["nombre"]?> <?=$rows["apellido"]?>:</h3>
<?php foreach ( $publicaciones as $rowsdos) {?>
    <div class="card m-3" style="max-width: 50rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$rowsdos["titulo"]?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?=$rowsdos["subtitulo"]?></h6>
    <p class="card-text"><?=$rowsdos["noticia"]?></p>
    <ul class="list-group list-group-flush m-3">
    <li class="list-group-item">Tema: <?=$rowsdos["tema"]?></li>
    <li class="list-group-item">Fecha: <?=$rowsdos["fecha"]?></li>
    <li class="list-group-item">Escritor: <?=$rowsdos["escritor"]?></li>
  </ul>
    <a href="editar_noticia.php?id=<?=$rowsdos['id']?>" class="btn btn-warning">editar</a>
    <a href="eliminar_noticia.php?id=<?=$rowsdos['id']?>" class="btn btn-danger">eliminar</a>
  </div>
</div>
                <?php }?>
            </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>