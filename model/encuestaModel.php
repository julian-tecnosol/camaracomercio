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

        $query = "SELECT a.id_encuesta_principal,a.fecha,a.id_empresa,a.ubicacion_id,a.id_encuestador,b.nombre_razon, b.nombre_persona, b.barrio, b.direccion_empresa, b.comuna, c.Nombre, c.telefono, c.observaciones, d.actividad_name, e.Nombre_Completo FROM encuesta_principal a, empresa_propietario b, persona_encuestada c, actividad_economica d, info_encuestadores e WHERE a.id_empresa = b.id_empresa AND a.id_tabla_persona = c.id_tabla_persona AND  d.id_actividad = a.actividad_economica AND e.id_encuestador = a.id_encuestador ORDER BY a.id_encuesta_principal;";
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
                      a.id_caracter_ubicacion,
                      g.TipoOrg_name,
                      b.id_tipo_organizacion,
                      b.nombre_razon,
                      b.nombre_persona,
                      b.representante_legal,
                      b.id_tipo_identifica,
                      c.Diminutivo_identifica,
                      b.id_empresa,
                      e.ubicacion_name,
                      e.ubicacion_id,
                      f.name as caracter_ubicacion,
                      b.direccion_empresa,
                      b.barrio,
                      b.comuna,
                      b.telefonos as telefonoEmpresa,
                      b.celular,
                      b.correo_electronico,
                      d.actividad_name,
                      d.id_actividad,
                      d.id_title_actividad,
                      h.id_clasificacion,
                      h.name_clasificacion,
                      h.descripcion_clasificacion,
                      a.empleados,
                      j.registroMercantil,
                      j.num_registro,
                      j.justificacion_registro,
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
                      l.num_maquinas,
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

    public function getDataEmpleados($idEmpresa){
        $query = "SELECT empleados_direc_indirect, empleados_numero, prestaciones, porque_prestaciones FROM num_empleados WHERE id_empresa = ".$idEmpresa." ;";

        $result = $this->_db->query($query);

        $rows = $result->fetch_array(SQLITE3_ASSOC);

        $result->free();
        return $rows;
    }

    public function getAllJustificaciones(){
        $query = "SELECT id_justificacion, Nombre_Justificacion FROM justificaciones ;";

        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        }

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

    public function getAllPosicion(){

        $query = "SELECT a.lat,a.lon,a.name_img,b.nombre_razon FROM multimedia a, empresa_propietario b WHERE a.id_empresa = b.id_empresa;";

        $result = $this->_db->query($query);

        $rows = [];
        while($row = $result->fetch_array(SQLITE3_ASSOC)){
            $rows[] = $row;
        }

        $result->free();
        return $rows;
    }


    public function getTiposDeSeguridadById ($idSeguridad){
        $query = "SELECT name_seguridad FROM tipos_seguridad WHERE id_tipos_seguridad = ".$idSeguridad.";";

        $result = $this->_db->query($query);

        $rows = $result->fetch_array(SQLITE3_ASSOC);

        $result->free();

        return $rows;
    }


    public function getTiposDeDelitoById ($idDelito){
        $query = "SELECT name_delito FROM tipo_delitos WHERE id_tipo_delito = ".$idDelito.";";

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

    /******************************************************
     *      TODOS LOS SETTERS PARA MODIFICAR LOS DATOS
    *******************************************************/

    public function updateInformacionPersonal($selectTipoDocumento,$fechaencuesta,$inpNumDocuemnto,$inpNombreRazonSocial,$inpNombrePersonaNatural,$telefonoEmpresa,$celularEmpresa,$correoEmpresa,$tipoOrg,$inpNombreRepresentante){

        $query = "UPDATE empresa_propietario SET id_tipo_identifica = ". $selectTipoDocumento .", id_tipo_organizacion = ".$tipoOrg.", nombre_razon = '".$inpNombreRazonSocial."', nombre_persona = '". $inpNombrePersonaNatural ."', representante_legal = '".$inpNombreRepresentante."', telefonos ='". $telefonoEmpresa."', celular ='". $celularEmpresa."', correo_electronico ='".$correoEmpresa."' WHERE id_empresa = ".$inpNumDocuemnto."; ";
        $contador = 2;

        if($this->_db->query($query) === TRUE){
            if($this->_db->affected_rows > 0){
                echo "Informacion personal actualizada correctamente";
                $contador = $contador - 1;
            }
        }else{
            echo "Error al actualizar Informacion personal:<br><br> ". $this->_db->error;
        }

        $query2 = "UPDATE encuesta_principal SET  fecha = '".$fechaencuesta."' WHERE id_empresa = ".$inpNumDocuemnto.";";

        if($this->_db->query($query2) === TRUE){
            if($this->_db->affected_rows > 0){
                echo "Fecha de la encuesta personal actualizada correctamente";
                $contador = $contador - 1;
            }
        }else{
            echo "Error al actualizar Informacion personal:<br><br> ". $this->_db->error;
        }

        if($contador == 2){
            echo "No Hay informacion para actualizar";
        }
    }

    public function updateUbicacionEmpresa($direccionEmpresa,$barrioEmpresa,$comunaEmpresa,$selectUbicaComercial,$caracterUbicacion,$inpNumDocuemnto){

        $contador = 2;
        $query = "UPDATE empresa_propietario SET direccion_empresa = '".$direccionEmpresa."', barrio ='".$barrioEmpresa."', comuna ='".$comunaEmpresa."' WHERE id_empresa =".$inpNumDocuemnto.";";

        if($this->_db->query($query) === TRUE){
            echo "Direccion de la empresa actualizada correctamente<br><br>";
        }else{
            echo "Error al actualizar Direccion de la empresa:<br><br> ". $this->_db->error;
        }

        $query2 = "UPDATE encuesta_principal SET ubicacion_id = ".$selectUbicaComercial.", id_caracter_ubicacion = ".$caracterUbicacion." WHERE id_empresa = ".$inpNumDocuemnto.";";

        if($this->_db->query($query2) === TRUE){
            if($this->_db->affected_rows > 0){
                echo "Ubicacion de la empresa actualizada correctamente<br><br>";
                $contador = $contador - 1;
            }
        }else{
            echo "Error al actualizar Ubicacion de la empresa:<br><br> ". $this->_db->error;
        }

        if($contador == 2){
            echo "No Hay informacion para actualizar";
        }
    }

    public function updateClasificacionEmpresa($titletipoActividad,$ActividadEconomica,$clasificacionEmpresa,$tieneEmpleados,$tipoEmpleados,$numEmpleados,$afilPensSalud,$justificacionPrestaciones,$inpNumDocuemnto){

        $query = "UPDATE encuesta_principal SET actividad_economica= ".$ActividadEconomica.", id_clasificacion =".$clasificacionEmpresa.", empleados =".$tieneEmpleados." WHERE id_empresa =".$inpNumDocuemnto.";";

        if($this->_db->query($query) === TRUE){
            echo "Clasificación de la empresa actualizada correctamente<br><br>";
        }else{
            echo "Error al actualizar Clasificación de la empresa:<br><br> ". $this->_db->error;
        }

        if($tieneEmpleados == 1){
            $queryEmpleados = "SELECT id_num_empleados FROM num_empleados WHERE id_empresa = ". $inpNumDocuemnto .";";

            $resultEmpleados = $this->_db->query($queryEmpleados);

            if($resultEmpleados->num_rows > 1){
                $rows = $resultEmpleados->fetch_array(SQLITE3_ASSOC);

                $queryUpdate = "UPDATE num_empleados SET empleados_direc_indirect =".$tipoEmpleados.", empleados_numero = ".$numEmpleados.", prestaciones = ".$afilPensSalud.", porque_prestaciones= '".$justificacionPrestaciones."' WHERE id_num_empleados = ".$rows["id_num_empleados"].";";

                if($this->_db->query($queryUpdate) === TRUE){
                    echo "Empleados actualizados correctamente<br><br>";
                }else{
                    echo "Error al actualizar empleados :<br><br> ". $this->_db->error;
                }

            }else{
                $queryInsert = "INSERT INTO num_empleados(id_empresa, empleados_direc_indirect, empleados_numero, prestaciones, porque_prestaciones) VALUES (".$inpNumDocuemnto.",".$tipoEmpleados.",".$numEmpleados.",".$afilPensSalud.",'".$justificacionPrestaciones."');";

                if($this->_db->query($queryInsert) === TRUE){
                    echo "Empleados agregados correctamente<br><br>";
                }else{
                    return "Error: " . $queryInsert . "<br>" . $this->_db->error;
                };
            };

            $resultEmpleados->free();
        }
    }

    /******************************************************/
}