<?php
header("Access-Control-Allow-Origin: *");

require_once "../model/model.php";
$function = $_GET['funcion'];

switch ($function) {
    case "guardarProducto":
       guardarProducto();
     break;
    }

    function guardarProducto(){
    
        $id = $_POST['id'];
        $title = $_POST['title'];
        $permalink = $_POST['link'];
        $thumbnail = $_POST['img'];
        $price = $_POST['price'];

    $resultado = (new producto())->guardarProductoModel($id, $title, $permalink, $thumbnail, $price);
    echo json_encode($resultado);
}
    