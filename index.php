<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "general.css"/>
    <link  rel="icon"   href="views/img/winrar.png" type="image/png" />
    <title>Tu centro de formación</title>
</head>
<?php
require_once 'autoload.php';
require_once "views/general/encabezado.php";


if (isset($_GET['controller'])){
    $nombreController = $_GET['controller']."Controller";
}
else{
    //Controlador per dedecte
    $nombreController = "generalController";
}
if (class_exists($nombreController)){
    $controlador = new $nombreController(); 
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action ="principal";
    }
    $controlador->$action();   
}else{

    echo "No existe el controlador";
}
require_once "views/general/navegacion.php";
require_once "views/general/footer.html";
?>
