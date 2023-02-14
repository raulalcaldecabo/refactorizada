<?php
require_once("database.php");
class Curso extends Database {
    private   $id;
    private   $nombre;
    private   $descripcion;
    private   $duracion;
    private   $inicio;
    private   $final;
    private   $profesor;
    private   $activo;
    private   $cfoto;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->nombre;
    }

    function getDescription() {
        return $this->descripcion;
    }

    function getTime() {
        return $this->duracion;
    }
    function getInitialDate() {
        return $this->inicio;
    }
    function getFinalDate() {
        return $this->final;
    }
    function getTeacher() {
        return $this->profesor;
    }
    function getState() {
        return $this->activo;
    }
    function getCPicture() {
        return $this->cfoto;
    }
    function setId($id) {
        $this->id =$id;
    }

    function setName($nombre) {
        $this->nombre =$nombre;
    }
    function setDescription($descripcion) {
        $this->descripcion =$descripcion;
    }
    function setTime($duracion) {
        $this->duracion =$duracion;
    }
    function setInitialDate($inicio) {
        $this->inicio =$inicio;
    }
    function setFinalDate($final) {
        $this->final =$final;
    }
    function setTeacher($profesor) {
        $this->profesor =$profesor;
    }
    function setState($activo) {
        $this->activo =$activo;
    }
    function setCPicture($cfoto) {
        $this->cfoto =$cfoto;
    }

    
    function consultarCursos(){
        $sql = "SELECT * FROM cursos";
        $result = $this->db->query($sql);
        return $result;
        
    }

    function crearCurso($id, $nombre, $decription, $duracion, $inicio, $final, $profesor, $activo, $cfoto){
        if (is_uploaded_file ($_FILES['foto']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['foto']['name']);
            $nombreDirectorio = "imagen/";
            $idUnico = $id;
            $nombreFichero = $idUnico . "-" . $nombreImg;
            $directorio= $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }

        $sql = "INSERT INTO  cursos (nombre,descripcion,duracion,inicio,final,profesor,activo,cfoto)
        VALUES ('".$nombre."', '".$decription."', '".$duracion."', '".$inicio."', '".$final."','".$profesor."', 'a', '".$directorio."') ";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }

    function editCurso($id, $nombre, $description, $duracion, $inicio, $final){
        $sql = "UPDATE cursos SET nombre= '".$nombre."', descripcion= '".$description."',duracion= '".$duracion."',inicio= '".$inicio."',
        final= '".$final."'WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }

    function EditImg($id, $img){
        if (is_uploaded_file ($_FILES['cfoto']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['cfoto']['name']);
            $nombreImg2= htmlspecialchars($nombreImg, ENT_QUOTES, "UTF-8");

            $nombreDirectorio = "imagen/";
            $idUnico = $id;
            $nombreFichero = $idUnico . "-" . $nombreImg;
            $nombreFichero2 = $idUnico . "-" . $nombreImg2;
            $directorio= $nombreDirectorio . $nombreFichero2;
            move_uploaded_file ($_FILES['cfoto']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }
        $sql = "UPDATE cursos SET cfoto= '".$directorio."' WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }

    public function Activate($id)
    {
        $sql = "UPDATE cursos SET Activo= 'a' WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }

    public function Desactivate($id)
    {
        $sql = "UPDATE cursos SET Activo= 'd' WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }
    
    function cursosProfesor($id){
        $sql = "SELECT ID, nombre, inicio, final  from  cursos where profesor = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    function detalleCurso($id){
        $sql = "SELECT cursos.nombre, alumnos.dni, alumnos.nombre, alumnos.apellido, alumnos.foto, matricula.nota, matricula.idAlumno, cursos.final from (alumnos inner join matricula on matricula.idAlumno = alumnos.ID) inner join cursos on matricula.idCurso = cursos.ID  WHERE matricula.idCurso = $id";
        $result = $this->db->query($sql);
        return $result;
    }
    function cursosDisponibles($id){
        $fecha_actual = date("Y-m-d");
        //generamos la query
        $sql = "SELECT * from cursos where $fecha_actual <= inicio and ID not in (select idCurso from matricula where idAlumno = $id)" ;
        $result = $this->db->query($sql);
        return $result;
    }

    function matricularse($id, $curso){
        $sql = "INSERT INTO matricula (idCurso, idAlumno) values ('$id','$curso')";
        $result = $this->db->query($sql);
        return $result;
    }
}

?>