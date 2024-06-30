<?php 
    if ($_SERVER['REQUEST_METHOD']= "GET") {
    $modo = $_GET['modo'];
    if ($modo==='todas') {
        header("Location:usuario.php?modo=todas");
    }elseif ($modo==='genero'){
        header("Location:usuario.php?modo=genero");
    } elseif ($modo==='calificada'){
        header("Location:usuario.php?modo=calificada");
    } elseif ($modo==='favoritas'){
        header("Location:usuario.php?modo=favoritas");
    } 
    
    } ?>
