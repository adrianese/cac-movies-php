<?php 
$mensaje="";
if (isset($_GET['msj'])==1) {
  $mensaje = 'Datos Guardados correctamente, podes Iniciar Sesión';
  $alerta = 'exito';
} 
include 'config/database.php';
if ($_SERVER['REQUEST_METHOD'] ==='POST') {
    $db= conectarDB();
    $email= $_POST['email'];
    $password= $_POST['password'];
    $query= " SELECT nombre, email, password, esadmin FROM usuarios WHERE (email = '$email') AND (password = '$password');";
    $datos = mysqli_query($db, $query);
    $datos= mysqli_fetch_assoc($datos);
    if ($datos) {
        if($password === $datos['password'] && $datos['esadmin']==='0'){
        header("Location:admin/usuario.php?modo=todas");
        }elseif($password === $datos['password'] && $datos['esadmin']==='1'){ 
        header("Location:admin/admin.php"); }
    }}?>