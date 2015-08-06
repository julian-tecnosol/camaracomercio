<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 10/07/2015
 * Time: 04:51 PM
 */

require_once "conexion.php";

class usuariosModel extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers(){
        $query = "SELECT * FROM info_encuestadores ;";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        };

        json_encode($rows);

        $result->free();

        return $rows;
    }

    public function getUser($idUser){
        $query = "SELECT * FROM info_encuestadores WHERE id_encuestador =".$idUser.";";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        };

        $result->free();
        return $rows;
    }

    public function getNumPic($idUser){
        $query = "SELECT num_fotos FROM info_encuestadores WHERE id_encuestador =".$idUser.";";
        $result = $this->_db->query($query);

        $row = $result->fetch_array(SQLITE3_ASSOC);

        $result->free();
        return $row['num_fotos'];
    }

    public function validateUser($nickname, $password){
        $password = md5($password);

        $query = "SELECT id_encuestador,Nombre_Completo,tipo_usuario,num_fotos FROM info_encuestadores WHERE nickname = '".$nickname."' AND pass='".$password."';";

        $result = $this->_db->query($query);

        $row = $result->fetch_array(MYSQLI_ASSOC);

        if($result->num_rows > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function updateEncuesta ($idEmpresa){
        $query = "UPDATE encuesta_principal SET completo = 1 WHERE id_empresa =".$idEmpresa.";";

        if ($this->_db->query($query) === TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function uploadMedia ($idEmpresa ,$idEncuestador ,$url_image, $lat, $lon){
        $query = "INSERT INTO multimedia (id_empresa, id_encuestador, lat, name_img, lon) VALUES (".$idEmpresa.",".$idEncuestador.",'".$lat."','".$url_image."','".$lon."');";

        if ($this->_db->query($query) === TRUE) {
            if($this->updateEncuesta($idEmpresa)){
                header("Location: /");
            }else{
                header("Location: /picgps?error=TRUE&value=".$idEmpresa);
            };
        } else {
            echo "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function uploadNumfotos ($idCensador){
        $query = "UPDATE info_encuestadores SET num_fotos = num_fotos +1 WHERE id_encuestador =".$idCensador.";";

        if ($this->_db->query($query) === TRUE) {
            echo "Numero de fotos actualizado ";
        } else {
            echo "Error: " . $query . "<br>" . $this->_db->error;
        }
    }
}