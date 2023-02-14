<?php
class profesorController{
    public function consultarProfesores(){
        require_once "models/profesor.php";
        $profesores = new Profesor();
        $tablaProfesores = $profesores->consultarProfesores();
        $array = $tablaProfesores->fetchAll(PDO::FETCH_ASSOC);
        require_once "views/profesores/administrarProfesores.php";
    }
    
    public function getTeacherAdd(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/profesor.php";
            $profesor = new profesor();
            
            $allTeachers = $profesor->consultarProfesores();
            $array = $allTeachers->fetchAll(PDO::FETCH_ASSOC);

            require_once "views/products/crearCurso.php";
        }else{
            print("Error, no estás validado como admin");
        }   
    }
    public function addProfesor(){
        require_once "views/Profesores/crearProfesor.php";
    }

    public function crearProfesor(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/profesor.php";
            $profesor = new Profesor();
            $add= $profesor->crearProfesor(
                $_POST["id"],
                $_POST["dni"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["titulo"],
                $_POST["mail"],
                $_POST["contrasena"],
                $_FILES["foto"],
            );

            //vuelve a la tabla de productos
            $profesor2 = new Profesor();
            $show = $profesor2->consultarProfesores();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/Profesores/administrarProfesores.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
    
    public function getProfEdit(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "views/Profesores/editProfesor.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function editProfesor(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/profesor.php";
            $profesor = new Profesor();
            
            $edit= $profesor->editProfesor(
                $_POST["id"],
                $_POST["dni"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["titulo"],
                $_POST["mail"]
            );
           
            $profesor2 = new Profesor();
            $show = $profesor2->consultarProfesores();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/Profesores/administrarProfesores.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
    public function getEditImgForm(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "views/profesores/EditImg.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function EditImg(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/profesor.php";
            $profesor = new Profesor();
            
            $edit= $profesor->EditImg($_POST["ID"],$_FILES["pfoto"]);

            $curso2 = new Profesor();
            $show = $curso2->consultarProfesores();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/Profesores/administrarProfesores.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function Activate(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/profesor.php";
            $profesor = new Profesor();
            $activate= $profesor->Activate($_GET['ID']);

            //vuelve a la tabla de productos
            $curso2 = new Profesor();
            $show = $curso2->consultarProfesores();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/Profesores/administrarProfesores.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function Desactivate(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "models/profesor.php";
            $profesor = new Profesor();
            $desactivate= $profesor->Desactivate($_GET['ID']);

            //vuelve a la tabla de productos
            $curso2 = new Profesor();
            $show = $curso2->consultarProfesores();
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/Profesores/administrarProfesores.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function logProfesor(){
        require_once "views/profesores/logProfesor.php";
    }

    public function validateProfesor(){
        require_once "models/profesor.php";
        $profesor = new Profesor();
        $profesor->validateProfesor($_POST['nombre'], $_POST['password']);
        if ($profesor){
            $_SESSION['rol']  = "profesor";
            $_SESSION['nombre']  = $_POST['nombre'];
            $profesor2 = new Profesor();
            $show = $profesor2->datosProfesor($_POST['nombre']);
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/profesores/mainProfesor.php";
        }
        else{
            require_once "views/principal.php";
        }
        
    }

    public function getProfesorEdit(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='profesor'){
            require_once "views/Profesores/autoeditProfesor.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function autoeditProfesor(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='profesor'){
            require_once "models/profesor.php";
            $profesor = new Profesor();
            
            $edit= $profesor->editProfesor(
                $_POST["id"],
                $_POST["dni"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["titulo"],
                $_POST["mail"]
            );
           
            $profesor2 = new Profesor();
            $show = $profesor2->consultarProfesores($_POST["dni"],);
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/Profesores/mainProfesor.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
    public function getEditImgFormProfesor(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='profesor'){
            require_once "views/profesores/EditImgProfesor.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function EditImgProfesor(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='profesor'){
            require_once "models/profesor.php";
            $profesor = new Profesor();
            
            $edit= $profesor->EditImg($_POST["ID"],$_FILES["pfoto"]);

            $curso2 = new Profesor();
            $show = $curso2->consultarProfesores($_SESSION['dni']);
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/Profesores/mainProfesor.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

}
?>