<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Noticia</title>
</head>
<body>
<form method="post" name="agregar_noticias" method="POST" action="agregar_noticia.php">
    <h4>Titulo:</h4>
    <input name="titulo" type="text"><br>
    <h4>Subtitulo:</h4>
    <input name="subtitulo" type="text"><br>
    <h4>Fecha:</h4>
    <input name="fecha" type="date"><br>
    <h4>Noticia:</h4>
    <input name="noticia" type="text"><br>
    <h4>Tema:</h4>
    <input name="tema" type="text"><br>
    <h4>Escritor:</h4>
    <input name="escritor" type="text"><br>
    <input type="submit" name="submit" value="Agregar Noticia">
    <button type="reset">Limpiar campos</button>
    </form>
    <a href="/index.php">Volver</a>
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
                } 
            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

?>