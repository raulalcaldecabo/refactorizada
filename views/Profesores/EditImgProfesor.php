<div class="container">
    <form class="editImage" action='index.php?controller=profesor&action=EditImgProfesor' method='POST' ENCTYPE="multipart/form-data">
        <h2>Modificar Imagen</h2><br>
        <input type='number' name='ID' value='<?php echo ($_GET['ID']) ?>' hidden>
        <input type="file" name="pfoto" accept=".png, .jpg, .jpeg" required><br>
        <input class ="button" type='submit' name='enviar'>
    </form>
</div>