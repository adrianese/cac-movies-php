<?php 
    session_start();
    $nombre = $_SESSION['nombre'] ?? "Admin";
    $director_consulta= "";

    $mensaje="";
if (isset($_GET['msj'])==1) {
  $mensaje = 'Registro Guardado Correctamente';
  $alerta = 'exito';
} 
    include './../config/database.php';
    $db = conectarDB();
    $query = "SELECT id_usuario, nombre, apellido, email, fecha_nac, pais, esadmin, info FROM usuarios;";
    $consulta_usuarios = mysqli_query($db, $query);

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
                <a class="logo-link animate__animated animate__shakeX "  href="../index.php">
               <img class="logo" src="../img/film-solid.svg" alt="LOGO">
                CAC-Movies</a>
            </div>
          
            <h2> Panel del Administrador: <span><?php echo $nombre;?></span></h2>
        <nav class="nav-enlaces">
            <a class="sesion" href="cerrar.php">Cerrar Sesión</a>
        </nav>
    </div>

</header>

    <div class="btn-menu">
        <span><img class="icon" src="../img/bars.svg" alt=""></span>
    </div>
    <nav class="sidebar">
        <div class="text">Seleccionar: </div>
        <ul>
            <li><a href="admin.php#secUsuarios">Ver Usuarios</a></li>
            <li><a href="admin.php#secPeliculas">Ver Películas</a></li>
            <li><a href="admin2.php">Cargar Director</a></li>
            <li><a href="admin4.php">Cargar Películas</a></li>
            <li><a href="cerrar.php">Cerrar Sesión</a></li>

        </ul>
    </nav>

    <main id="todas" class="main-panel">
        <section class="contenedor-mv ajuste">
        <?php if ($mensaje) { ?>
              <div class="<?php echo $alerta; ?> ajuste">
                <?php echo $mensaje;?>
              </div>
         <?php   } ?>

        </section>

    <section id="secUsuarios"  class="contenedor-mv">       
        <h3 class=" mov-titulo">Usuarios Registrados</h3>
            <table class="tabla">
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha</th>
                <th scope="col">Pais</th>
                <th scope="col">EsAdmin</th>
                <th scope="col">Info</th>
                <th scope="col">Editar/Borrar</th>
                </tr>
            </thead>
            <tbody>
            <?php while($usuario= mysqli_fetch_assoc($consulta_usuarios)) { ?>
                <tr>
                <th scope="row"><?php echo $usuario['id_usuario'];?></th>
    
                <td> <?php echo $usuario['nombre'];?></td>
                <td><?php echo $usuario['apellido'];?></td>
                <td><?php echo $usuario['email'];?></td>
                <td><?php echo $usuario['fecha_nac'];?></td>
                <td><?php echo $usuario['pais'];?></td>
                <td><?php echo $usuario['esadmin'];?></td>
                <td><?php echo $usuario['info'];?></td>
                <td> <div class="div-iconos"><a href="#"> <img src="./../img/pen-solid.svg" class="logo" alt="" srcset=""></a><a href="#"><img src="./../img/trash-solid.svg" class="logo" alt="" srcset="">
                </a></div></td>
      
                </tr>
            <?php }?>

            </tbody>
            </table>
        </section>
  
        <?php 

    $nombre = $_SESSION['nombre'] ?? "Admin";
    $director_consulta= "";
  
  
    $query= "SELECT movies.id_movie, movies.titulo , movies.genero, movies.calificacion , movies.anio , movies.estrellas, movies.imagen, directores.nombre, directores.apellido
FROM movies INNER JOIN directores 
ON movies.director = directores.id_director
ORDER BY movies.id_movie;";
    //$query = "SELECT * FROM movies;";
    $consulta_movies = mysqli_query($db, $query);

    ?>
  
    
    <section id="secPeliculas"  class="contenedor-mv">       
    <h3 class="mov-titulo">Listado de Películas</h3>
            <table class="tabla">
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Género</th>
                <th scope="col">Calificación</th>
                <th scope="col">Año Estreno</th>
                <th scope="col">Estrellas</th>
                <th scope="col">Director</th>
                <th scope="col">Imagen</th>
                <th scope="col">Editar/Borrar</th>
                </tr>
            </thead>
            <tbody>
            <?php while($usuario= mysqli_fetch_assoc($consulta_movies)) { ?>
                <tr>
                <th scope="row"><?php echo $usuario['id_movie'];?></th>
    
                <td> <?php echo $usuario['titulo'];?></td>
                <td><?php echo $usuario['genero'];?></td>
                <td><?php echo $usuario['calificacion'];?></td>
                <td><?php echo $usuario['anio'];?></td>
                <td><?php echo $usuario['estrellas'];?></td>
                <td><?php echo $usuario['nombre'];?>  <?php echo $usuario['apellido'];?></td>
                <td> <img src="./../img/<?php echo $usuario['imagen'].'.webp';?>" width="80" alt=""> </td>
                <td> <div class="div-iconos"><a href="#"> <img src="./../img/pen-solid.svg" class="logo" alt="" srcset=""></a><a href="#"><img src="./../img/trash-solid.svg" class="logo" alt="" srcset="">
                </a></div></td>
      
                </tr>
            <?php }?>
            </tbody>
            </table>
        </section>


        <div class="flotante"> <a href="admin.php"><img src="./../img/arrow-up-solid.svg" class="logo" alt="" srcset=""></a></div>
     
 

    
    </main>
   
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="../js/usuario.js"></script>
    <script src="../js/admin.js"></script>

</body>
</html>



