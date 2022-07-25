<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/database_conf/sesion.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Denver');
$fecha = date("Y-m-d H:i:s");

setlocale(LC_ALL, 'es_MX');
$mesr = strftime("%m");
$anor = strftime("%Y");

//GENERAR CODIGO ALEATORIO
function GeraHash($qtd)
{
    $Caracteres = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;

    $Hash = NULL;
    for ($x = 1; $x <= $qtd; $x++) {
        $Posicao = rand(0, $QuantidadeCaracteres);
        $Hash .= substr($Caracteres, $Posicao, 1);
    }

    return $Hash;
}


$numCarac = '';

if (isset($_REQUEST['caracteristicas'])) {

    $numCarac = count($_REQUEST['caracteristicas']);
}

if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);
    if (($nombre == "") & ($descripcion == "") & (($_FILES['thumb']['tmp_name']) == "")) {
        header('location:?msg=basic');
        exit;
    } else
    if ($nombre == "") {
        header('location:?msg=nombre');
        exit;
    } else if ($descripcion == "") {
        header('location:?msg=desc');
        exit;
    } else if (($_FILES['thumb']['tmp_name']) == "") {
        header('location:?msg=foto');
        exit;
    } else {


        if (!empty($_FILES['thumb']['tmp_name'])) {

            $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO

            if ($_FILES['thumb']['type'] !== 'image/jpeg') {
                header('location:?msg=fnv');
                exit;
            }

            if (($_FILES['thumb']['size']) > 1000000) {
                header('location:?msg=fnvz');
                exit;
            }

            $codigo = GeraHash(10); //LO USAMOS PARA EL NOMBRE DE LA FOTO

            $ruta = '../../upload/propiedades/' . $anor . '/' . $mesr . '';


            //SI LA CARPETA NO EXISTE LA CREAMOS
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
            $archivo_subido = '' . $ruta . '/' . $codigo . '.jpg';
            move_uploaded_file($thumb, $archivo_subido);
        }



        $casasCount    =    $db->getQueryCount('propiedades', 'id');
        if ($casasCount[0]['total'] < 1000) {
            $data    =    array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'foto' => $codigo,
                'estatus' => 1,
                'usuario' => ($UserData['id']),
                'fr' => $fecha,
                'caracteristicas' => $numCarac,
                'ubicacion' => $ubicacion,
                'area' => $area,
                'lat' => $lat,
                'lon' => $lon,
                'video' => $video,

            );
            $insert    =    $db->insert('propiedades', $data);
            $lastId =   $pdo->lastInsertId(); //OBTENEMOS EL ID DE LA PROPIEDAD INSERTADA EN ESTE MOMENTO



            //SI HAY CARACTERISTICAS EJECUTAMOS ESTE BUCLE SEGUN EL NUMERO DE SELECCIONADOS
            if (isset($_REQUEST['caracteristicas'])) {
                if (is_array($_REQUEST['caracteristicas'])) {

                    $selected = '';
                    $conteo = 0;
                    foreach ($_REQUEST['caracteristicas'] as $check) {

                        if ($conteo < $numCarac)

                            $data    =    array(
                                'propiedad' => $lastId, //INSERTAMOS SIEMPRE EL ÚLTIMO ID DE LA CASA INSERTADA EN ESTA MISMA EJECUCIÓN
                                'caracteristica' => $check,
                            );
                        $insert    =    $db->insert('caracteristicasencasa', $data);

                        $conteo++;
                    }
                }
            }
            if ($insert) {

                //SUMAMOS +1 A LAS PROPIEDADES DE ESTE USUARIO
                $SumProp = (($UserData['propiedades']) + 1);

                $InsertData    =    array(
                    'propiedades' => $SumProp,
                );
                $update    =    $db->update('usuarios', $InsertData, array('id' => ($UserData['id']))); //SUMAMOS 1 A SU EXPERIENCIA

                header('location:/propiedades.php?msg=casok'); //exito
                exit;
            } else {
                header('location:?msg=ups'); //sin cambios
                exit;
            }
        } else {
            header('location:?msg=dsd'); //limite
            exit;
        }
    }
}
