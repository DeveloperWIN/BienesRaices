<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost','root','','bienesraices_crud');
    if(!$db) {
        echo "Error al conectar";
        exit;
    } 

    return $db;
}