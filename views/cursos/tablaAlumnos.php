<?php
$fecha_actual = date("Y-m-d");
echo "<h2> Alumnos del curso </h2>";
echo "<table>";
echo "<tr>";
echo "<th> DNI </th>";
echo "<th> Nombre </th>";
echo "<th> Apellido </th>";
echo "<th> Foto </th>";
echo "<th> Nota </th>";
echo "</tr>";
foreach($array as $data) {
    $foto = $data['foto'];
    $id=$data['idAlumno'];
    echo "<tr>";
    echo "<td>".$data['dni']."</td>";
    echo "<td>".$data['nombre']."</td>";
    echo "<td>".$data['apellido']."</td>";
    echo "<td> <img width='50' height = '50' src = ".$foto." </td>";
    if($fecha_actual >= $data['final']){
        echo "<td> <a href='index.php?controller=curso&action=nota&ID=$id'> <img src='imagen/lapiz.png' width='30'></a> </td>";
    }
    else{
        echo "<td>".$data['final']." </td>";
    
    }
}
echo "</table>"; 
?>