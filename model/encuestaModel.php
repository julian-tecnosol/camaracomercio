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

    public function getActividadesEconomicas(){
        $query = "SELECT a.id_actividad ,a.actividad_name, b.Name_actividad FROM actividad_economica a, title_actividad_economica b WHERE b.id_title_actividad = a.id_title_actividad;";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $rows[] = $row;
        }

        $result->free();
        return $rows;
    }

    public function getActividadesEconomicasArr(){
        $query = "SELECT id_actividad , actividad_name, id_title_actividad FROM actividad_economica;";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $numTitle = $row["id_title_actividad"];
            $rows[] = $row;
        }

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

    public function getEncuestasForTable(){

        $query = "SELECT a.id_encuesta_principal,a.fecha,a.id_empresa,a.ubicacion_id,a.id_encuestador,b.nombre_razon, b.nombre_persona, b.barrio, b.comuna, c.Nombre, c.telefono, c.observaciones, d.actividad_name, e.Nombre_Completo FROM encuesta_principal a, empresa_propietario b, persona_encuestada c, actividad_economica d, info_encuestadores e WHERE a.id_empresa = b.id_empresa AND a.id_tabla_persona = c.id_tabla_persona AND  d.id_actividad = a.actividad_economica AND e.id_encuestador = a.id_encuestador ORDER BY a.id_encuesta_principal;";
        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        }

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

    /******/
    public function getAllRowsEncuestaById ($id){
        $query = "SELECT
                      a.fecha,
                      a.id_encuesta_principal,
                      g.TipoOrg_name,
                      b.id_tipo_organizacion,
                      b.nombre_razon,
                      b.nombre_persona,
                      b.representante_legal,
                      b.id_tipo_identifica,
                      c.Diminutivo_identifica,
                      b.id_empresa,
                      e.ubicacion_name,
                      f.name as caracter_ubicacion,
                      b.direccion_empresa,
                      b.barrio,
                      b.telefonos as telefonoEmpresa,
                      b.celular,
                      b.correo_electronico,
                      d.actividad_name,
                      h.name_clasificacion,
                      h.descripcion_clasificacion,
                      i.empleados_direc_indirect,
                      i.empleados_numero,
                      i.prestaciones,
                      i.porque_prestaciones,
                      j.registroMercantil,
                      j.num_registro,
                      j.usoSuelo,
                      j.justificacion_uso_suelo,
                      j.certificadoBomberos,
                      j.justificacion_bomberos,
                      j.manipulacion_alimentos,
                      j.justificacion_alimentos,
                      j.registro_Invima,
                      j.num_invima,
                      j.justificacion_Invima,
                      j.sayco_acinpro,
                      j.num_sayco,
                      j.justificacion_sayco,
                      j.residuos_peligrosos,
                      j.num_residuos,
                      j.codigo_ciiu,
                      j.num_ciiu,
                      j.cod_industria_comercio,
                      j.num_cod_indusComer,
                      j.ingresos_mensuales,
                      j.valor_activos,
                      j.TIC_PRSTM,
                      a.vendedor_estacionario,
                      k.id_persona,
                      k.Nombre as nombre_encuestado,
                      k.telefono as telefono_encuestado,
                      k.observaciones,
                      l.sistemaSeguridad,
                      l.id_tipos_seguridad,
                      l.victimaDelito,
                      l.id_tipo_delitos,
                      l.sistema_seguridad_personal,
                      m.id_encuestador,
                      m.Nombre_Completo,
                      m.tipo_usuario
                    FROM
                      encuesta_principal a,
                      empresa_propietario b,
                      titleDocumentoIdentifica c,
                      actividad_economica d,
                      ubicacion_comercial e,
                      caracter_ubicacion_comercial f,
                      tipo_organizacion g,
                      clasificacion_de_empresas h,
                      num_empleados i,
                      encuesta_gral j,
                      persona_encuestada k,
                      info_maquila l,
                      info_encuestadores m
                    WHERE
                      b.id_empresa = ".$id."
                      AND a.id_empresa = b.id_empresa
                      AND b.id_tipo_identifica = c.id_documento_identifica
                      AND a.actividad_economica = d.id_actividad
                      AND a.ubicacion_id =e.ubicacion_id
                      AND a.id_caracter_ubicacion = f.id_caracter_ubicacion
                      AND b.id_tipo_organizacion = g.TipoOrg_Id
                      AND a.id_clasificacion = h.id_clasificacion
                      AND i.id_empresa = b.id_empresa
                      AND j.id_encuesta = a.id_encuesta
                      AND k.id_tabla_persona = a.id_tabla_persona
                      AND l.id_info_maquila = a.id_info_maquila
                      AND m.id_encuestador = a.id_encuestador ;";

        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        }

        $result->free();
        return $rows;
    }

    public function getDocumentInfo($numTableDoc){
        $query = "SELECT num_documento, fecha_renovada FROM info_documentos WHERE id_documentos = ".$numTableDoc.";";

        $result = $this->_db->query($query);

        $rows = $result->fetch_array(SQLITE3_ASSOC);

        $result->free();
        return $rows;
    }

    public function getVendedorAmbulanteByIdEmpresa($idEmpresa){

        $query = "SELECT permiso_funcionamiento, cual_permiso, valor_ventas, impuestos, cual_impuesto, numero_empleos, jornada, prestaciones, justificacion_prestaciones FROM adicional_vendedores_naturales WHERE id_empresa = ".$idEmpresa.";";

        $result = $this->_db->query($query);

        $rows = $result->fetch_array(SQLITE3_ASSOC);

        $result->free();

        return $rows;
    }

    public function getRelacionDigitadorEncuesta($idDigitador, $idEncuesta){

        $query = "SELECT a.Nombre_Completo as encuestador FROM info_encuestadores a, relacion_digitador_encuesta b WHERE a.id_encuestador = b.id_encuestador AND b.id_digitador = ".$idDigitador." AND b.id_encuesta = ".$idEncuesta.";";

        $result = $this->_db->query($query);

        $rows = $result->fetch_array(SQLITE3_ASSOC);

        $result->free();

        return $rows;
    }
    /******/

    public function putDataEmpresa($idEmpresa,$tipoIdentificacion,$tipoOrganizacionId,$nombreRazon, $personaNatural ,$representanteLegal,$direccionEmpresa,$barrio,$comuna,$telefonos,$celular,$correoElectronico){

        $query = "INSERT INTO empresa_propietario(id_empresa, id_tipo_identifica, id_tipo_organizacion, nombre_razon, nombre_persona,representante_legal, direccion_empresa, barrio, comuna,telefonos, celular, correo_electronico) VALUES (".$idEmpresa.",".$tipoIdentificacion.",".$tipoOrganizacionId.",'".$nombreRazon."','". $personaNatural."','".$representanteLegal."','".$direccionEmpresa."','".$barrio."','".$comuna."','".$telefonos."','".$celular."','".$correoElectronico."');";

        if($this->_db->query($query) === TRUE){
            return 'Empresa agregada correctaente <br><br>';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataEmpleados($id_empresa, $empleados_direc_indirect, $empleados_numero, $prestaciones, $porque_prestaciones){
        $query = "INSERT INTO num_empleados(id_empresa, empleados_direc_indirect, empleados_numero, prestaciones, porque_prestaciones) VALUES (".$id_empresa.",'". $empleados_direc_indirect."',". $empleados_numero.",". $prestaciones.",'". $porque_prestaciones."');";

        if($this->_db->query($query) === TRUE){
            return 'Empleados agregados correctaente <br><br>';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putInfoDocumentos($tipo_documento, $num_documento, $fechaRenovada){
        $query = "INSERT INTO info_documentos(tipo_documento,num_documento, fecha_renovada) VALUES (".$tipo_documento.",". $num_documento.",'". $fechaRenovada."');";

        if($this->_db->query($query) === TRUE){
            return $this->_db->insert_id;
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataEncuestaGral($registroMercantil, $num_registro, $justificacion_registro, $usoSuelo, $justificacion_uso_suelo, $certificadoBomberos, $justificacion_bomberos, $manipulacion_alimentos, $justificacion_alimentos, $registro_Invima, $num_invima, $justificacion_Invima, $sayco_acinpro, $num_sayco,$justificacion_sayco, $residuos_peligrosos, $num_residuo,$ingresos_mensuales, $codigo_ciiu, $num_ciiu, $cod_industria_comercio, $num_cod_indusComer, $valor_activos, $TIC_PRSTM){
        $query = "INSERT INTO encuesta_gral(registroMercantil, num_registro, justificacion_registro, usoSuelo, justificacion_uso_suelo, certificadoBomberos, justificacion_bomberos, manipulacion_alimentos, justificacion_alimentos, registro_Invima, num_invima, justificacion_Invima, sayco_acinpro, num_sayco, justificacion_sayco, residuos_peligrosos, num_residuos, ingresos_mensuales, codigo_ciiu, num_ciiu, cod_industria_comercio, num_cod_indusComer, valor_activos, TIC_PRSTM) VALUES (".$registroMercantil.",". $num_registro.",'". $justificacion_registro."',". $usoSuelo.",'". $justificacion_uso_suelo."',". $certificadoBomberos.",'". $justificacion_bomberos."',". $manipulacion_alimentos.",'". $justificacion_alimentos."',". $registro_Invima.",".$num_invima.",'". $justificacion_Invima."',". $sayco_acinpro.",".$num_sayco.",'". $justificacion_sayco."',". $residuos_peligrosos.",".$num_residuo.",". $ingresos_mensuales.",". $codigo_ciiu.",". $num_ciiu.",". $cod_industria_comercio.",". $num_cod_indusComer.",". $valor_activos.",". $TIC_PRSTM.");";

        if($this->_db->query($query) === TRUE){
            return $this->_db->insert_id;
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataVendedorEstacionario($id_empresa, $permiso_funcionamiento, $cual_permiso, $valor_ventas, $impuestos, $cual_impuesto, $numero_empleos, $jornada, $prestaciones, $justificacion_prestaciones){
        $query = "INSERT INTO adicional_vendedores_naturales(id_empresa, permiso_funcionamiento, cual_permiso, valor_ventas, impuestos, cual_impuesto, numero_empleos, jornada, prestaciones, justificacion_prestaciones) VALUES (".$id_empresa.",". $permiso_funcionamiento.",'". $cual_permiso."',". $valor_ventas.",". $impuestos.",'". $cual_impuesto."',". $numero_empleos.",'". $jornada."',". $prestaciones.",'". $justificacion_prestaciones."');";

        if($this->_db->query($query) === TRUE){
            return 'Vendedor natural agregados correctaente <br><br>';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataMaquila($num_maquinas, $sistemaSeguridad, $id_tipos_seguridad, $victimaDelito, $id_tipo_delitos, $sistema_seguridad_personal){
        $query = "INSERT INTO info_maquila(num_maquinas, sistemaSeguridad, id_tipos_seguridad, victimaDelito, id_tipo_delitos, sistema_seguridad_personal) VALUES (". $num_maquinas.",". $sistemaSeguridad.",". $id_tipos_seguridad.",". $victimaDelito.",". $id_tipo_delitos.",". $sistema_seguridad_personal.");";

        if($this->_db->query($query) === TRUE){
            return $this->_db->insert_id;
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putDataEncuestaPrincial($fecha, $id_empresa, $ubicacion_id, $id_caracter_ubicacion,$actividad_economica, $id_clasificacion, $empleados, $id_encuesta, $vendedor_estacionario, $maquila, $id_encuestador,$idTableEncuestado){

        $query = "INSERT INTO encuesta_principal(fecha, id_empresa, ubicacion_id, id_caracter_ubicacion,actividad_economica, id_clasificacion, empleados, id_encuesta, vendedor_estacionario, id_info_maquila, id_encuestador, id_tabla_persona) VALUES ('" .$fecha."',". $id_empresa.",". $ubicacion_id.",". $id_caracter_ubicacion.",". $actividad_economica.",". $id_clasificacion.",". $empleados.",". $id_encuesta.",". $vendedor_estacionario.",". $maquila.",". $id_encuestador.",". $idTableEncuestado.");";

        if($this->_db->query($query) === TRUE){
            return $this->_db->insert_id;
        }else{
//            return "Error principal no agregada";
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putRelcionEncuesta($idDigitador, $idEncuestador, $idEncuesta){

        $query = "INSERT INTO relacion_digitador_encuesta(id_digitador, id_encuestador, id_encuesta) VALUES (".$idDigitador.",".$idEncuestador.",".$idEncuesta.");";

        if($this->_db->query($query) === TRUE){
            return 'Relacion agregados correctamente <br><br>';
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putInfoEncuestado($id_persona, $Nombre, $telefono, $observaciones){

        $query = "INSERT INTO persona_encuestada(id_persona, Nombre, telefono, observaciones) VALUES (".$id_persona.",'".$Nombre."','".$telefono."','".$observaciones."');";

        if($this->_db->query($query) === TRUE){
            return $this->_db->insert_id;
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }

    public function putNewActivity($name,$pertence){
        $query = 'INSERT INTO actividad_economica(actividad_name, id_title_actividad) VALUE ("'.$name.'",'.$pertence.');';

        if($this->_db->query($query) === TRUE){
            echo "Agregado Correctamente";
        }else{
            return "Error: " . $query . "<br>" . $this->_db->error;
        }
    }


    public function deleteActividadEconomica($id){
        $query = "DELETE FROM actividad_economica WHERE id_actividad =".$id.";";

        if($this->_db->query($query) === TRUE){
            echo "Actividad eliminada correctamente";
        }else{
            echo "Error al eliminar actividad económica: ". $this->_db->error;
        }
    }

    public function updateActividadEconomica ($val,$id){
        $query = "UPDATE actividad_economica SET actividad_name = '".$val."' WHERE id_actividad = ".$id.";";

        if($this->_db->query($query) === TRUE){
            echo "Actividad actualizada correctamente";
        }else{
            echo "Error al actualizar actividad económica: ". $this->_db->error;
        }
    }
}