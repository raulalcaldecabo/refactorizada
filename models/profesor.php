<?php
require_once("database.php");
class Profesor extends Database {
    private   $id;
    private   $dni;
    private   $nombre;
    private   $apellido;
    private   $titulo;
    private   $mail;
    private   $contrasena;
    private   $activo;
    private   $pfoto;

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

    function getTitulo() {
        return $this->titulo;
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
        return $this->pfoto;
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
    function setTitulo($titulo) {
        $this->titulo =$titulo;
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
    function setPPicture($pfoto) {
        $this->pfoto =$pfoto;
    }

    
    function consultarProfesores(){
        $sql = "SELECT * FROM profesores";
        $result = $this->db->query($sql);
        return $result;
        
    }
    function crearProfesor($dni, $name, $apellido, $titulo, $mail, $contrasena, $pfoto, $activo){
        if (is_uploaded_file ($_FILES['foto']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['foto']['name']);
            $nombreDirectorio = "imagen/";
            $idUnico = $dni;
            $nombreFichero = $idUnico . "-" . $nombreImg;
            $directorio= $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }

        $sql = "INSERT INTO  profesores (id, dni,nombre,apellido,titulo,email,contrasena,activo,pfoto)
        VALUES ('".$dni."', '".$name."', '".$apellido."', '".$titulo."', '".$mail."','".$contrasena."', 'a', '".$directorio."') ";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }
    function editProfesor($id, $nombre, $apellido, $titulo, $mail){
        $sql = "UPDATE profesores SET nombre= '".$nombre."', apellido= '".$apellido."',titulo= '".$titulo."',mail= '".$mail."'WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }

    function EditImg($id, $img){
        if (is_uploaded_file ($_FILES['pfoto']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['pfoto']['name']);
            $nombreImg2= htmlspecialchars($nombreImg, ENT_QUOTES, "UTF-8");

            $nombreDirectorio = "imagen/";
            $idUnico = $id;
            $nombreFichero = $idUnico . "-" . $nombreImg;
            $nombreFichero2 = $idUnico . "-" . $nombreImg2;
            $directorio= $nombreDirectorio . $nombreFichero2;
            move_uploaded_file ($_FILES['pfoto']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }
        $sql = "UPDATE profesores SET pfoto= '".$directorio."' WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }

    public function Activate($id)
    {
        $sql = "UPDATE profesores SET Activo= 'a' WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }

    public function Desactivate($id)
    {
        $sql = "UPDATE profesores SET Activo= 'd' WHERE ID= '".$id."'";
        $result = $this->db->query($sql);
    }

    function validateProfesor($username, $password){
        $sql = "SELECT * FROM profesores where nombre='$username' and contrasena= '".md5($password)."'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return true;
        }
        else {
            return false;
        }
        
    }

    

    function datosProfesor($dni){
        $sql = "SELECT *  from  profesores where dni = '$dni'";
        $result = $this->db->query($sql);
        return $result;
    }
}

?>