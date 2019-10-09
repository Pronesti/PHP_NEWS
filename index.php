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
<div class="card">
  <div class="card-body">
  <h2>Trabajo práctico evaluativo</h2>
<p>Se tendrá que desarrollar el trabajo práctico con dos entregas, iniciando el lunes 7 de octubre finalizando el martes 15 de octubre hasta las 24 hs. </p>
<ul>
<li>Las entregas se realizarán el lunes 7 primera entrega, se subirá al drive. </li>
<li>La segunda entrega el 15 de octubre hasta las 24 hs.</li>
<li>Entrega del trabajo práctico Individual.</li>
<li>La entrega del trabajo práctico se realizará en un zip en el drive.  El formato del nombre deberá ser  :  07_10_2019_andrea_abrudsky.zip</li>
<li>Desarrollar el software sin Frameworks.</li>
</ul>
<h3>Desarrollo</h3>

<h6>Se debe desarrollar un gestor de noticias, involucrando todos los temas dados en clases :</h6>
<ul>
<li>Variables</li>
<li>Operadores</li>
<li>Estructuras de control</li>
<li>Estructuras repetitivas</li>
<li>Arrays </li>
<li>Include / requiere</li>
<li>Get/post/request</li>
<li>Base de datos PDO</li>
<li>Sesiones</li>
<li>Objetos Clases</li>
<li>Manejo de errores</li>
</ul>

<h6>Características del proyecto: </h6>

<h6>El gestor de noticias debe ser capaz de : </h6>
<ul>
<li>La página principal muestra un listado con los escritores</li>
<li>Los datos del escritor deben estar en una tabla en la base de datos</li>
<li>Apellido</li>
<li>Nombre</li>
<li>Edad</li>
<li>Última publicación (se extrae de la ultima noticia publicada por el escritor)</li>
<li>Cantidad de publicaciones ( se extrae de la cantidad de noticias publicadas por el escritor)</li>
<li>Al presionar sobre un escritor se despliega un listado de las noticias escritas por el.</li>
<li>El orden de las noticias listadas debe mostrar primero las últimas escritas.</li>
</ul>
<h6>Una noticia debe tener:</h6>
<ul>
<li>Título
<li>Subtitulo
<li>Fecha
<li>Noticia-Desarrollo
<li>Tema
<li>Escritor
</ul>
<ul>
<li>Las noticias se deben traer de una base de datos</li>
<li>Una noticia puede ser borrada ó editada</li>
<li>Antes de borrar o editar una noticia  Se debe pedir el ingreso de un usuario y clave para poder realizar el cambio.</li>
<li>La clave y usuario debe estar en una tabla dentro de la base de datos</li>
<li>Se debe crear una página para Cargar las nuevas noticias </li>
<li>Antes de crear una noticia  Se debe pedir el ingreso de un usuario y clave para poder realizar el cambio.</li>
</ul>
<h6>Se evalúa:</h6>
<ul>
<li>Individualismo en el desarrollo</li>
<li>Originalidad en el desarrollo</li>
<li>El uso de las herramientas php dictadas en la clase.</li>
<li>Funcionamiento de la aplicación final.</li>
<li>Todo lo que se le incorpore suma. (diseño, mas funcionalidades, etc.)</li>
</ul>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
