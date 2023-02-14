<?php 
echo "<h2> Cursos BDN </h2>";
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nombre curso</th>";
echo "<th>Descripción</th>";
echo "<th>Duración</th>";
echo "<th>Inicio</th>";
echo "<th>Final</th>";
echo "<th>Profesor</th>";
echo "<th> Nota </th>";
echo "<th> Darse de baja </th>";
echo "</tr>";
foreach($array as $curso => $campo){
    $_SESSION['borrar']=$campo["ID"];
    echo "<tr>";
    foreach($campo as $dato){
        echo "<td> $dato </td>";
    }
    echo "<td> <a href='index.php?controller=alumno&action=borrarCurso'> <img src='imagen/lapiz.png' width='50'></a> </td>";
    echo "</tr>";
}
echo "</table>";
?>
