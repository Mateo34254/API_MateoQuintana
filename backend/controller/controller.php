<?php
$function = $_GET['funcion'];

switch ($function) {
    case "guardarProducto":
       guardarProducto();
     break;
    }

    function guardarProducto(){
    
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $link = $_POST['link'];
        $foto = $_POST['foto'];
        $precio = $_POST['precio'];

        $resultado = (new producto())->guardarProductoModel($id, $titulo, $link, $foto, $precio);
        echo json_encode($resultado);
    }
    