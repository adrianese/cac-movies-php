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

<body class="body-marvel">

        
<header >
    <div class="nav-principal">
    <div class="link-logo animate__animated animate__tada ">
        <a class="logo-link" href="index.php">
        <img class="logo" src="img/film-solid.svg" alt="LOGO">
        CAC-Movies</a>
    </div>
    <nav class="nav-enlaces">
        <a class="" href="index.php#tendencias">Tendencias</a>
        <a class="" href="registrarse.php">Registrarse</a>
        <a class="sesion" href="login.php">Iniciar Sesión</a>
        <a class="" href="apimarvel.php">Api Marvel</a>
    </nav>
</div>
</header>

<section class="imagen-marvel">
        <div class="contenido-imagen-marvel">
            <h1 class="titulo-marvel">Bienvenido a la API de Marvel!</h1> 
                      
        </div>
 </section>
 <section>
    <nav class="solapa">
        <button class="actual" type="button" id="personaje">Personajes</button>
        <button class="" type="button"  id="comic">Comics</button>      
    </nav> 
 </section>
  
        
        <section id="seccionPers"  class="contenedor-mv">        
        <div class="container-chars" id="personajes"></div> 
        </section>       
        <section id="seccionComic"  class="contenedor-mv">       
            <div class="container-comics" id="comics"></div> 
        </section>

<div class="flotante">
    <a href="apimarvel.php">
      <img src="img/arrow-up-solid.svg" alt="UP-arrow" srcset="">
    </a>
    </div>
        <footer>
            <div class="nav-footer nav-pie">
                <nav class="nav-enlaces ">
                    <a class="" href="#">Terminos y Condiciones</a>
                    <a class="" href="#">Preguntas Frecuentes</a>
                    <a class="" href="#">Ayuda</a>
                    <a class="sesion" href="login.php">Administrador de Peliculas</a>
                </nav>
              </div>
        </footer>
       
        <script src="js/apimarvel.js"></script>
</body>

</html>