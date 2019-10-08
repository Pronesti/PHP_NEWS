<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escritores</title>
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
<a href="/agregar_escritor.php">Agregar escritor</a>
<a href="/index.php">Volver</a>
        <h1>Escritores</h1>
        <?php
        $query = "SELECT * FROM escritores;";
        $resultado = $con->query($query);              
        ?>   
            <table border="1">
                <?php foreach ( $resultado as $rows) {?>
                    <tr>
                        <td><?=$rows["id"]?></td>
                        <td><?=$rows["apellido"]?></td>
                        <td><?=$rows["nombre"]?></td>
                        <td><?=$rows["edad"]?></td>
                        <td><?=$rows["cant_publi"]?></td>
                    </tr>
                <?php }?>
            </table>
    </div>
</body>
</html>