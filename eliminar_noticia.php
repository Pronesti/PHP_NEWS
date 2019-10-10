<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Noticia</title>
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
$get_noticia = "SELECT * FROM noticias WHERE id=$id_noticia;";
$noticia = $con->query($get_noticia); 
foreach ($noticia as $rows) {
   $titulo_noticia = $rows["titulo"];
}
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
    <article><h2>Deseas Eliminar la noticia: <?=$titulo_noticia?>?</h2></article>
    <form action="eliminar_noticia.php?id=<?=$id_noticia?>" method="post">
    <div class="form-group">
    <label for="input_usuario">Usuario</label>
    <input type="text" name="usuario" class="form-control" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" name="clave" class="form-control">
  </div>
    <input type="submit" name="delete" value="Si" class="btn btn-warning"/><a href="noticias.php" class="btn btn-danger"> Cancelar </a>
</form>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete']))
    {
      $auth_query = "SELECT * FROM auth WHERE usuario = '".$_POST['usuario']."' AND clave = '".$_POST['clave']."'"; 
      $auth = $con->query($auth_query)->fetchObject();
        if($auth){
         $delete_noticia_query = "DELETE FROM noticias WHERE id=$id_noticia;";
        $delete_noticia = $con->query($delete_noticia_query);
        header('Location: noticias.php', true, 302);   
        }else{
          echo "<script type= 'text/javascript'>alert('Failed Authentication');</script>";
        };
        
    }
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>