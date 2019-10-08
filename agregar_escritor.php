<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Escritor</title>
</head>
<body>
<form method="post" name="agregar_escritor" method="POST" action="agregar_escritor.php">
    <h4>Apellido:</h4>
    <input name="apellido" type="text"><br>
    <h4>Nombre:</h4>
    <input name="nombre" type="text"><br>
    <h4>Edad:</h4>
    <input name="edad" type="text"><br>
    <input type="submit" name="submit" value="Agregar Escritor">
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
            $submitnoticia = "INSERT INTO escritores (apellido, nombre, edad) 
            VALUES (
            '".$_POST['apellido']."',
            '".$_POST['nombre']."',
            '".$_POST['edad']."'
            );";
            if ($con->query($submitnoticia)) {
                header('Location: escritores.php', true, 302);
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