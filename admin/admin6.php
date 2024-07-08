<?php 
require './../config/database.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $db=conectarDB();
   if ($_POST['accion']==='editar_peli') {
  
        $id_movie= $_POST['id_movie'];
        $titulo= $_POST['titulo'];
        $descripcion= $_POST['descripcion'];
        $genero= $_POST['genero'];
        $calificacion= $_POST['calificacion'];
        $anio= $_POST['anio'];
        $estrellas= $_POST['estrellas'];
        $director= $_POST['director'] ;
        
    
        if ((!$titulo) ||(!$descripcion) || (!$genero) ||(!$calificacion) || (!$anio) ||(!$estrellas) || (!$director))  {
          $mensaje ='Todos los campos son necesarios para la validación';
          $alerta = 'error';
        }
        if(empty($mensaje)){
          $query = " UPDATE movies SET titulo='$titulo', descripcion='$descripcion', genero= '$genero', calificacion='$calificacion',
         anio='$anio', estrellas='$estrellas', director= $director WHERE id_movie = $id_movie;";
          $update = mysqli_query($db,$query);
          if($update){header("Location:admin.php?msj=2");}}

        }elseif($_POST['accion']==='borrar_peli'){

            $id_movie=$_POST['id_movie'];
            $query= "DELETE FROM movies WHERE id_movie = $id_movie ;";
            $delete= mysqli_query($db, $query);
            if($delete){header("Location:admin.php?msj=3");}
   }
}
?>