<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Asignatura</th>
            <th>Docente</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $key => $value) { ?>
        <tr>
            <td><?php echo strtoupper(utf8_encode($value[0])); ?></td>
            <td><?php echo strtoupper(utf8_encode($value[1] . ' ' . $value[2])); ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
