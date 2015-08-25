<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 20/08/15
 * Time: 04:58 PM
 */

require_once('../model/encuestaModel.php');

$id = $_POST['idEmpresa'];

$classEncuesta = new encuestaModel();

$allRowsTablesView = $classEncuesta->getAllRowsEncuestaById($id);

if($allRowsTablesView[0]["registroMercantil"] == 1){
    $consultaDocumentos = $classEncuesta->getDocumentInfo($allRowsTablesView[0]["num_registro"]);
    $allRowsTablesView[0]["num_registro_mercantil"] = $consultaDocumentos["num_documento"];
    $allRowsTablesView[0]["fecha_registro_mercantil"] = $consultaDocumentos["fecha_renovada"];
}if ($allRowsTablesView[0]["registro_Invima"] == 1){
    $consultaDocumentos = $classEncuesta->getDocumentInfo($allRowsTablesView[0]["num_invima"]);
    $allRowsTablesView[0]["num_registro_invima"] = $consultaDocumentos["num_documento"];
    $allRowsTablesView[0]["fecha_registro_invima"] = $consultaDocumentos["fecha_renovada"];
}if ($allRowsTablesView[0]["sayco_acinpro"] == 1){
    $consultaDocumentos = $classEncuesta->getDocumentInfo($allRowsTablesView[0]["num_sayco"]);
    $allRowsTablesView[0]["num_sayco"] = $consultaDocumentos["num_documento"];
    $allRowsTablesView[0]["fecha_sayco"] = $consultaDocumentos["fecha_renovada"];
}if ($allRowsTablesView[0]["residuos_peligrosos"] == 1){
    $consultaDocumentos = $classEncuesta->getDocumentInfo($allRowsTablesView[0]["num_residuos"]);
    $allRowsTablesView[0]["num_residuos"] = $consultaDocumentos["num_documento"];
    $allRowsTablesView[0]["fecha_residuos"] = $consultaDocumentos["fecha_renovada"];
}if ($allRowsTablesView[0]["codigo_ciiu"] == 1){
    $consultaDocumentos = $classEncuesta->getDocumentInfo($allRowsTablesView[0]["num_ciiu"]);
    $allRowsTablesView[0]["num_ciiu"] = $consultaDocumentos["num_documento"];
    $allRowsTablesView[0]["fecha_ciiu"] = $consultaDocumentos["fecha_renovada"];
}if ($allRowsTablesView[0]["cod_industria_comercio"] == 1){
    $consultaDocumentos = $classEncuesta->getDocumentInfo($allRowsTablesView[0]["num_cod_indusComer"]);
    $allRowsTablesView[0]["num_industriComercio"] = $consultaDocumentos["num_documento"];
    $allRowsTablesView[0]["fecha_industriComercio"] = $consultaDocumentos["fecha_renovada"];
}
if($allRowsTablesView[0]["vendedor_estacionario"] == 1) {
    $vendorEstacionario = $classEncuesta->getVendedorAmbulanteByIdEmpresa($allRowsTablesView[0]["id_empresa"]);
    $allRowsTablesView[0] = $vendorEstacionario;
}

if($allRowsTablesView[0]["tipo_usuario"] == 'D'){
    $relacion = $classEncuesta->getRelacionDigitadorEncuesta($allRowsTablesView[0]["id_encuestador"],$allRowsTablesView[0]["id_encuesta_principal"]);
    $allRowsTablesView[0]['encuestador'] = $relacion['encuestador'];
}

echo json_encode($allRowsTablesView);