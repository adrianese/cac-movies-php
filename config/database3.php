<?php
 function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'id22064829_sera', '!Whcac0077', 'id22064829_cacmovies');
    if (!$db) {
    echo "no se conecto" ; 
    exit;}
    return $db;
     }?>