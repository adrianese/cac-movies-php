
<?php


function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '0077', 'cacmovies');

    if (!$db) {
         echo "no se conecto" ; 
        exit;}

        return $db;
    }


    function debuguear($v){
        echo '<pre>';
        echo var_dump($v);
        echo'</pre>';
        exit;
    }