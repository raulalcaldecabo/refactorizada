<?php 

echo "<form class='formulario' action = 'index.php?controller=curso&action=crearCurso' method = 'POST' name = 'crear'>";
echo "<input type='text' name='id' hidden>";
echo "Nombre <input type = 'text' name = 'nombre' size = '50' maxlength='50'> </br>";
echo "Descripción <input type = 'text' name = 'descripcion' size = 100' maxlength='100'> </br>";
echo "Horas <input type = 'text' name = 'duracion' size = '11' maxlength='11'> </br>";
echo "Inicio <input type = 'text' name = 'inicio'  size = '10' maxlength='10'> </br>";
echo "Final <input type = 'text' name = 'final'  size = '10' maxlength='10'> </br>";
echo "Profesor <select name = 'profesor'></br>";
foreach($allTeachers as $rows => $cell) {
    echo "<option value='".$cell['id']."' >".$cell['dni']."</option>";
}
/*
for($i=0; $i<=$total;$i++){
    //$fila = mysqli_fetch_array($consulta);
    echo "<option value=".$fila[0].">".$fila[1]."</option>";
}
*/
echo "</select></br>";
echo "foto <input type = 'file' name = 'foto' accept = '.png, .jpg, jepg'> </br>";
echo "</br>";
echo "<input type='submit' name='crear' value='crear'>";
echo "</form>";

?>