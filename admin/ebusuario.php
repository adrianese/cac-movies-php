<?php 
require './../config/database.php';

if($_SERVER['REQUEST_METHOD']==='GET'){
    if(isset($_GET['usuario'])) {
        $id= intval($_GET['usuario']) ;
        echo '<h5> Editando / Borrando datos del usuario: '. $id.'<h5>' ;
        $db=conectarDB();
    }
    $query = "SELECT * FROM usuarios WHERE id_usuario = $id LIMIT 1;";
    $usuario= mysqli_query($db, $query);
    if ($usuario) {
        $usuario= mysqli_fetch_assoc($usuario);

    }
   

}
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
          
            <h2> Panel del Administrador: <span><?php echo $nombre ??'Admin';?></span></h2>
        <nav class="nav-enlaces">
            <a class="sesion" href="cerrar.php">Cerrar Sesión</a>
        </nav>
    </div>

</header>

    <main>
    <section >
           
           <form class="formulario" method="POST" action="admin5.php">
               <fieldset>
                   <legend>Editar / Borrar Usuario</legend>
   
                   <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'];?>">
           
               <div class="campo ">             
                   <input type="text" class="input-text" name="nombre"  autocomplete="off"
                    placeholder="Tu Nombre" value="<?php echo $usuario['nombre'];?>">      
               </div>
               <div class="campo">
                   <input type="text" class="input-text" name="apellido" autocomplete="off"
                    placeholder="Tu Apellido" value="<?php echo $usuario['apellido'];?>">
               </div>  
               <div class="campo">
                   <input type="email" class=" input-text" id="email"  name="email" autocomplete="off"
                   placeholder="Tu Correo" value="<?php echo $usuario['email'];?>"></input>
               </div>
               <div class="campo">
                   <input type="password" class=" input-text" name="password" autocomplete="off"
                   placeholder="Contraseña" value="<?php echo $usuario['password'];?>" ></input>
               </div>
               <div class="campo">
                 <label for="nombre" class="form-label">Fecha de Nacimiento</label>
                   <input type="date" class=" input-text" name="fecha_nac" autocomplete="off"
                   placeholder="Fecha de Nacimiento" max="2006-01-02" 
                   value="<?php echo $usuario['fecha_nac'];?>"></input>
               </div>
           
   
               <div class="campo">
               <label for="pais" class="form-label">País</label>
                   <select class="input-text" id="pais" value="<?php echo $usuario['pais'];?>" 
                   autocomplete="off" name="pais">
                       <option class="input-text" selected disabled >-Seleccione País-</option>
                       <option class="input-text" <?php  echo $usuario['pais'] ==='arg'?'selected':'';?> value="arg">Argentina</option>
                       <option class="input-text" <?php  echo $usuario['pais'] ==='bra'?'selected':'';?> value="bra">Brasil</option>
                       <option class="input-text" <?php  echo $usuario['pais'] ==='uru'?'selected':'';?> value="uru">Uruguay</option>
                       <option class="input-text" <?php echo $usuario['pais'] ==='par'?'selected':'';?> value="par">Paraguay</option>
                     </select>
               </div>
   
               <div class="campo">
                   <label class="label-legend"> ¿Quieres recibir información sobre los Estrenos?</label>

            

                
                <div class="campo">
                    <input type="radio" <?php echo $usuario['info']==='si' ? 'checked' : ''; ?> 
                    name="info" value= "si"> Si
                   <input type="radio" <?php echo $usuario['info']==='no' ? 'checked' : ''; ?> 
                   name="info" value= "no"> No  
                </div>
               
               <div class="">
                   <button type= "submit" class="boton" name="accion" value="editar" >Editar</button>    
                   <button type= "submit" class="boton" name="accion" value="borrar" >Borrar</button>    
               </div>     
               </fieldset>
           </form>
           </section>
    </main>
    
    <footer>
        <div class=" nav-pie nav-footer">
            <div class="nav-logo"></div>
            <nav class="nav-enlaces">   
            <a class="" href="">Copyright 2024</a>
            <a class="sesion" href="#">Administrador de Peliculas</a>
            </nav>
        </div>
    </footer>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="../js/usuario.js"></script>
    <script src="../js/admin.js"></script>

</body>
</html>



