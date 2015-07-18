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

    public function putDataEmpresa($idEmpresa,$tipoIdentificacion,$nombreRazon,$representanteLegal,$direccionEmpresa,$barrio,$telefonos,$celular,$correoElectronico){

        $query = "INSERT INTO empresa_propietario(id_empresa, id_tipo_identifica, nombre_razon, representante_legal, direccion_empresa, barrio, telefonos, celular, correo_electronico) VALUES (".$idEmpresa.",".$tipoIdentificacion.",'".$nombreRazon."','".$representanteLegal."','".$direccionEmpresa."','".$barrio."','".$telefonos."','".$celular."','".$correoElectronico."');";

        if($this->_db->query($query) === TRUE){
            return 'Empresa agregada correctaente';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataEmpleados($id_empresa, $empleados_direc_indirect, $empleados_numero, $prestaciones, $porque_prestaciones){
        $query = "INSERT INTO num_empleados(id_empresa, empleados_direc_indirect, empleados_numero, prestaciones, porque_prestaciones) VALUES (".$id_empresa.",'". $empleados_direc_indirect."',". $empleados_numero.",". $prestaciones.",'". $porque_prestaciones."');";

        if($this->_db->query($query) === TRUE){
            return 'Empleados agregados correctaente';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataEncuestaGral($registroMercantil, $num_registro, $justificacion_registro, $usoSuelo, $justificacion_uso_suelo, $certificadoBomberos, $justificacion_bomberos, $manipulacion_alimentos, $justificacion_alimentos, $registro_Invima, $justificacion_Invima, $sayco_acinpro, $justificacion_sayco, $residuos_peligrosos, $ingresos_mensuales, $codigo_ciiu, $num_ciiu, $cod_industria_comercio, $num_cod_indusComer, $valor_activos, $TIC_PRSTM){
        $query = "INSERT INTO encuesta_gral(registroMercantil, num_registro, justificacion_registro, usoSuelo, justificacion_uso_suelo, certificadoBomberos, justificacion_bomberos, manipulacion_alimentos, justificacion_alimentos, registro_Invima, justificacion_Invima, sayco_acinpro, justificacion_sayco, residuos_peligrosos, ingresos_mensuales, codigo_ciiu, num_ciiu, cod_industria_comercio, num_cod_indusComer, valor_activos, TIC_PRSTM) VALUES (".$registroMercantil.",". $num_registro.",". $justificacion_registro.",". $usoSuelo.",". $justificacion_uso_suelo.",". $certificadoBomberos.",". $justificacion_bomberos.",". $manipulacion_alimentos.",". $justificacion_alimentos.",". $registro_Invima.",". $justificacion_Invima.",". $sayco_acinpro.",". $justificacion_sayco.",". $residuos_peligrosos.",". $ingresos_mensuales.",". $codigo_ciiu.",". $num_ciiu.",". $cod_industria_comercio.",". $num_cod_indusComer.",". $valor_activos.",". $TIC_PRSTM.");";

        if($this->_db->query($query) === TRUE){
            return $this->_db->insert_id;
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataVendedorEstacionario($id_empresa, $permiso_funcionamiento, $cual_permiso, $valor_ventas, $impuestos, $cual_impuesto, $numero_empleos, $jornada, $prestaciones, $justificacion_prestaciones){
        $query = "INSERT INTO adicional_vendedores_naturales(id_empresa, permiso_funcionamiento, cual_permiso, valor_ventas, impuestos, cual_impuesto, numero_empleos, jornada, prestaciones, justificacion_prestaciones) VALUES (".$id_empresa.",". $permiso_funcionamiento.",". $cual_permiso.",". $valor_ventas.",". $impuestos.",". $cual_impuesto.",". $numero_empleos.",". $jornada.",". $prestaciones.",". $justificacion_prestaciones.");";

        if($this->_db->query($query) === TRUE){
            return 'Vendedor natural agregados correctaente';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataMaquila($id_empresa, $num_maquinas, $sistemaSeguridad, $id_tipos_seguridad, $victimaDelito, $id_tipo_delitos, $sistema_seguridad_personal){
        $query = "INSERT INTO info_maquila(id_empresa, num_maquinas, sistemaSeguridad, id_tipos_seguridad, victimaDelito, id_tipo_delitos, sistema_seguridad_personal) VALUES (".$id_empresa.",". $num_maquinas.",". $sistemaSeguridad.",". $id_tipos_seguridad.",". $victimaDelito.",". $id_tipo_delitos.",". $sistema_seguridad_personal.");";

        if($this->_db->query($query) === TRUE){
            return 'Vendedor natural agregados correctaente';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataEncuestaPrincial($fecha, $id_empresa, $ubicacion_id, $actividad_economica, $id_clasificacion, $empleados, $id_encuesta, $vendedor_estacionario, $maquila, $id_encuestador, $id_caracter_ubicacion){
        
        $query = "INSERT INTO encuesta_principal(fecha, id_empresa, ubicacion_id, actividad_economica, id_clasificacion, empleados, id_encuesta, vendedor_estacionario, maquila, id_encuestador, id_caracter_ubicacion) VALUES (".$fecha.",". $id_empresa.",". $ubicacion_id.",". $actividad_economica.",". $id_clasificacion.",". $empleados.",". $id_encuesta.",". $vendedor_estacionario.",". $maquila.",". $id_encuestador.",". $id_caracter_ubicacion.");";

        if($this->_db->query($query) === TRUE){
            return 'Encuesta principal agregados correctaente';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }
}