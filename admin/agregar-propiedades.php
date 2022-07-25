<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-plus-circle"></i> Add Property</h2>
            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <div class="row">
        <?php
        include("admin/sideNav.php");
        ?>
        <!-- Submit Page -->
        <div class="col-md-8">

            <form method="post" enctype="multipart/form-data">
                <!-- Section -->
                <h3>Información básica.</h3>
                <div class="submit-section">
                    <!-- Row -->
                    <div class="row with-forms">
                        <div class="col-md-12">
                            <h5>Título <i class="tip" data-tip-content="Este es el nombre de la propiedad Ej: VILLA ESTERO"></i></h5>
                            <input class="search-field" name="nombre" type="text" />
                        </div>

                        <div class="col-md-12">
                            <h5>Descripción</h5>
                            <textarea class="WYSIWYG" name="descripcion" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                        </div>

                        <div class="col-md-12">
                            <h5>Subir foto principal<i class="tip" data-tip-content="Tamaño máximo de foto es de 1 MB"></i></h5>
                            <input placeholder="Subir foto" name="thumb" type="file">
                        </div>
                    </div>
                </div>

                <!-- Section -->
                <h3>Información extra.</h3>
                <div class="submit-section">
                    <div class="row with-forms">

                        <div class="col-md-6">
                            <h5>Ubicación</h5>
                            <select class="chosen-select-no-single" name="ubicacion">
                                <option value="San José del Cabo">San José del Cabo</option>
                                <option value="Corridor">Corredor</option>
                                <option value="San Lucas">San Lucas</option>
                            </select>
                        </div>

                        <!-- Video -->
                        <div class="col-md-6">
                            <h5>Video<i class="tip" data-tip-content="Copia y pega el ID del video de Youtube Aquí"></i></h5>
                            <div class="select-input disabled-first-option">
                                <input type="text" name="video" data-unit="Youtube ID">
                            </div>
                        </div>

                        <!-- Area -->
                        <div class="col-md-4">
                            <h5>Area</h5>
                            <div class="select-input disabled-first-option">
                                <input type="number" name="area" data-unit="Sq Ft">
                            </div>
                        </div>
                        <!-- Latitud -->
                        <div class="col-md-4">
                            <h5>Latitud</h5>
                            <div class="select-input disabled-first-option">
                                <input type="text" name="lat" data-unit="Lat">
                            </div>
                        </div>
                        <!-- Longitud -->
                        <div class="col-md-4">
                            <h5>Longitud</h5>
                            <div class="select-input disabled-first-option">
                                <input type="text" name="lon" data-unit="Lon">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Section -->
                <h5>Características <span>(optional) </span><i class="tip" data-tip-content="Agrega nuevas características desde la configuración."></i></h5>
                <div class="submit-section">
                    <div class="row with-forms">

                        <div class="col-md-12">
                            <div class="checkboxes in-row margin-bottom-20">
                                <?php $caracData = $db->getAllRecords('caracteristicas', '*', 'ORDER BY nombre ASC');
                                if (count($caracData) > 0) {
                                    $y    =    '';
                                    foreach ($caracData as $caracteristica) {
                                        $y++;
                                ?>
                                        <input checked id="check-<?php echo ($caracteristica['id']); ?>" value="<?php echo ($caracteristica['id']); ?>" type="checkbox" name="caracteristicas[]">
                                        <label for="check-<?php echo ($caracteristica['id']); ?>"><?php echo ($caracteristica['nombre']); ?></label>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" value="submit" class="button margin-top-20 margin-bottom-20">Enviar</button>
            </form>

        </div>

    </div>
</div>