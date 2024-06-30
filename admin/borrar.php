<?php 
require './../config/database.php';
if($_SERVER['REQUEST_METHOD']==='GET'){
    if(isset($_GET['usuario'])){
        $id_usuario= $_GET['usuario'];
        echo '<h2> Borrando datos del usuario:'. $id_usuario. '</h2>';
    }elseif(isset($_GET['movie'])) {
            $id_movie= $_GET['movie'];
            echo '<h2> Borrando datos de la Película:'. $id_movie. '</h2>';       
    } 
}?>


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

    <main>
    <section id="secPeliculas"  class="contenedor-mv">       
    </section>
    </main>
    
 
    <footer>
        <div class=" nav-pie nav-footer">
            <div class="nav-logo"></div>
            <nav class="nav-enlaces">   
            <a class="" href="">Copiright 2024</a>
            <a class="sesion" href="admin.php">Administrador de Peliculas</a>
            </nav>
        </div>
    </footer>
  

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="../js/usuario.js"></script>
    <script src="../js/admin.js"></script>

</body>
</html>



