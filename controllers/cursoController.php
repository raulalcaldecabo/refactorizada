<?php
class cursoController{
    public function consultarCursos(){
        require_once "models/curso.php";
        $cursos = new Curso();
        $tablaCursos = $cursos->consultarCursos();
        $array = $tablaCursos->fetchAll(PDO::FETCH_ASSOC);
        require_once "views/cursos/administrarCursos.php";
    }
    public function addcurso(){
        require_once "views/cursos/crearCurso.php";
    }

    public function crearCurso(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/curso.php";
            $curso = new Curso();
            $add= $curso->crearCurso(
                $_POST["id"],
                $_POST["nombre"],
                $_POST["descripcion"],
                $_POST["duracion"],
                $_POST["inicio"],
                $_POST["final"],
                $_POST["profesor"],
                $_POST["activo"],
                $_FILES["foto"],
            );

            //vuelve a la tabla de productos
            $curso2 = new Curso();
            $show = $curso2->consultarCursos();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/cursos/administrarCursos.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function getCursoEdit(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "views/cursos/editCurso.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function editCurso(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/curso.php";
            $curso = new Curso();
            
            $edit= $curso->editCurso(
                $_POST["id"],
                $_POST["nombre"],
                $_POST["descripcion"],
                $_POST["duracion"],
                $_POST["inicio"],
                $_POST["final"],
            );
           
            $curso2 = new Curso();
            $show = $curso2->consultarCursos();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/cursos/administrarCursos.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function getEditImgForm(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "views/cursos/EditImg.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function EditImg(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/curso.php";
            $curso = new Curso();
            
            $edit= $curso->EditImg($_POST["ID"],$_FILES["cfoto"]);

            $curso2 = new Curso();
            $show = $curso2->consultarCursos();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/cursos/administrarCursos.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function Activate(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/curso.php";
            $curso = new Curso();
            $activate= $curso->Activate($_GET['ID']);

            //vuelve a la tabla de productos
            $curso2 = new Curso();
            $show = $curso2->consultarCursos();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/cursos/administrarCursos.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function Desactivate(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/curso.php";
            $curso = new Curso();
            $desactivate= $curso->Desactivate($_GET['ID']);

            //vuelve a la tabla de productos
            $curso2 = new Curso();
            $show = $curso2->consultarCursos();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/cursos/administrarCursos.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
    public function cursosProfesor(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='profesor'){
            require_once "models/curso.php";
        $cursos = new Curso();
        $tablaCursos = $cursos->cursosProfesor($_SESSION['ID']);
        $array = $tablaCursos->fetchAll(PDO::FETCH_ASSOC);
        require_once "views/cursos/mostrarCursosProfesor.php";
        }else{
            print("Error, no estás validado como admin");
        }
        
    }
    public function detalleCurso(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='profesor'){
            require_once "models/curso.php";
        $cursos = new Curso();
        $tablaCursos = $cursos->detalleCurso($_GET['ID']);
        $array = $tablaCursos->fetchAll(PDO::FETCH_ASSOC);
        require_once "views/cursos/tablaAlumnos.php";
        }else{
            print("Error, no estás validado como admin");
        }
        
    }
    public function verCursos(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='alumno'){
            require_once "models/curso.php";
        $cursos = new Curso();
        $tablaCursos = $cursos->cursosDisponibles($_SESSION['ID']);
        $array = $tablaCursos->fetchAll(PDO::FETCH_ASSOC);
        require_once "views/cursos/verCursos.php";
        }else{
            print("Error, no estás validado como admin");
        }
        
    }
    public function matricularse(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='alumno'){
            require_once "models/curso.php";
            $cursos = new Curso();
            $id=$_SESSION['ID'];
            $tablaCursos = $cursos->matricularse($_GET['ID'], $id);
            $array = $tablaCursos->fetchAll(PDO::FETCH_ASSOC);
            require_once "models/alumno.php";
            $alumno2 = new Alumno();
            $show= $alumno2->consultaMatriculas($id);
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/alumnos/consultaMatriculas.php";
        }else{
            print("Error, no estás validado como admin");
        }
        
    }
}
?>

