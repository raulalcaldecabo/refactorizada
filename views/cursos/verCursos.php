<?php
// comprobamos si el usuario está conectado
if(isset($_SESSION["rol"])){
    if($_SESSION["rol"] == 'alumno'){
        $data['dni'] = $_SESSION['dni'];
        $data['ID']=$_SESSION['ID'];
        $data['nombre']=$_SESSION['nombre'];
        $data['apellido']=$_SESSION['apellido'];
        $data['mail']=$_SESSION['mail'];
        $id= $_SESSION['ID'];
        $fecha_actual = date("Y-m-d");
        foreach($array as $curso){

            if($fecha_actual>= $curso['inicio']){
                echo "<h2> Hola ".$_SESSION['nombre']." ".$_SESSION['apellido']."</h2></br>";
                echo "<div class = 'cursos'>";
                echo "<h2>".$curso['nombre']." </h2>";
                echo "<img height = '500px' width= '500px' src = ".$curso['cfoto']." <br/>";
                echo "<p> ".$curso['descripcion']." </p>";
                echo "<p class='negrita'> ".$curso['duracion']." horas en total</p>";
                echo "<p class='negrita'> Fecha de inicio: ".$curso['inicio']." </p>";
                echo "<p class='negrita'> Fecha fin:  ".$curso['final']." </p>";
                echo " <br/>";
                echo "<a href='index.php?controller=curso&action=matricularse&ID=".$curso['ID']."'><button class='Matricula'> matricularse </button></a>";
                echo "</div>";
                echo " <br/>";
            }
            
        }
        
    }
    else{
        echo "<h1> No tienes permisos para ver esta página </h1>";
    }
}
else{
    echo "<h1> Has de estar validado para ver esta página </h1>";
}

?>
