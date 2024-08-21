<?php
    require_once "../Connection/Connection.php";


    class producto{
        function guardarProductoModel($id, $title, $permalink, $thumbnail, $price) 
        {
             $sql = "INSERT INTO articulos(id, title, permalink, thumbnail, price) VALUES('$id', '$title', '$permalink', '$thumbnail', '$price');";
             $connection = connection();
             $respuesta = $connection->query($sql);
             return $respuesta;
             if ($respuesta == false){
                if ($connection->errno == 1060){
                    $respuesta=$this->actualizarProductoModel($id, $title, $permalink, $thumbnail, $price);
                    
                }
            }
        }

    function actualizarProductoModel($id, $title, $permalink, $thumbnail, $price){

        $conection = connection();
        $sql = "UPDATE articulos SET titulo = '$title', permalink = '$permalink', thumbnail = '$thumbnail', price = '$price' WHERE id = '$id'";
        $respuesta = $conection->query($sql);
        return $respuesta;
}
}