<?php
session_start();
if (!($_SESSION["UserId"])) {
    header('Location: /admin?msg=log');
    exit();
} else { 
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    $UserData =	$db->getAllRecords('usuarios','*',' AND id="'.($_SESSION["UserId"]).'"LIMIT 1 ');
    $UserData = $UserData[0];
    //($UserData['nombre'])
}
?>