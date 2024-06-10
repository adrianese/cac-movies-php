
<?php 
 include './config/database.php';
 $db= conectarDB();

  $mensaje="";
  $nombre= "";
  $apellido= "";
  $email= "";
  $password= "";
  $fecha_nac= "";
  $pais= "";
  $info= "";
  $esadmin= 0;
  

if ($_SERVER['REQUEST_METHOD']==='POST') {
     //debuguear($_POST);

    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $email= $_POST['email'];
    $password= $_POST['password'];

    $fecha_nac= $_POST['fecha_nac'];
    $pais= $_POST['pais'] ?? null;
    $info= $_POST['info'] ?? null;
    $esadmin= 0;
    

    if ((!$nombre) ||(!$apellido) || (!$email) ||(!$password) || (!$fecha_nac) ||(!$pais) || (!$info))  {
      $mensaje ='Todos los campos son necesarios para la validación';
      $alerta = 'error';
    }
    
    if(empty($mensaje)){
      $query = " INSERT INTO usuarios (nombre, apellido, email, password, fecha_nac, pais, esadmin, info)
      VALUES ( '$nombre', '$apellido', '$email', '$password', '$fecha_nac', '$pais', $esadmin, '$info');";
      $insertar = mysqli_query($db,$query);

      if ($insertar) {
        header("Location: /login.php?msj=1"); 
      }

   
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAC Movie</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <!-- Animated -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="shortcut icon " href="img/film-solid.svg" type="image/x-icon">
    
</head>

  <body class="contenedor imagen-sec">
    <header >         
          <div class="nav-bg nav-principal">
              <div class="link-logo animate__animated animate__shakeX  ">
                <a class="logo-link"  href="index.php">
               <img class="logo" src="img/film-solid.svg" alt="LOGO">
                CAC-Movies</a>
            </div>
            <nav class="nav-enlaces">
              <a class="" href="index.php#tendencias">Tendencias</a>
              <a class="" href="registrarse.php">Registrarse</a>
              <a class="sesion" href="login.php">Iniciar Sesión</a>
              <a class="link-mv" href="apimarvel.php">API<img src="img/Marvel_Logo.svg" alt="logo" class="logo-marvel"></a>
          
            </nav>
          </div>
    </header>
    <section >
           
        <form class="formulario" method="POST" action="">
            <fieldset>
                <legend>Registro</legend>

           <?php if ($mensaje) { ?>
              <div class="<?php echo $alerta; ?>">
                <?php echo $mensaje;?>
              </div>
         <?php   } ?>
             
        
            <div class="campo ">             
                <input type="text" class="input-text" name="nombre"  autocomplete="off"
                 placeholder="Tu Nombre" value="<?php echo $nombre;?>">      
            </div>
            <div class="campo">
                <input type="text" class="input-text" name="apellido" autocomplete="off"
                 placeholder="Tu Apellido" value="<?php echo $apellido;?>">
            </div>  
            <div class="campo">
                <input type="email" class=" input-text" id="email"  name="email" autocomplete="off"
                placeholder="Tu Correo" value="<?php echo $email;?>"></input>
            </div>
            <div class="campo">
                <input type="password" class=" input-text" name="password" autocomplete="off"
                placeholder="Contraseña" value="" ></input>
            </div>
            <div class="campo">
              <label for="nombre" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class=" input-text" name="fecha_nac" autocomplete="off"
                placeholder="Fecha de Nacimiento" max="2006-01-02" value="<?php echo $fecha_nac;?>"></input>
            </div>

            <div class="campo">
                <select class="input-text" id="pais" value="<?php echo $pais;?>" autocomplete="off" name="pais">
                    <option class="input-text" selected disabled >-Seleccione País-</option>
                    <option class="input-text" value="arg">Argentina</option>
                    <option class="input-text" value="bra">Brasil</option>
                    <option class="input-text" value="uru">Uruguay</option>
                    <option class="input-text" value="par">Paraguay</option>
                  </select>
            </div>

            <div class="campo">
                <label class="label-legend"> ¿Quieres recibir información sobre los Estrenos?</label>
                <div> <input type="radio" name="info" value= "si" >Si</div>
                <div> <input type="radio" name="info" value= "no" >No</div>
            </div>  
            <div class="">
                <button type= "submit" class="boton" name="guardar" >Registrarse</button>    
            </div>     
            </fieldset>
        </form>
        </section>

        
 
  </body>
</html>