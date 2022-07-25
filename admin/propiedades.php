<!-- Titlebar======================================= -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Mis propiedades</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li>Mis porpiedades</li>
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
        include("admin/sideNav.php");
        ?>

        <div class="col-md-8">
            <table class="manage-table responsive-table">
                <?php

                //VERIFICAMOS SI YA TIENE CASAS REGISTRADAS PARA LLAMAR A ESTE MODULO, SI NO, NO XD
                if (($UserData['propiedades']) > 0) { ?>
                    <tr>
                        <th><i class="fa fa-file-text"></i> Propiedad</th>
                        <th></th>
                    </tr>
                <?php

                    require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/lista-prop.php");
                } else {
                    echo "<h2>No hay propiedades</h2>";
                }
                ?>

            </table>
        </div>
    </div>
</div>