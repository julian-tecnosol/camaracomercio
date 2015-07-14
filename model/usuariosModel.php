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
}