    <?php 
    session_start();
    $nombre = $_SESSION['nombre'] ?? "Admin";
    $director_consulta= "";
    $mensaje="";
    if (isset($_GET['msj'])==2) {
    $mensaje = 'Todos los Campos Son Necesarios';
    $alerta = 'error';
    } 

    include './../config/database.php';
    $db = conectarDB();
    $query = "SELECT id_usuario, nombre, apellido, email, fecha_nac, pais, esadmin, info FROM usuarios;";
    $consulta_usuarios = mysqli_query($db, $query);

    ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAC-Movies</title>
    <link rel="stylesheet" href="./../normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../estilos.css">
    <!-- Animated -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="shortcut icon " href="./../img/film-solid.svg" type="image/x-icon">
   <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    

</head>
<body class="contenedor-admin">
        <header >
        <div class="nav-bg nav-principal">
            <div class="link-logo ">
                <a class="logo-link animate__animated animate__shakeX "  href="index.php">
               <img class="logo" src="./../img/film-solid.svg" alt="LOGO">
                CAC-Movies</a>
            </div>
            <h2> Panel del Administrador</h2>
        <nav class="nav-enlaces">
            <a class="sesion" href="admin.php">Volver</a>
            <a class="sesion" href="cerrar.php">Cerrar Sesión</a>
        </nav>
        </div>
        </header>
   
        <main class="seccion-admin">
            <section id="secPelis"  class="contenedor-mv">      
            
            <h2 class="tabla-titulo">Cargar Películas</h2>
                <?php if ($mensaje) { ?>
                    <div class="<?php echo $alerta; ?> ajuste">
                <?php echo $mensaje;?>
                    </div>
                <?php   } ?>
     
            <div class="div-director">
            <form class="form-admin" method="POST" enctype="multipart/form-data" action="admin3.php">
                <fieldset>
                <legend>Cargar Películas</legend>      
                    <label for="titulo">Título</label>
                    <input type="text" placeholder="Título" 
                    name="titulo" value="" id="">

                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="" placeholder="" 
                    cols="30" rows="10"></textarea>

                    <label for="genero">Género</label>
                    <input type="text" placeholder="Género" 
                    name="genero" value="" id="">  

                    <label for="calificacion">Calificación</label>
                    <input type="text" placeholder="Calificacion para el público: Ej ATP" 
                    name="calificacion" value=""> 
        
                    <label for="anio">Año Estreno</label>
                    <input type="number" min="1900" max="2025"  placeholder="Año Estreno" 
                    name="anio" value="" id="">

                    <label for="anio">Estrellas</label>
                    <input type="number" min="0" max="5"  placeholder="Estrellas: 1 ~ 5" 
                    name="estrellas" value="" id="">

                    <label for="imagen">Imagen</label>
                    <input type="file" placeholder="Imagen.webp" 
                    name="imagen"  accept="image/webp" value="">   
                    
                    <label for="director">Id del Director</label>
                    <input type="text" placeholder="Id del Director" 
                    name="director" value="" id="">
  
            <div class="">
                <button type= "submit" class="boton" name="guardar" value="guardar_peli" >Guardar</button>    
            </div> 
            </fieldset>
            </form>   
        </div>
        </section>   
        
    </main>
    
    <footer>
        <div class=" nav-pie nav-footer">
            <div class="nav-logo"></div>
            <nav class="nav-enlaces">   
            <a class="" href="">Copiright 2024</a>
            <a class="sesion" href="login.php">Administrador de Peliculas</a>
            </nav>
        </div>
    </footer>
  
   <script src="../js/admin.js"></script>
</body>
</html>