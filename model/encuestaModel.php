<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 10/07/2015
 * Time: 05:41 PM
 */

require_once "conexion.php";

class encuestaModel extends Modelo
{
    public function getTipoOrganizacion(){
        $query = "SELECT TipoOrg_Id,TipoOrg_name,id_title FROM tipo_organizacion ;";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        };

        $result->free();
        return $rows;
    }

    public function getTituloOrganizacion(){
        $query = "SELECT id_title,Name FROM tipos_orgtitle;";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        };

        $result->free();
        return $rows;
    }

    public function clasificacionEmpresa(){
        $query = "SELECT * FROM clasificacion_de_empresas;";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        };

        $result->free();
        return $rows;
    }

    public function ubicacionComercial(){
        $query = "SELECT ubicacion_id,ubicacion_name FROM ubicacion_comercial;";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        };

        $result->free();
        return $rows;
    }
}