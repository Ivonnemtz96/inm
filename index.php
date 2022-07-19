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
        include("modules/index.php");
        include("includes/footer.php");
        include("includes/scripts.php");
        ?>
    </div>
</body>

</html>