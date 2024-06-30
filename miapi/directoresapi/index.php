<?php 
    header("Content-Type: application/json");
    include '../../config/database.php';

    /////////////SE ESTA USANDO ESTE ARCHIVO PARA LISTAR TODOS LOS DIRECTOTES EN ADMIN ////////////////////

    $db= conectarDB();
  
    if ($_SERVER['REQUEST_METHOD']='GET') {
        $query = " SELECT * FROM directores ;";
        $consulta = mysqli_query($db, $query);
        if ($consulta) {
        while ( $datos= mysqli_fetch_assoc($consulta)) { 
        $directores[]= $datos;}}echo json_encode($directores);exit;}?>

