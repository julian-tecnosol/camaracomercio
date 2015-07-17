<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 15/07/2015
 * Time: 08:33 PM
 */

$tipoIdentificacion = $_POST['selectTipoDocumento'];
$fechaEncuesta = $_POST['fechaencuesta'];
$idEmpresa = $_POST['inpNumDocuemnto'];
$razonSocial = $_POST['inpNombreRazonSocial'];
$telEmpresa = $_POST['telefonoEmpresa'];
$celEmpresa = $_POST['celularEmpresa'];
$emailEmpresa = $_POST['correoEmpresa'];
$nombreRepresenta = $_POST['inpNombreRepresentante'];
$dirEmpresa = $_POST['direccionEmpresa'];
$barrio = $_POST['barrioEmpresa'];
$tipoOrganizacion = $_POST['tipoOrg'];
$selectUbicacion = $_POST['selectUbicaComercial'];
$clasificacionEmpresa = $_POST['clasificacionEmpresa'];
$tieneEmpleados = $_POST['tieneEmpleados'];
$tipoEmpleados = $_POST['tipoEmpleados'];
$numEmpleados = $_POST['numEmpleados'];
$afilPensSalud = $_POST['afilPensSalud'];
$justificacionPrestaciones = $_POST['justificacionPrestaciones'];
$registMercant = $_POST['registMercant'];
$justificacionMercantil = $_POST['justificacionMercantil'];
$numMatriculaMercantil = $_POST['numMatriculaMercantil'];
$anioMatriculaMercantil = $_POST['anioMatriculaMercantil'];
$permiSuelo = $_POST['permiSuelo'];
$justificacionUsoSuelo = $_POST['justificacionUsoSuelo'];
$certBomberos = $_POST['certBomberos'];
$justificacionBomberos = $_POST['justificacionBomberos'];
$manipAlimentos = $_POST['manipAlimentos'];
$justificacionManipulacionAlimentos = $_POST['justificacionManipulacionAlimentos'];
$regisInvima = $_POST['regisInvima'];
$justificacionInvima = $_POST['justificacionInvima'];
$numInvima = $_POST['numInvima'];
$fechaInvima = $_POST['fechaInvima'];
$certSayAcin = $_POST['certSayAcin'];
$justificacionSaycoAcinpro = $_POST['justificacionSaycoAcinpro'];
$numSayco = $_POST['numSayco'];
$fechaAcinpro = $_POST['fechaAcinpro'];
$contrDispoResid = $_POST['contrDispoResid'];
$numResiduosPeligrosos = $_POST['numResiduosPeligrosos'];
$fechaResiduosPeligrosos = $_POST['fechaResiduosPeligrosos'];
$codCiiu = $_POST['codCiiu'];
$numCodCiiu = $_POST['numCodCiiu'];
$codIndustComerc = $_POST['codIndustComerc'];
$numIndustriaComercio = $_POST['numIndustriaComercio'];
$valorIngresosMensuales = $_POST['valorIngresosMensuales'];
$valorActivosEmpresa = $_POST['valorActivosEmpresa'];
$permisoTic = $_POST['permisoTic'];
$permisoFuncionamiento = $_POST['permisoFuncionamiento'];
$otroPermisoFunconamiento = $_POST['otroPermisoFunconamiento'];
$ventasMensuales = $_POST['ventasMensuales'];
$empleosGenerados = $_POST['empleosGenerados'];
$jornadaLaboral = $_POST['jornadaLaboral'];
$pagaImpuesto = $_POST['pagaImpuesto'];
$otroImpuesto = $_POST['otroImpuesto'];
$afiliadoSaludPensionArl = $_POST['afiliadoSaludPensionArl'];
$numMaquinas = $_POST['numMaquinas'];
$tieneSeguridadPriv = $_POST['tieneSeguridadPriv'];
$tipoSistemaSeguridad = $_POST['tipoSistemaSeguridad'];
$victimaDelito = $_POST['victimaDelito'];
$tipoDelito = $_POST['tipoDelito'];
$segPersonal = $_POST['segPersonal'];
$ActividadEconomica = $_POST['ActividadEconomica'];
$idEncuestador = $_POST['idEncuestador'];


require_once('../model/encuestaModel.php');

$putData = new encuestaModel();

$putData->putDataEmpresa($idEmpresa,$tipoIdentificacion,$razonSocial,$nombreRepresenta,$dirEmpresa,$barrio,$telEmpresa,$celEmpresa,$emailEmpresa);

if($tieneEmpleados){
    $putData->putDataEmpleados($idEmpresa,$tipoEmpleados,$numEmpleados,$afilPensSalud,$justificacionPrestaciones);
}

$vendeAmbulante = 0;

if($tipoOrganizacion == '2' || $tipoOrganizacion == '3'){
    $putData->putDataVendedorEstacionario($idEmpresa,$permisoFuncionamiento,$otroPermisoFunconamiento,$valorIngresosMensuales,$pagaImpuesto,$otroImpuesto,$empleosGenerados,$jornadaLaboral,$afiliadoSaludPensionArl,$justificacionPrestaciones);
    $vendeAmbulante = 1;
}

$putData->putDataMaquila($idEmpresa,$numMaquinas,$tieneSeguridadPriv,$tipoSistemaSeguridad,$victimaDelito,$tipoDelito,$segPersonal);

$idEncuestaGeneral = $putData->putDataEncuestaGral($registMercant,$numMatriculaMercantil,$justificacionMercantil,$permiSuelo,$justificacionUsoSuelo,$certBomberos,$justificacionBomberos,$manipAlimentos,$justificacionManipulacionAlimentos,$regisInvima,$justificacionInvima,$certSayAcin,$justificacionSaycoAcinpro,$contrDispoResid,$valorIngresosMensuales,$codCiiu,$numCodCiiu,$codIndustComerc,$numIndustriaComercio,$valorActivosEmpresa,$permisoTic);

$putData->putDataEncuestaPrincial($fechaEncuesta,$idEmpresa,$selectUbicacion,$ActividadEconomica,$clasificacionEmpresa,$tieneEmpleados,$idEncuestaGeneral,$vendeAmbulante,1,$idEncuestador,$selectUbicacion);
