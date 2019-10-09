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
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">CRUD PHP</a>
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
      <li class="nav-item active">
        <a class="nav-link" href="escritores.php">Escritores <span class="sr-only">(current)</a>
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
        <?php
        $query = "SELECT * FROM escritores;";
        $resultado = $con->query($query);        
        ?>   
            <table border="1" class="table m-3">
            <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Apellido</th>
      <th scope="col">Nombre</th>
      <th scope="col">Edad</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
                <?php foreach ( $resultado as $rows) {?>
                    <tr>
                        <th scope="row"><a href="escritor.php?id=<?=$rows['id']?>"><?=$rows["id"]?></a></td>
                        <td><?=$rows["apellido"]?></td>
                        <td><?=$rows["nombre"]?></td>
                        <td><?=$rows["edad"]?></td>
                        <td><a href="editar_escritor.php?id=<?=$rows['id']?>" class="btn btn-warning">editar</a></td>
                        <td><a href="eliminar_escritor.php?id=<?=$rows['id']?>" class="btn btn-danger">eliminar</a></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>