<?php 
include './../config/database.php';
session_start();
$mov=$_SESSION['item'];
$usu=$_SESSION['id'];
$db=conectarDB();
/// guardar en id(usuario) el item (movie favorita)
$query= "INSERT INTO usuariosmovies (mov, usu) VALUES ('$mov', '$usu');";
$insertar = mysqli_query($db,$query);
header('Location: usuario.php?modo=favoritas');
?>