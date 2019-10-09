<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Noticia</title>
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
        $querydos = "SELECT * FROM noticias WHERE id=$id_noticia;";
        $resultadodos = $con->query($querydos); 
  
foreach ( $resultadodos as $rowsdos) {
    $leer_titulo = $rowsdos["titulo"];
    $leer_subtitulo = $rowsdos["subtitulo"];
    $leer_fecha = $rowsdos["fecha"];
    $leer_noticia = $rowsdos["noticia"];
    $leer_tema = $rowsdos["tema"];
    $leer_escritor = $rowsdos["escritor"];
 }

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">CRUD PHP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
<form method="post" name="editar_noticia" method="POST" action="editar_noticia.php?id=<?=$id_noticia?>">
    <label>Titulo:</label>
    <input name="titulo" type="text" value=<?=$leer_titulo?> class="form-control"><br>
    <label>Subtitulo:</label>
    <input name="subtitulo" type="text" value=<?=$leer_subtitulo?> class="form-control"><br>
    <label>Fecha:</label>
    <input name="fecha" type="date" value=<?=$leer_fecha?> class="form-control"><br>
    <label>Noticia:</label>
    <input name="noticia" type="text" value=<?=$leer_noticia?> class="form-control"><br>
    <label>Tema:</label>
    <input name="tema" type="text" value=<?=$leer_tema?> class="form-control"><br>
    <label>Escritor:</label>
    <input name="escritor" type="text" value=<?=$leer_escritor?> class="form-control"><br>
    <input type="submit" name="submit" value="Editar Noticia" class="btn btn-primary">
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
        if(isset($_POST["submit"])){
            try{
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // <== add this line
                $con->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
            global $id_noticia;
            $condition = 'id = '. $id_noticia;
            echo $condition;
            $update_noticia = "UPDATE noticias SET titulo='".$_POST['titulo']."', subtitulo='".$_POST['subtitulo']."',fecha='".$_POST['fecha']."', noticia = '".$_POST['noticia']."', tema = '".$_POST['tema']."', escritor = '".$_POST['escritor']."' WHERE $condition";
            echo $update_noticia;
            if ($con->query($update_noticia)) {
                $location_url = "Location: noticia.php?id=" . $id_noticia;
                echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
                header($location_url, true, 302);
                }
                else{
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                } 
            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

    ?>