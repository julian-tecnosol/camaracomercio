<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 10/07/2015
 * Time: 04:49 PM
 */

class Modelo
{
    protected $_db;
    public function __construct()
    {
        $this->_db = new mysqli('localhost', 'root', 'root', 'camaracomercio');

        if ( $this->_db->connect_errno )
        {
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error;
            return;
        }

        $this->_db->set_charset("utf8");
    }
}