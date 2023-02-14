<?php
$fecha_actual = date("Y-m-d");
echo "<h2> Mis Cursos</h2>";
echo "<table>";
echo "<tr>";
echo "<th> Nombre </th>";
echo "<th> Inicio </th>";
echo "<th> Final </th>";
echo "<th> detalle </th>";
echo "</tr>";
foreach($array as $data) {
    $id=$data['ID'];
    echo"$id";
    echo "<tr>";
    echo "<td>".$data['nombre']."</td>";
    echo "<td>".$data['inicio']."</td>";
    echo "<td>".$data['final']."</td>";
    echo "<td> <a href='index.php?controller=curso&action=detalleCurso&ID=".$id."'> <img src='imagen/lapiz.png' width='30'></a> </td>";
    /*
    if($fecha_actual >= $linea[3]){
        echo "<td> <a href='tablaCurso.php?Numero=".$id."'> <img src='imagen/lapiz.png' width='30'></a> </td>";
    }
    else{
        echo "<td> Pendiente </td>";
    }
    */
    echo "</tr>";
}
echo "</table>";



?>