<!-- Titlebar======================================= -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Carácteristicas</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Carácteristicas</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>

<!-- Content================================== -->
<div class="container">
    <div class="row">

        <!-- Widget -->
        <?php
        require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/sideNav.php");
        ?>
        <div class="col-md-8">
            <table class="manage-table responsive-table table-hover">
                <?php
                //VERIFICAMOS SI YA TIENE CARACTERÍSTICAS REGISTRADAS PARA LLAMAR A ESTE MODULO, SI NO, NO 
                $caracData    =    $db->getQueryCount('caracteristicas', 'id');
                $caracData  =   ($caracData[0]['total']);

                if (($caracData) > 0) { ?>
                    <tr>
                        <th><i class="fa fa-file-text"></i> Característica</th>
                        <th><i class="fa fa-check-square-o"></i> Acción</th>
                    </tr>
                <?php

                    require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/lista-caract.php");
                } else {
                    echo "<h2>No hay características</h2>";
                }
                ?>
            </table>

        </div>
    </div>