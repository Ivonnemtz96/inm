<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/database_conf/sesion.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//FUNCION PARA CALCULAR EDAD DE UN POST
date_default_timezone_set('America/Denver');
function diff_fecha($fecha)
{
	$fecha_nac = new DateTime(date('Y-m-d H:i:s', strtotime($fecha))); // Objeto DateTime de la fecha ingresada
	$fecha_hoy =  new DateTime(date('Y-m-d H:i:s', time())); // Objeto DateTime de la fecha de hoy
	$edad = date_diff($fecha_hoy, $fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
	return $edad;
}
?>