<?php 
session_start();
include './../config/database.php';
$db=conectarDB();

if ($_SERVER['REQUEST_METHOD'] ==='POST') {
    if ($_POST['guardar']==='guardar_peli') {
        $titulo= $_POST["titulo"];
        $descripcion= $_POST["descripcion"];
        $genero= $_POST["genero"];
        $calificacion= $_POST["calificacion"];
        $anio= $_POST["anio"];
        $estrellas= $_POST["estrellas"];
        $imagen = $_FILES['imagen']['tmp_name'];
        $director= $_POST["director"];



     if ((!$titulo) ||(!$descripcion) || (!$genero) ||(!$calificacion) || (!$anio) ||(!$estrellas) || (!$imagen) || (!$director))  {
     $mensaje ='Todos los campos deben completarse';
     $alerta = 'error';
     header('Location: admin4.php?msj=2');
     }
  
    if(empty($mensaje)){
      $destino = './../img' ; // Carpeta donde se guarda.
      $nombre_imagen= uniqid(); // Generacion de nombre
      move_uploaded_file ( $_FILES [ 'imagen' ][ 'tmp_name' ], $destino. '/'. $nombre_imagen.'.webp');  // Subimos el archivo

    $query= "INSERT INTO movies (titulo, descripcion, genero, calificacion, anio, estrellas, director, imagen)
    VALUES ( '$titulo', '$descripcion', '$genero', '$calificacion', '$anio', '$estrellas', '$director', '$nombre_imagen');";
    // debuguear($query);
    $insertar = mysqli_query($db,$query);


    if ($insertar) {
      header("Location: admin.php?msj=1"); 
    }

    }
        
    }


    if ($_POST['guardar']==='guardar_dire') {
      //debuguear($_POST);
      $nombre= $_POST["nombre"];
      $apellido= $_POST["apellido"];
      $anio_nac= $_POST["anio_nac"];
      $nacionalidad= $_POST["nacionalidad"];
   
 
  if ((!$nombre) ||(!$apellido) || (!$anio_nac) ||(!$nacionalidad))  {
  $mensaje ='Todos los campos deben completarse';
  $alerta = 'error';
  header('Location: admin2.php?msj=2');
  }

  if(empty($mensaje)){
  $query= "INSERT INTO directores (nombre, apellido, anio_nac, nacionalidad)
  VALUES ( '$nombre', '$apellido', '$anio_nac', '$nacionalidad');";
  //debuguear($query);
  $insertar = mysqli_query($db,$query);


  if ($insertar) {
    header("Location: admin.php?msj=1"); 
  }

  }
      
  }


}

