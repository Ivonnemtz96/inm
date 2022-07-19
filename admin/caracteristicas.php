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
        include("admin/sideNav.php");
        ?>

        <div class="col-md-8">
            <table class="manage-table responsive-table">

                <tr>
                    <th><i class="fa fa-file-text"></i> Property</th>
                    <th class="expire-date"><i class="fa fa-calendar"></i> Expiration Date</th>
                    <th></th>
                </tr>

                <!-- Item #1 -->
                <tr>
                    <td class="title-container">
                        <div class="title">
                            <h4><a href="#">Serene Uptown</a></h4>
                        </div>
                    </td>
                    <td class="action">
                        <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
                    </td>
                </tr>

                <!-- Item #2 -->
                <tr>
                    <td class="title-container">
                        <div class="title">
                            <h4><a href="#">Oak Tree Villas</a></h4>
                        </div>
                    </td>
                    <td class="action">
                        <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
                    </td>
                </tr>
            </table>
            <a href="submit-property.html" class="margin-top-40 button">Submit New Property</a>
        </div>

    </div>
</div>