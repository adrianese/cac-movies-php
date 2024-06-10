<?php 
session_start();
$nombre = $_SESSION['nombre'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAC-Movies</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <!-- Animated -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="shortcut icon " href="img/film-solid.svg" type="image/x-icon">
    

</head>
<body class="contenedor-resumen">
    <header >
        <div class="nav-bg nav-principal">
            <div class="link-logo ">
                <a class="logo-link animate__animated animate__shakeX "  href="index.php">
               <img class="logo" src="img/film-solid.svg" alt="LOGO">
                CAC-Movies</a>
            </div>
        <nav class="nav-enlaces">
            <a class="" href="index.php#tendencias">Tendencias</a>
            <a class="" href="registrarse.php">Registrarse</a>
            <a class="sesion" href="login.php">Iniciar Sesión</a>
        </nav>
    </div>
    </header>
        <main class="">
           
          <h1> Página del Administrador</h1>
          <br>
          <h2>Bienvenid@ <?php echo $nombre;?></h2>
        </main>
    
    

    <footer>
        <div class=" nav-pie nav-footer">
            <div class="nav-logo">
             
            </div>
            <nav class="nav-enlaces">
                <a class="" href="#">Terminos y Condiciones</a>
                <a class="" href="#">Preguntas Frecuentes</a>
                <a class="" href="#">Ayuda</a>
                <a class="sesion" href="login.php">Administrador de Peliculas</a>
            </nav>
            </div>
    </footer>
  
   
</body>
</html>