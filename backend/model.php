<?php

use function PHPSTORM_META\sql_injection_subst;

require_once "../Connection.php";

class producto
{

    public function guardarProductoModel($id, $titulo, $foto, $producto, $precio, $link)
    {
        $sql = "INSERT INTO market(id, titulo, foto, producto, precio, link) VALUES ('$id','$titulo', '$foto', '$producto', '$precio', '$link')";
        $connection = connection();
        $respuesta = $connection->query($sql);
        if ($respuesta == false){
            if ($connection->errno == 1060){
                $respuesta=$this->actualizarProductoModel($id, $precio, $titulo, $foto, $producto, $link);
            }
        }
        return $respuesta;
        
    }

    public function actualizarProductoModel($id, $titulo, $foto, $producto, $precio, $link){
        $sql = "UPDATE market SET producto = '$producto', titulo= '$titulo' foto= '$foto' producto='$producto' precio ='$precio' link= '$link' where id = '$id'";
        $connection= connection();
        $respuesta = $connection->query($sql);
    }
}