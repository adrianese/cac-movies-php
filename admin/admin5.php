<?php 
require './../config/database.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $db=conectarDB();

   if ($_POST['accion']==='editar') {
      
        $id_usuario= $_POST['id_usuario'];
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
          $query = " UPDATE usuarios SET nombre='$nombre', apellido ='$apellido', email= '$email', password='$password',
         fecha_nac='$fecha_nac', pais='$pais', esadmin= $esadmin, info='$info' WHERE id_usuario = $id_usuario;";
          $update = mysqli_query($db,$query);
          if($update){header("Location:admin.php?msj=2");}}

        }elseif($_POST['accion']==='borrar'){
            $id_usuario=$_POST['id_usuario'];
            $query= "DELETE FROM usuarios WHERE id_usuario = $id_usuario ;";
            $delete= mysqli_query($db, $query);
            if($delete){header("Location:admin.php?msj=3");}
   }
}
?>