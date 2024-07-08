<?php 
require './../config/database.php';
$mensaje="";
if($_SERVER['REQUEST_METHOD']==='GET'){
        $id_movie= $_GET['movie'];
        echo '<h5> Editando / Borrando datos de la Película: '. $id_movie. '</h5>';
    }

    $db=conectarDB();
    $query = "SELECT id_director, nombre, apellido FROM directores ORDER BY apellido ASC;";
    $consulta_directores = mysqli_query($db, $query);

    $query = "SELECT * FROM movies WHERE id_movie = $id_movie;";
    $consulta_movie = mysqli_query($db, $query);
    $movie=mysqli_fetch_assoc($consulta_movie);
    

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="./../estilos.css">
</head>
<body class="main-panel">
<header >
        <div class="nav-bg nav-principal">
            <div class="link-logo ">
                <a class="logo-link animate__animated animate__shakeX "  href="./../index.php">
               <img class="logo" src="../img/film-solid.svg" alt="LOGO">
                CAC-Movies</a>
            </div>
          
            <h2> Panel del Administrador: <span><?php echo $nombre ?? 'Admin';?></span></h2>
        <nav class="nav-enlaces">
            <a class="sesion" href="cerrar.php">Cerrar Sesión</a>
        </nav>
    </div>
</header>

<main class="seccion-admin">
    <section id="secPelis"  class="contenedor-mv">      
            
            <h2 class="tabla-titulo">Editar / Borrar Películas</h2>
      
                <?php if ($mensaje) { ?>
                    <div class="<?php echo $alerta; ?> ajuste">
                <?php echo $mensaje;?>
                    </div>
                <?php   } ?>
     
            <div class="div-director">
            <form class="formulario form-admin " method="POST" enctype="multipart/form-data" action="admin6.php">

            <input type="hidden"  name="id_movie" value="<?php echo $movie['id_movie'];?>" >
                <fieldset>
                <legend>Editar / Borrar Películas</legend>      
                    <label for="titulo">Título</label>
                    <input type="text" placeholder="Título" name="titulo" value="<?php echo $movie['titulo'];?>" >

                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" placeholder="" 
                    cols="30" rows="10"><?php echo $movie['descripcion'];?></textarea>

                    <label for="genero">Género</label>
                    <input type="text" placeholder="Género" name="genero" value="<?php echo $movie['genero'];?>" >  

                    <label for="calificacion">Calificación</label>
                    <input type="text" placeholder="Calificación para el público: Ej ATP" 
                    name="calificacion" value="<?php echo $movie['calificacion'];?>"> 
        
                    <label for="anio">Año Estreno</label>
                    <input type="number" min="1900" max="2025"  placeholder="Año Estreno" 
                    name="anio" value="<?php echo $movie['anio'];?>" >

                    <label for="estrellas">Estrellas</label>
                    <input type="number" min="0" max="5"  placeholder="Estrellas: 1 ~ 5" 
                    name="estrellas" value="<?php echo $movie['estrellas'];?>" >

                    <label for="imagen">Imagen</label>
                    <input type="file" placeholder="Imagen.webp" 
                    name="imagen"  accept="image/webp" value="">   
                
                    <label for="director">Director</label>   
                    <select class=""  value="" autocomplete="off" name="director">
                    <option class="input-text" selected disabled >-Seleccione el Director-</option>
                    <?php while($director= mysqli_fetch_assoc($consulta_directores)) { ?> 
                  
                    <option class="input-text" <?php  echo $director['id_director'] ===$movie['director']?'selected':'';?> value="<?php echo $director['id_director'];?>"><?php echo $director['nombre'];?> <?php echo $director['apellido'];?></option> 
                    
                    <?php } ?>
                </select>
         
                 
  
            <div class="">
                <button type= "submit" class="boton" name="accion" value="editar_peli" >Editar</button>  
                <button type= "submit" class="boton" name="accion" value="borrar_peli" >Borrar</button>     
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
            <a class="" href="">Copyright 2024</a>
            <a class="sesion" href="">Administrador de Peliculas</a>
            </nav>
        </div>
    </footer>
  

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="../js/usuario.js"></script>
    <script src="../js/admin.js"></script>

</body>
</html>



