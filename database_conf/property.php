<?php session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_SESSION["UserId"])) {
    $UserData =    $db->getAllRecords('usuarios', '*', ' AND id="' . ($_SESSION["UserId"]) . '"LIMIT 1 ');
    $UserData = $UserData[0];
    //($UserData['nombres'])
}

//SI NO HAY ID EN EL GET MANDA ERROR
if (!isset($_REQUEST['id'])) {

    echo "ERROR 10";
    exit();
}
$propiedadData =    $db->getAllRecords('propiedades', '*', ' AND id="' . $_REQUEST['id'] . '"LIMIT 1 ');

//SI NO HAY ID EN EL GET MANDA ERROR
if (!($propiedadData)) {
    echo "ERROR 20";
    exit();
}

$propiedadData = $propiedadData[0];

//SUMAMOS +1 A LAS IMPRECIONES DEL ANUNCIO
$SumImpreciones = (($propiedadData['impresiones']) + 1);

$InsertData    =    array(
    'impresiones' => $SumImpreciones,
);
$update     =  $db->update('propiedades', $InsertData, array('id' => ($propiedadData['id']))); //ACTUALIZAMOS LAS IMPRECIONES



//OBTENER DATOS DEL AGENTE
$agente  =  $db->getAllRecords('usuarios', '*', ' AND id="' . ($propiedadData['usuario']) . '"LIMIT 1 ');
$agente  =  $agente[0];
