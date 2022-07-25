<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/database_conf/sesion.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/database_conf/perfil_conf.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

?>

<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Propiedades';
$propiedades = 'current';
require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/head.php");
?>

<body>
    <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/preloader.php");
    ?>
    <div id="wrapper">
        <?php
        include("includes/header.php");
        include("admin/profile.php");
        include("includes/footer.php");
        include("includes/scripts.php");
        ?>
    </div>
</body>

</html>