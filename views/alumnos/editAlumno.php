<div class="container">
    <form class="editProfesor" action='index.php?controller=alumno&action=editAlumno' method='POST'>
        <h2>Modificar datos</h2>
        </br>
        <input type='number' name='id' value='<?php echo ($_GET['ID']) ?>' hidden>
        <label>DNI</label>         <input type='text' name='dni' required value="<?php echo ($_GET['dni']) ?>"><br>
        <label>Nombre</label>         <input type='text' name='nombre' required value="<?php echo ($_GET['nombre']) ?>"><br>
        <label>Apellido</label>       <input type='text' name='apellido' required value="<?php echo ($_GET['apellido']) ?>"><br>
        <label>mail</label>           <input type='text' name='mail' required value="<?php echo ($_GET['mail']) ?>"><br>
        <input class="button" type='submit' name='enviar'>
    </form>
</div>