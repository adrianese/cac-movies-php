<?php 
include './config/database.php';
$db= conectarDB();

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
<body class="contenedor">
    <header >
        <div class="nav-principal">
        <div class="link-logo animate__animated animate__tada ">
            <a class="logo-link" href="index.php">
            <img class="logo" src="img/film-solid.svg" alt="LOGO">
            CAC-Movies</a>
        </div>
        <nav class="nav-enlaces">
            <a class="" href="#tendencias">Tendencias</a>
            <a class="" href="registrarse.php">Registrarse</a>
            <a class="sesion" href="login.php">Iniciar Sesión</a>
            <a class="link-mv" href="apimarvel.php">API<img src="img/Marvel_Logo.svg" alt="logo" class="logo-marvel"></a>
        </nav>
    </div>
    </header>
    <section class="imagen">
      <div class="contenido-imagen">
        <h1>Películas y series ilimitadas en un solo lugar</h1>
            <h3>Disfruta donde quieras.</h3>
            <h3>Cancela en cualquier momento.</h3>
            <a class="boton" href="registrarse.php">Registrate</a>
            </div>
    </section>
    <main class="principal">
     
        <section class="buscador buscadorTitulo ">
            <h3 class="">¿Qué estas buscando para ver?</h3>
            <div id="parrafo" class="parrafo ocultarpag"><p><i>Buscar por Nombre o Género: accion, animada, aventura, comedia, drama, terror.</i></p></div>
            <div class="input-buscador">
            <input id="inputBuscar"  name="inputBuscar" class="campo-buscador campo-pag" value="" type="text" placeholder="   Buscar por Nombre o Género...">
            <input id="btnBuscador" name="buscar" class="campo boton campo-pag" type="submit" value="Buscar">
            </div>
            <h3 class="resultados"></h3>
        </section>
        
        <section id="resultBuscador" class=" grilla-sesion ">
            <div class="no-result"></div>
        </div>
    
        </section>

      
           
    
        
    
        <section id="tendencias" class="grilla-sesion ">
            <h3>Las Tendencias de Hoy</h3>
        <div class="grilla">


        </section>
        <section class="buscador "> 
          <div id="paginacion" class="input-buscador paginacion">
            <button id="anterior" class=" campo-pag boton" name="pagant">&laquo; Anterior</button>
            <input type="hidden" id="pindex" name="pindex" value="<?php echo $pageindex;?>">
            <button id="siguiente" class="campo-pag boton" name="pagsig" >Siguiente &raquo;</button>   
          </div>
          </section>  

          <section id="tendencias" class="grilla-sesion ">  
           
            </div>
          </section>  
        <section class="aclamadas">
            <h3>Las Más Aclamadas</h3>

          
            <div class="grilla-a">
            <?php 
            
            $aclamadas = "SELECT * FROM movies ORDER BY estrellas DESC LIMIT 10";
            $resultado = mysqli_query($db, $aclamadas);
            
            while ( $movie= mysqli_fetch_assoc($resultado)) { ?>
            <div class="movie-cell">    
                    <img src="img/<?php echo $movie["id_movie"];?>.webp" alt="img movie" class="movie-a" > 
                    <p class="p-star"><?php echo round(($movie['estrellas']/2), 1);?>
                 
                    <img src="img/star-regular.svg" alt="star" class="img-star" srcset=""></p>     
            </div>
            <?php  } ?>
        </div>
       
        </section>
    </main>
<div class="flotante">
<a href="index.php">
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
   

    <script src="js/app.js"></script>
</body>
</html>