<div class="container">
    <form class="editImage" action='index.php?controller=alumno&action=EditImgAlumno' method='POST' ENCTYPE="multipart/form-data">
        <h2>Modificar Imagen</h2><br>
        <input type='number' name='ID' value='<?php echo ($_GET['ID']) ?>' hidden>
        <input type="file" name="foto" accept=".png, .jpg, .jpeg" required><br>
        <input class ="button" type='submit' name='enviar'>
    </form>
</div>