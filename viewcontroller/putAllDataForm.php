<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 15/07/2015
 * Time: 08:33 PM
 */

$idEncuestador = isset($_POST['idEncuestador']) ? $_POST['idEncuestador'] : '';
$tipoUsuario = isset($_POST['tipoEncuestador']) ? $_POST['tipoEncuestador'] : '';
$tipoIdentificacion = isset($_POST['selectTipoDocumento']) ? $_POST['selectTipoDocumento'] : '';
$fechaEncuesta = isset($_POST['fechaencuesta']) ? $_POST['fechaencuesta'] : '';
$idEmpresa = isset($_POST['inpNumDocuemnto']) ? $_POST['inpNumDocuemnto'] : '';
$razonSocial = isset($_POST['inpNombreRazonSocial']) ? $_POST['inpNombreRazonSocial'] : '';
$personaNatural = isset($_POST['inpNombrePersonaNatural']) ? $_POST['inpNombrePersonaNatural'] : '';
$telEmpresa = isset($_POST['telefonoEmpresa']) ? $_POST['telefonoEmpresa'] : '';
$celEmpresa = isset($_POST['celularEmpresa']) ? $_POST['celularEmpresa'] : '';
$emailEmpresa = isset($_POST['correoEmpresa']) ? $_POST['correoEmpresa'] : '';
$nombreRepresenta = isset($_POST['inpNombreRepresentante']) ? $_POST['inpNombreRepresentante'] : '';
$dirEmpresa = isset($_POST['direccionEmpresa']) ? $_POST['direccionEmpresa'] : '';
$barrio = isset($_POST['barrioEmpresa']) ? $_POST['barrioEmpresa'] : '';
$comunaEmpresa = isset($_POST['comunaEmpresa']) ? $_POST['comunaEmpresa'] : '';
$tipoOrganizacion = isset($_POST['tipoOrg']) ? $_POST['tipoOrg'] : '';
$selectUbicacion = isset($_POST['selectUbicaComercial']) ? $_POST['selectUbicaComercial'] : '';
$id_caracter_ubicacion = isset($_POST['caracterUbicacion']) ? $_POST['caracterUbicacion'] : '';
$actividadEconomica = isset($_POST['ActividadEconomica']) ? $_POST['ActividadEconomica'] : '';
$clasificacionEmpresa = isset($_POST['clasificacionEmpresa']) ? $_POST['clasificacionEmpresa'] : '';
$tieneEmpleados = isset($_POST['tieneEmpleados']) ? $_POST['tieneEmpleados'] : '';
$tipoEmpleados = isset($_POST['tipoEmpleados']) ? $_POST['tipoEmpleados'] : '';
$numEmpleados = isset($_POST['numEmpleados']) ? $_POST['numEmpleados'] : '';
$afilPensSalud = isset($_POST['afilPensSalud']) ? $_POST['afilPensSalud'] : '';
$justificacionPrestaciones = isset($_POST['justificacionPrestaciones']) ? $_POST['justificacionPrestaciones'] : '';
$registMercant = isset($_POST['registMercant']) ? $_POST['registMercant'] : '';
$justificacionMercantil = isset($_POST['justificacionMercantil']) ? $_POST['justificacionMercantil'] : '';
$numMatriculaMercantil = isset($_POST['numMatriculaMercantil']) ? $_POST['numMatriculaMercantil'] : '';
$anioMatriculaMercantil = isset($_POST['anioMatriculaMercantil']) ? $_POST['anioMatriculaMercantil'] : '';
$permiSuelo = isset($_POST['permiSuelo']) ? $_POST['permiSuelo'] : '';
$justificacionUsoSuelo = isset($_POST['justificacionUsoSuelo']) ? $_POST['justificacionUsoSuelo'] : '';
$certBomberos = isset($_POST['certBomberos']) ? $_POST['certBomberos'] : '';
$justificacionBomberos = isset($_POST['justificacionBomberos']) ? $_POST['justificacionBomberos'] : '';
$manipAlimentos = isset($_POST['manipAlimentos']) ? $_POST['manipAlimentos'] : '';
$justificacionManipulacionAlimentos = isset($_POST['justificacionManipulacionAlimentos']) ? $_POST['justificacionManipulacionAlimentos'] : '';
$regisInvima = isset($_POST['regisInvima']) ? $_POST['regisInvima'] : '';
$justificacionInvima = isset($_POST['justificacionInvima']) ? $_POST['justificacionInvima'] : '';
$numInvima = isset($_POST['numInvima']) ? $_POST['numInvima'] : '';
$fechaInvima = isset($_POST['fechaInvima']) ? $_POST['fechaInvima'] : '';
$certSayAcin = isset($_POST['certSayAcin']) ? $_POST['certSayAcin'] : '';
$justificacionSaycoAcinpro = isset($_POST['justificacionSaycoAcinpro']) ? $_POST['justificacionSaycoAcinpro'] : '';
$numSayco = isset($_POST['numSayco']) ? $_POST['numSayco'] : '';
$fechaAcinpro = isset($_POST['fechaAcinpro']) ? $_POST['fechaAcinpro'] : '';
$contrDispoResid = isset($_POST['contrDispoResid']) ? $_POST['contrDispoResid'] : '';
$numResiduosPeligrosos = isset($_POST['numResiduosPeligrosos']) ? $_POST['numResiduosPeligrosos'] : '';
$fechaResiduosPeligrosos = isset($_POST['fechaResiduosPeligrosos']) ? $_POST['fechaResiduosPeligrosos'] : '';
$codCiiu = isset($_POST['codCiiu']) ? $_POST['codCiiu'] : '';
$numCodCiiu = isset($_POST['numCodCiiu']) ? $_POST['numCodCiiu'] : '';
$codIndustComerc = isset($_POST['codIndustComerc']) ? $_POST['codIndustComerc'] : '';
$numIndustriaComercio = isset($_POST['numIndustriaComercio']) ? $_POST['numIndustriaComercio'] : '';
$valorIngresosMensuales = isset($_POST['valorIngresosMensuales']) ? $_POST['valorIngresosMensuales'] : '';
$valorActivosEmpresa = isset($_POST['valorActivosEmpresa']) ? $_POST['valorActivosEmpresa'] : '';
$permisoTic = isset($_POST['permisoTic']) ? $_POST['permisoTic'] : '';
$permisoFuncionamiento = isset($_POST['permisoFuncionamiento']) ? $_POST['permisoFuncionamiento'] : '';
$otroPermisoFunconamiento = isset($_POST['otroPermisoFunconamiento']) ? $_POST['otroPermisoFunconamiento'] : '';
$ventasMensuales = isset($_POST['ventasMensuales']) ? $_POST['ventasMensuales'] : '';
$empleosGenerados = isset($_POST['empleosGenerados']) ? $_POST['empleosGenerados'] : '';
$jornadaLaboral = isset($_POST['jornadaLaboral']) ? $_POST['jornadaLaboral'] : '';
$pagaImpuesto = isset($_POST['pagaImpuesto']) ? $_POST['pagaImpuesto'] : '';
$otroImpuesto = isset($_POST['otroImpuesto']) ? $_POST['otroImpuesto'] : '';
$afiliadoSaludPensionArl = isset($_POST['afiliadoSaludPensionArl']) ? $_POST['afiliadoSaludPensionArl'] : '';
$numMaquinas = isset($_POST['numMaquinas']) ? $_POST['numMaquinas'] : '';
$tieneSeguridadPriv = isset($_POST['tieneSeguridadPriv']) ? $_POST['tieneSeguridadPriv'] : '';
$tipoSistemaSeguridad = isset($_POST['tipoSistemaSeguridad']) ? $_POST['tipoSistemaSeguridad'] : '0';
$victimaDelito = isset($_POST['victimaDelito']) ? $_POST['victimaDelito'] : '';
$tipoDelito = isset($_POST['tipoDelito']) ? $_POST['tipoDelito'] : '0';
$segPersonal = isset($_POST['segPersonal']) ? $_POST['segPersonal'] : '';

$idPersonaEncuestada = isset($_POST['idPersonaEncuestada']) ? $_POST['idPersonaEncuestada'] : '';
$nombrePersonaEncuestada = isset($_POST['nombrePersonaEncuestada']) ? $_POST['nombrePersonaEncuestada'] : '';
$telefonoEncuestado = isset($_POST['telefonoEncuestado']) ? $_POST['telefonoEncuestado'] : '';
$observaciones = isset($_POST['observa']) ? $_POST['observa'] : '';


require_once('../model/encuestaModel.php');

$putData = new encuestaModel();

echo $putData->putDataEmpresa($idEmpresa,$tipoIdentificacion,$razonSocial, $personaNatural,$nombreRepresenta,$dirEmpresa,$barrio,$comunaEmpresa,$telEmpresa,$celEmpresa,$emailEmpresa);

if($tieneEmpleados){
    echo $putData->putDataEmpleados($idEmpresa,$tipoEmpleados,$numEmpleados,$afilPensSalud,$justificacionPrestaciones);
}

$vendeAmbulante = 0;
if($tipoOrganizacion == '2' || $tipoOrganizacion == '3' || $tipoOrganizacion == '17'|| $tipoOrganizacion == '18'){
    echo $putData->putDataVendedorEstacionario($idEmpresa,$permisoFuncionamiento,$otroPermisoFunconamiento,$valorIngresosMensuales,$pagaImpuesto,$otroImpuesto,$empleosGenerados,$jornadaLaboral,$afiliadoSaludPensionArl,$justificacionPrestaciones);
    $vendeAmbulante = 1;
}

$idTablaMatricula =0;
$idTablaInvima = 0;
$idTablaSayco = 0;
$idTablaResiduos = 0;
$idTablaCiiu = 0;
$idTablaComercio = 0;


if($registMercant){
    $idTablaMatricula = $putData->putInfoDocumentos(1,$numMatriculaMercantil,$anioMatriculaMercantil);
}
if($regisInvima){
    $idTablaInvima = $putData->putInfoDocumentos(2,$numInvima,$fechaInvima);
}
if($certSayAcin){
    $idTablaSayco = $putData->putInfoDocumentos(3,$numSayco,$fechaAcinpro);
}
if($contrDispoResid){
    $idTablaResiduos = $putData->putInfoDocumentos(4,$numResiduosPeligrosos,$fechaResiduosPeligrosos);
}
if($codCiiu){
    $idTablaCiiu = $putData->putInfoDocumentos(5,$numCodCiiu,'No Aplica');
}
if($codIndustComerc){
    $idTablaComercio = $putData->putInfoDocumentos(6,$numIndustriaComercio,'No Aplica');
}

echo $idMaquilaTable = $putData->putDataMaquila($numMaquinas,$tieneSeguridadPriv,$tipoSistemaSeguridad,$victimaDelito,$tipoDelito,$segPersonal);

echo $idEncuestaGeneral = $putData->putDataEncuestaGral($registMercant,$idTablaMatricula,$justificacionMercantil,$permiSuelo,$justificacionUsoSuelo,$certBomberos,$justificacionBomberos,$manipAlimentos,$justificacionManipulacionAlimentos,$regisInvima,$idTablaInvima,$justificacionInvima,$certSayAcin,$idTablaSayco,$justificacionSaycoAcinpro,$contrDispoResid,$idTablaResiduos,$valorIngresosMensuales,$codCiiu,$idTablaCiiu,$codIndustComerc,$idTablaComercio,$valorActivosEmpresa,$permisoTic);

echo $idTableEncuestado = $putData->putInfoEncuestado($idPersonaEncuestada,$nombrePersonaEncuestada,$telefonoEncuestado,$observaciones);

echo $idEncuestaPrincipal = $putData->putDataEncuestaPrincial($fechaEncuesta,$idEmpresa,$selectUbicacion,$id_caracter_ubicacion,$actividadEconomica,$clasificacionEmpresa,$tieneEmpleados,$idEncuestaGeneral,$vendeAmbulante,$idMaquilaTable,$idEncuestador,$idTableEncuestado);

if($tipoUsuario == 'D'){
    $idOtroEncuestador = isset($_POST['idOtroEncuestador']) ? $_POST['idOtroEncuestador'] : '';
    echo $putData->putRelcionEncuesta($idEncuestador,$idOtroEncuestador,$idEncuestaPrincipal);
}




