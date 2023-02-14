
<?php
if(!isset($_SESSION['rol'])){
    echo "<nav class='menu'>";
    echo  "<ul>";
    echo  "</ul>";
echo "</nav>";
}
else if($_SESSION['rol'] == 'alumno'){
    ?>
    <nav class="menu">
        <ul>
            <li><a href="index.php?controller=alumno&action=consultaMatriculas">matriculas</a></li>
            <li><a href="index.php?controller=alumno&action=mainAlumno">pagina principal</a></li>
            <li><a href="index.php?controller=curso&action=verCursos">cursos</a></li>
        </ul>
    </nav>
    <?php 
    
}
else if($_SESSION['rol'] == 'admin'){
    ?>
    <nav class="menu">
        <ul>
            <li><a href="index.php?controller=curso&action=consultarCursos">Cursos</a></li>
            <li><a href="index.php?controller=profesor&action=consultarProfesores">Profesores</a></li>
            <li><a href="index.php?controller=curso&action=addCurso">Añadir Curso</a></li>
            <li><a href="index.php?controller=profesor&action=addProfesor">Añadir Profesor</a></li>
        </ul>
    </nav>
    <?php
}
else if($_SESSION['rol'] == 'profesor'){
    echo "<nav class='menu'>";
        echo  "<ul>";
            echo "<li><a href='views/alumnos/mainAlumno'> volver a página principal </a></li>";
            echo "<li><a href='index.php?controller=curso&action=cursosProfesor'>Cursos</a></li>";
            echo  "</ul>";
    echo "</nav>";
}
?>

