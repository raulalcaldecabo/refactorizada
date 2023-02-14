<?php
require_once("database.php");
class Alumno extends Database {
    private   $id;
    private   $dni;
    private   $nombre;
    private   $apellido;
    private   $mail;
    private   $contrasena;
    private   $activo;
    private   $afoto;

    function getId() {
        return $this->id;
    }
    function getDni() {
        return $this->dni;
    }
    function getName() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getMail() {
        return $this->mail;
    }
    function getContrasena() {
        return $this->contrasena;
    }
    function getState() {
        return $this->activo;
    }
    function getPPicture() {
        return $this->afoto;
    }
    function setId($id) {
        $this->id =$id;
    }
    function setDni($dni) {
        $this->id =$dni;
    }
    function setName($nombre) {
        $this->nombre =$nombre;
    }
    function setApellido($apellido) {
        $this->apellido =$apellido;
    }
    function setMail($mail) {
        $this->mail =$mail;
    }
    function setContrasena($contrasena) {
        $this->contrasena =$contrasena;
    }
    function setState($activo) {
        $this->activo =$activo;
    }
    function setPicture($afoto) {
        $this->afoto =$afoto;
    }

    function validateAlumno($username, $password){
        $sql = "SELECT * FROM alumnos where dni='$username' and contrasena= '".md5($password)."'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return true;
        }
        else {
            return false;
        }
        
    }
    
    function consultarAlumnos(){
        $sql = "SELECT * FROM alumnos";
        $result = $this->db->query($sql);
        return $result;
        
    }

    function editAlumno($id,$dni, $nombre, $apellido, $mail){
        $sql = "UPDATE alumnos SET dni='".$dni."'nombre= '".$nombre."', apellido= '".$apellido."',mail= '".$mail."'WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }

    function datosAlumno($id){
        $sql = "SELECT *  from  alumnos where dni = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    function EditImgAlumno($id, $img){
        if (is_uploaded_file ($_FILES['foto']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['foto']['name']);
            $nombreImg2= htmlspecialchars($nombreImg, ENT_QUOTES, "UTF-8");

            $nombreDirectorio = "imagen/";
            $idUnico = $id;
            $nombreFichero = $idUnico . "-" . $nombreImg;
            $nombreFichero2 = $idUnico . "-" . $nombreImg2;
            $directorio= $nombreDirectorio . $nombreFichero2;
            move_uploaded_file ($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }
        $sql = "UPDATE alumnos SET foto= '".$directorio."' WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }
    function consultaMatriculas($id){
        $sql = "SELECT cursos.ID, cursos.nombre, cursos.descripcion, cursos.duracion, cursos.inicio, cursos.final, cursos.profesor, matricula.nota from matricula inner join cursos on matricula.idCurso = cursos.ID where matricula.idAlumno = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }
    function borrarCurso($id){
        $sql = "DELETE FROM matricula WHERE idCurso = $id";
        $result = $this->db->query($sql);
    }
}

?>