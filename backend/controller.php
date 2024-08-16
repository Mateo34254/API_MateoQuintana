<?php
$function = $_GET['funncion'];

switch ($function) {
    case "guardarProducto":
       guardarProducto();
        break;
        case"actualizarProducto":
            actualizarProducto();
            break;
    }

    function guardarProducto()
    {
        $id = $_POST['id'];
        $precio = $_POST['precio'];
        $titulo = $_POST['titulo'];
        $foto = $_FILES['foto'];
        $producto = $_POST['producto'];
        $link = $_POST['link'];

        $resultado = (new producto())->guardarProductoModel($id, $precio, $titulo, $foto, $producto, $link);
        echo json_encode($resultado);
    }
    function actualizarProducto(){
        $id = $_POST['id'];
        $resultado = (new producto())->actualizarProductoModel($id);
        
    }