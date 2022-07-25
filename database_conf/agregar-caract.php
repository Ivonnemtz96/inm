<?php

if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);
    if ($nombre == "") {
        header('location:?msg=all');
        exit;
    } else {

        $caractCount    =    $db->getQueryCount('caracteristicas', 'id');
        if ($caractCount[0]['total'] < 1000) {
            $data    =    array(
                'nombre' => ($nombre),

            );
            $insert = $db->insert('caracteristicas', $data);
            if ($insert) {
                header('location:/agregar-caracteristica.php?msg=carok'); //exito
                exit;
            } else {
                header('location:/agregar-caracteristica.php?msg=ups'); //sin cambios
                exit;
            }
        } else {
            header('location: /agregar-caracteristica.php?msg=dsd'); //limite
            exit;
        }
    }
}
