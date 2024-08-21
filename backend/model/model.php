<?php


require_once "../connection/Connection.php";

class producto{


    function productoExiste($id) {
        $conection = connection();
        $sql = "SELECT id FROM articulos WHERE id = '$id'";
        $resultado = $conection->query($sql);
        return $resultado->num_rows > 0;
    }

    function guardarProductoModel($id, $title, $permalink, $thumbnail, $price){
            $conection = connection();

            if ($this->productoExiste($id)) {
                $this->actualizarProductoModel($id, $title, $permalink, $thumbnail, $price);

            } else {
                $sql = "INSERT INTO articulos VALUES ('$id', '$title', '$permalink', '$thumbnail', $price)";
                $respuesta = $conection->query($sql);
                return $respuesta;
            }
}

    public function actualizarProductoModel($id, $title, $permalink, $thumbnail, $price){
        $sql = "UPDATE articulos SET titulo= '$title', link= '$permalink', foto ='$thumbnail', precio= '$price' where id = '$id'";
        $connection= connection();
        $respuesta = $connection->query($sql);
        return $respuesta;
    }
}