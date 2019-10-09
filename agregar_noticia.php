<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Noticia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CRUD PHP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="noticias.php">Noticias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="escritores.php">Escritores</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="agregar_noticia.php">Agregar Noticia <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="agregar_escritor.php">Agregar Escritor</a>
      </li>
    </ul>
  </div>
</nav>
<div class="card m-3 p-2">
<form method="post" name="agregar_noticias" method="POST" action="agregar_noticia.php">
<div class="form-group">
    <label for="input_usuario">Usuario</label>
    <input type="text" name="usuario" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" name="password" class="form-control">
  </div>
  <hr>
    <label>Titulo:</label>
    <input name="titulo" type="text" class="form-control"><br>
    <label>Subtitulo:</label>
    <input name="subtitulo" type="text" class="form-control"><br>
    <label>Fecha:</label>
    <input name="fecha" type="date" class="form-control"><br>
    <label>Noticia:</label>
    <input name="noticia" type="text" class="form-control"><br>
    <label>Tema:</label>
    <input name="tema" type="text" class="form-control"><br>
    <label>Escritor:</label>
    <input name="escritor" type="text" class="form-control"><br>
    <input type="submit" name="submit" value="Agregar Noticia" class="btn btn-primary">
    <button type="reset" class="btn btn-danger">Limpiar campos</button>
    </form>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

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

        if(isset($_POST["submit"])){
            try{
              $auth_query = "SELECT * FROM auth WHERE usuario = '".$_POST['usuario']."' AND password = '".$_POST['password']."'"; 
              echo $auth_query;
        $auth = false;
        $auth = $con->query($auth_query);
        var_dump($auth);
        var_dump($auth->rowCount() < 0);  
          if($auth->rowCount() < 0){
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // <== add this line
                $con->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
            $submitnoticia = "INSERT INTO noticias (titulo, subtitulo, fecha, noticia, tema, escritor) 
            VALUES (
            '".$_POST['titulo']."',
            '".$_POST['subtitulo']."',
            '".$_POST['fecha']."',
            '".$_POST['noticia']."',
            '".$_POST['tema']."',
            '".$_POST['escritor']."'
            );";
            if ($con->query($submitnoticia)) {
                header('Location: noticias.php', true, 302);
                echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
                }
                else{
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                }} 
            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

?>