<?php 

echo "<form class='formulario' action = 'index.php?controller=profesor&action=crearCurso' method = 'POST' name = 'crear'>";
echo "<input type='text' name='id' hidden>";
echo "DNI <input type = 'text' name = 'dni'  size = '8' maxlength='8'> </br>";
echo "Nombre <input type = 'text' name = 'nombre' size = '50' maxlength='50'> </br>";
echo "Apellido <input type = 'text' name = 'apellido' size = '50' maxlength='50'> </br>";
echo "titulo <input type = 'text' name = 'titulo' size = '100' maxlength='100'> </br>";
echo "mail <input type = 'text' name = 'mail' size = '100' maxlength='100'> </br>";
echo "contrasena <input type = 'text' name = 'contrasena' size = '35' maxlength='35'> </br>";
echo "foto <input type = 'file' name = 'foto' accept = '.png, .jpg, jepg'> </br>";
echo "<input type='submit' name='crear' value='crear'>";
echo "</form>";
echo "</br>";

?>