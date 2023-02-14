<?php
class alumnoController{
    
    public function validateAlumno(){
        require_once "models/alumno.php";
        $alumno = new Alumno();
        if ($alumno->validateAlumno($_POST['nombre'], $_POST['password'])){
            if ($alumno){
                $_SESSION['rol'] ='alumno';
                $_SESSION['name'] = $_POST['nombre'];
                $alumno2 = new Alumno();
                $show = $alumno2->datosAlumno($_POST['nombre']);
                $array = $show->fetchAll(PDO::FETCH_ASSOC);
                require_once "views/alumnos/mainAlumno.php";
            }
            else{
                require_once "views/principal.php";
            }
        }
        
    }
    public function mainAlumno(){
        require_once "models/alumno.php";
        $id=$_SESSION['dni'];
        $alumno2 = new Alumno();
        $show = $alumno2->datosAlumno($id);
        $array = $show->fetchAll(PDO::FETCH_ASSOC);
        require_once "views/alumnos/mainAlumno.php";
    }

    public function logAlumno(){
        require_once "views/alumnos/logAlumno.php";
    }
    
    
    public function getAlumnoEdit(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='alumno'){
            require_once "views/alumnos/editAlumno.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function editAlumno(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='alumno'){
            require_once "models/alumno.php";
            $alumno = new Alumno();
            
            $edit= $alumno->editAlumno(
                $_POST["id"],
                $_POST["dni"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["mail"]
            );
           
            $alumno2 = new Alumno();
            $show = $alumno2->datosAlumno($_POST["dni"]);
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/alumnos/mainAlumno.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
    public function getEditImgFormAlumno(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='alumno'){
            require_once "views/alumnos/EditImgAlumno.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function EditImgAlumno(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='alumno'){
            require_once "models/alumno.php";
            $alumno = new Alumno();
            
            $edit= $alumno->EditImgAlumno($_POST["ID"],$_FILES["foto"]);

            $alumno2 = new Alumno();
            $show = $alumno2->datosAlumno($_POST["dni"]);
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/alumnos/mainAlumno.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function consultaMatriculas(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='alumno'){
            require_once "models/alumno.php";
            $alumno = new Alumno();
            $id=$_SESSION['ID'];
            $show= $alumno->consultaMatriculas($id);
            $array = $show->fetchAll(PDO::FETCH_ASSOC);
            require_once "views/alumnos/consultaMatriculas.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
    public function borrarCurso(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='alumno'){
            require_once "models/alumno.php";
            $alumno = new Alumno();
            $id=$_SESSION['borrar'];
            $show= $alumno->borrarCurso($id);
            
            $id=$_SESSION['ID'];

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