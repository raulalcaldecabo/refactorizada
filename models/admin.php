<?php
require_once("database.php");
class Admin extends Database {
    private   $username;
    private   $email;
    private   $password;
    protected $rows;

    function getNombre() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
    }
    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    function validateAdmin($username, $password){
        $sql = "SELECT * FROM administrador where nombre='$username' and contrasena= '".md5($password)."'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return true;
        }
        else {
            return false;
        }
        
    }

    //función vacía para mostrar el enlace al menú principal del administrador
    public function logAdmin(){
        
    }
}

?>