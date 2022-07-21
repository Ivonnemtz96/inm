<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

if (isset($_SESSION["UserId"])) {
    header('Location: admin/login.php?msg=yal');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Inicio';
$inicio = 'current';
include('includes/head.php');
?>

<body>
    <?php
    include("includes/preloader.php");
    ?>
    <div id="wrapper">
        <?php
        include("includes/header.php");
        include("admin/login.php");
        include("includes/footer.php");
        include("includes/scripts.php");
        ?>
    </div>
</body>

</html>