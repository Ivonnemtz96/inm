<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-plus-circle"></i> Agregar característica</h2>
            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <div class="row">
        <!-- Submit Page -->
        <!-- Widget -->
        <?php
        include("admin/sideNav.php");
        ?>
        <div class="col-md-8">
            <form method="post" enctype="multipart/form-data">
                <div class="col-md-8 my-profile">
                    <h4 class="margin-top-0 margin-bottom-30">Agrega una nueva características.</h4>
                    <label>Nombre</label>
                    <input name="nombre" type="text">
                    <button type="submit" name="submit" value="submit" class="button margin-top-20 margin-bottom-20">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</div>