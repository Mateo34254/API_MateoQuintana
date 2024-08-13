<?php

require_once "../Connection.php";

class producto
{

    public function guardarProductoModel($id, $titulo, $foto, $producto, $precio, $link)
    {
        $sql = "INSERT INTO market(id, titulo, foto, producto, precio, link) VALUES ('$id','$titulo', '$foto', '$producto', '$precio', '$link')";
        $connection = connection();
        $respuesta = $connection->query($sql);
        return $respuesta;
    }
}