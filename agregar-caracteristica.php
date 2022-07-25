<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/database_conf/sesion.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/database_conf/agregar-caract.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Contacto';
$contacto = 'current';
include('includes/head.php');
?>

<body>
    <?php
    include("includes/preloader.php");
    ?>
    <div id="wrapper">
        <?php
        include("includes/header.php");
        include("admin/agregar-caracteristica.php");
        include("includes/footer.php");
        include("includes/scripts.php");
        ?>
    </div>
</body>

</html>