<?php

use function PHPSTORM_META\sql_injection_subst;

require_once "../connection/Connection.php";

class producto{


    public function guardarProductoModel($id, $titulo, $foto, $precio, $link){
    
        $sql = "INSERT INTO market(id, titulo, link, foto, precio) VALUES ('$id','$titulo', '$link', '$foto', '$precio')";
        $connection = connection();
        $respuesta = $connection->query($sql);
        if ($respuesta == false){
            if ($connection->errno == 1060){
                $respuesta=$this->actualizarProductoModel($id, $precio, $titulo, $foto, $link);
            }
        }
        return $respuesta;
        
    }

    public function actualizarProductoModel($id, $titulo, $foto, $precio, $link){
        $sql = "UPDATE articulos SET titulo= '$titulo', link= '$link', foto ='$foto', precio= '$precio' where id = '$id'";
        $connection= connection();
        $respuesta = $connection->query($sql);
    }
}