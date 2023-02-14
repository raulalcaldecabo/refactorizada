<?php
if(isset($_SESSION['rol'])){
    if($_SESSION['rol'] == 'alumno'){
        foreach($array as $data) {
           $_SESSION['dni']=$data['dni'];
           $_SESSION['ID']=$data['ID'];
           $_SESSION['nombre']=$data['nombre'];
           $_SESSION['apellido']=$data['apellido'];
           $_SESSION['mail']=$data['mail'];
           $id= $_SESSION['ID'];
        }
        echo "<h2> Hola ".$_SESSION['nombre']." ".$_SESSION['apellido']."</h2></br>";
        echo "<div class = 'profe'>";
        echo "<a href='index.php?controller=alumno&action=getAlumnoEdit&id=".$data['ID']."&dni=".$data['dni']."&nombre=".$data['nombre']."&apellido=".$data['apellido']."&mail=".$data['mail']."'>Editar perfil</a>";
        echo "<a href='index.php?controller=profesor&action=getEditImgFormAlumno&id=".$id."'> modificar foto </a>";
        echo "</div>";
    }
    else{
        echo "<h1> Has de estar validado para ver esta página si</h1>";
    }
}
else{
    echo "<h1> Has de estar validado para ver esta página </h1>";
}
?>