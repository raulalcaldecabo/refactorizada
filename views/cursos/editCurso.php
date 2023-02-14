<div class="container">
    <form class="editCurso" action='index.php?controller=curso&action=editCurso' method='POST'>
        <h2>Modificar Curso</h2>
        </br>
        <input type='number' name='id' value="<?php echo ($_GET['ID']) ?>" hidden>
        <label>Nombre</label>         <input type='text' name='nombre' required value="<?php echo ($_GET['nombre']) ?>"><br>
        <label>Descripción</label>    <input type='text' name='descripcion' required value="<?php echo ($_GET['descripcion']) ?>"><br>
        <label>profesor</label>  
        <select name="profesor" class="profesor" required>
            <?php
                foreach($allTeachers as $rows => $cell) {
                    if($cell['id']==$_GET['dni']){
                        echo "<option value='".$cell['id']."' selected>".$cell['dni']."</option>";
                    }else{
                        echo "<option value='".$cell['id']."' >".$cell['dni']."</option>";
                    }
                }
            ?>
        </select><br>
        <label>duracion</label>       <input type='text' name='duracion' required value="<?php echo ($_GET['duracion']) ?>"><br>
        <label>inicio</label>         <input type='date' name='inicio' required value="<?php echo ($_GET['inicio']) ?>"><br>
        <label>final</label>          <input type='date' name='final' required value="<?php echo ($_GET['final']) ?>"><br>
        <input class="button" type='submit' name='enviar'>
    </form>
</div>