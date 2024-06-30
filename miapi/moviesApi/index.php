<?php 
    header("Content-Type: application/json");
    include '../../config/database.php';

    /////////////SE ESTA USANDO ESTE ARCHIVO PARA LISTAR TODAS LAS PELIS EN EL INDEX EN JS////////////////////

    $db= conectarDB();

    if ($_SERVER['REQUEST_METHOD']='GET') {    
        $query = " SELECT * FROM movies ;";
        $consulta = mysqli_query($db, $query);
        if ($consulta) {
        while ( $datos= mysqli_fetch_assoc($consulta)) { 
        $movies[]= $datos;}}echo json_encode($movies);exit;}?>







