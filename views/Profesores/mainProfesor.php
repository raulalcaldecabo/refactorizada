<?php
if(isset($_SESSION["rol"])){
    if($_SESSION["rol"] == 'profesor'){
        foreach($array as $data) {
           $id= $data['ID'];
           $dni= $data['dni'];
           $nombre= $data['nombre'];
           $apellido= $data['apellido'];
           $titulo= $data['titulo'];
           $mail= $data['mail'];
           $contrasena= $data['contrasena'];
           $_SESSION['dni']=$data['dni'];
           $_SESSION['ID']=$data['ID'];
        }
        echo "<h2> Hola ".$data['nombre']." ".$data['apellido']."</h2></br>";
        echo "<div class = 'profe'>";
        echo "<a href='index.php?controller=profesor&action=getProfesorEdit&id=".$data['ID']."&dni=".$data['dni']."&nombre=".$data['nombre']."&apellido=".$data['apellido']."&titulo=".$data['titulo']."&mail=".$data['mail']."'>Modificar datos</a></br>";
        echo "<a href='index.php?controller=profesor&action=getEditImgFormProfesor&id=".$id."'> modificar foto </a>";
        echo "</div>";
    }
    else{
        echo "<h1> Has de estar validado para ver esta página </h1>";
    }
}
else{
    echo "<h1> Has de estar validado para ver esta página </h1>";
}
?>