<?php $caracData = $db->getAllRecords('caracteristicas', '*', 'ORDER BY nombre ASC');
if (count($caracData) > 0) {
    $y = '';
    foreach ($caracData as $caracteristica) {
        $y++;
?>
        <tr>
            <td class="title-container">
                <div>
                    <h4 style="padding-left: 20px;"><?php echo ($caracteristica['nombre']); ?></h4>
                    <br>
                </div>
            </td>
            <td class="action">
                <a href="/agregar-caracteristica?editId=<?php echo ($caracteristica['id']); ?>"><i class="fa fa-pencil"></i> Editar</a>
                <a href="/agregar-caracteristica?delId=<?php echo ($caracteristica['id']); ?>" class="delete" onClick="return confirm('Estás seguro? Esto no se puede deshacer');"><i class="fa fa-remove"></i> Borrar</a>
            </td>
        </tr>

<?php
    }
}
?>
