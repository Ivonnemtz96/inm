<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Titlebar
================================================== -->
<div id="titlebar" class="property-titlebar margin-bottom-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <a href="/" class="back-to-listings"></a>
                <div class="property-title">
                    <h2><?php echo ($propiedadData['nombre']); ?> <span class="property-badge">For Rent</span></h2>

                    <?php if (!empty($propiedadData['direccion'])) { ?>

                        <span>
                            <a href="#location" class="listing-address">
                                <i class="fa fa-map-marker"></i>
                                <?php echo ($propiedadData['direccion']); ?>
                            </a>
                        </span>

                    <?php
                    } ?>

                </div>


            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->

<!-- Slider -->
<div class="fullwidth-property-slider margin-bottom-50">

    <?php $fotosData = $db->getAllRecords('fotos', '*', 'AND propiedad=' . ($propiedadData['id']) . '', 'ORDER BY id ASC LIMIT ' . ($propiedadData['fotos']) . '');
    if (count($fotosData) > 0) {
        foreach ($fotosData as $foto) {
    ?>
            <a href="/upload/propiedades/<?php echo (strftime("%Y", strtotime(($propiedadData['fr'])))); ?>/<?php echo (strftime("%m", strtotime(($propiedadData['fr'])))); ?>/<?php echo ($foto['nombre']) ?>.jpg" data-background-image="/upload/propiedades/<?php echo (strftime("%Y", strtotime(($propiedadData['fr'])))); ?>/<?php echo (strftime("%m", strtotime(($propiedadData['fr'])))); ?>/<?php echo ($foto['nombre']) ?>.jpg" class="item mfp-gallery"></a>
        <?php
        }
    } else {
        ?>
        <a href="/upload/propiedades/<?php echo (strftime("%Y", strtotime(($propiedadData['fr'])))); ?>/<?php echo (strftime("%m", strtotime(($propiedadData['fr'])))); ?>/<?php echo ($$propiedadData['foto']) ?>.jpg" data-background-image="/upload/propiedades/<?php echo (strftime("%Y", strtotime(($propiedadData['fr'])))); ?>/<?php echo (strftime("%m", strtotime(($propiedadData['fr'])))); ?>/<?php echo ($propiedadData['foto']) ?>.jpg" class="item mfp-gallery"></a>
    <?php
    }
    ?>

</div>


<div class="container">
    <div class="row">

        <div class="col-sm-12">
            <?php
            //MENSAJES DE ESTATUS
            if (isset($_REQUEST['msg'])) {
                require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/msg.php");
            } else
            ?>
        </div>

        <!-- Property Description -->
        <div class="col-lg-8 col-md-7">
            <div class="property-description">




                <!-- Descripción -->
                <h2 class="desc-headline">Description</h2>
                <div class="show-more">
                    <p><?php echo (str_replace("\n", "<br>", ($propiedadData['descripcion']))); ?></p>

                    <a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
                </div>



                <!-- Habitaciones -->
                <h3 class="desc-headline mt-50">Rooms (<?php echo ($propiedadData['habitaciones']); ?>)</h3>
                <ul class="margin-top-0">
                    <?php $habData = $db->getAllRecords('habitaciones', '*', 'AND propiedad=' . ($propiedadData['id']) . '', 'ORDER BY id ASC LIMIT ' . ($propiedadData['habitaciones']) . '');
                    if (count($habData) > 0) {
                        foreach ($habData as $habitacion) {
                    ?>
                            <li><b><?php echo ($habitacion['nombre']); ?></b>: <span><?php echo ($habitacion['descripcion']); ?></span></li>

                    <?php
                        }
                    }
                    ?>
                </ul>


                <!-- Carácteristicas -->
                <h3 class="desc-headline mt-50">Features</h3>
                <ul class="property-features checkboxes margin-top-0">

                    <?php $caracData = $db->getAllRecords('caracteristicasencasa', '*', 'AND propiedad=' . ($propiedadData['id']) . '', 'ORDER BY id ASC LIMIT ' . ($propiedadData['caracteristicas']) . '');
                    if (count($caracData) > 0) {
                        foreach ($caracData as $caracteristica) {
                            $caracSel = $db->getAllRecords('caracteristicas', '*', 'AND id=' . ($caracteristica['caracteristica']) . '', 'LIMIT 1');
                            $caracSel = $caracSel[0];
                    ?>
                            <li><?php echo ($caracSel['nombre']); ?></li>

                    <?php
                        }
                    }
                    ?>
                </ul>


                <?php if (!empty($propiedadData['video'])) { ?>
                    <!-- Video -->
                    <h3 class="desc-headline no-border mt-50">Video</h3>
                    <div class="responsive-iframe">
                        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php echo ($propiedadData['video']); ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                <?php
                } ?>



            </div>
        </div>
        <!-- Property Description / End -->


        <!-- Sidebar -->
        <div class="col-lg-4 col-md-5">
            <div class="sidebar sticky right">

                <?php if (!empty(($propiedadData['lat']) and ($propiedadData['lon']))) { ?>
                    <div class="widget">
                        <!-- Location -->
                        <h3 class="desc-headline no-border" id="location">Location</h3>
                        <div id="propertyMap-container">
                            <div id="propertyMap" data-latitude="<?php echo ($propiedadData['lat']); ?>" data-longitude="<?php echo ($propiedadData['lon']); ?>"></div>
                            <a href="#" id="streetView">Street View</a>
                        </div>
                    </div>
                <?php
                } ?>


                <!-- Widget -->
                <div class="widget">

                    <!-- Agent Widget -->
                    <div class="agent-widget">
                        <div class="agent-title">
                            <div class="agent-photo"><img src="/upload/user/<?php echo ($agente['foto']); ?>.jpg" alt="" /></div>
                            <div class="agent-details">
                                <h4><a href="#"><?php echo ($agente['nombre']); ?></a></h4>
                                <span><i class="sl sl-icon-call-in"></i><?php echo ($agente['telefono']); ?></span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <form method="post" action="/php/propmail.php">
                            <input name="prop" type="hidden" value="<?php echo ($propiedadData['nombre']); ?>">
                            <input name="propid" type="hidden" value="<?php echo ($propiedadData['id']); ?>">
                            <input name="nombre" type="text" placeholder="Your Name">
                            <input name="email" type="text" placeholder="Your Email">
                            <input name="tel" type="text" placeholder="Your Phone">
                            <textarea name="mensaje">I'm interested in this property [<?php echo ($propiedadData['nombre']); ?>] and I'd like to know more details.</textarea>
                            <button name="submit" value="submit" class="button fullwidth margin-top-5">Send Message</button>
                        </form>
                    </div>
                    <!-- Agent Widget / End -->
                </div>

            </div>
        </div>
        <!-- Sidebar / End -->

    </div>
</div>