<?php $casaData = $db->getAllRecords('propiedades', '*', 'AND usuario=' . ($UserData['id']) . '', 'ORDER BY fr DESC LIMIT ' . ($UserData['propiedades']) . '');
if (count($casaData) > 0) {
    $y    =    '';
    foreach ($casaData as $casa) {
        $y++;

        //HAGO USO DE LA FUNCION PARA CALCULAR LA EDAD Y $edad SE REESCRIBE POR CADA CICLO
        $edad = diff_fecha(($casa['fr']));
        $status = "";
        if (($edad->format('%i') == 0) & ($edad->format('%H') == 0) & ($edad->format('%d') == 0) & ($edad->format('%m') == 0)) {
            $edad = "Hace {$edad->format('%s')} segundos.";
        } else
                if (($edad->format('%H') == 0) & ($edad->format('%d') == 0) & ($edad->format('%m') == 0)) {
            $edad = "Hace {$edad->format('%i')} minutos";
        } else
        if ($edad->format('%d') == 0) {
            $edad = "Hace {$edad->format('%H')} horas, {$edad->format('%i')} minutos.";
        } else
                                            if ($edad->format('%m') == 0) {
            $edad = "Hace {$edad->format('%d')} días, {$edad->format('%h')} horas.";
        }

?>

        <tr>
            <td class="title-container">
                <img src="/upload/propiedades/<?php echo (strftime("%Y", strtotime(($casa['fr'])))); ?>/<?php echo (strftime("%m", strtotime(($casa['fr'])))); ?>/<?php echo ($casa['foto']) ?>.jpg" alt="">
                <div class="title">
                    <h4 class="mt-50"><a href="#"><?php echo ($casa['nombre']) ?></a></h4>
                    <span><?php echo (substr(($casa['descripcion']), 0, 45)); ?>... </span>
                    <br>
                    <p style="margin: 0;"><b>Ubicación: </b><?php echo ($casa['ubicacion']); ?></p>
                    <p><b>Habitaciones: </b><?php echo ($casa['habitaciones']); ?></p>
                </div>

            </td>

            <td class="action">
                <a target="_blank" href="/property.php/<?php echo ($casa['id']); ?>"><i class="fa fa-globe"></i> Ver</a>
                <a href="/editar-prop.php?editId=<?php echo ($casa['id']); ?>"><i class="fa fa-pencil"></i> Editar</a>
                <a href="/borrar-prop.php?delId=<?php echo ($casa['id']); ?>" class="delete" onClick="return confirm('Estás seguro? Esto no se puede deshacer');"><i class="fa fa-remove"></i> Borrar</a>
            </td>
        </tr>

<?php
    }
}
?>