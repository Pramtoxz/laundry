<?php foreach ($temp->getResultArray() as $data) { 
     $total  = $data['hargatemp'] * $data['berattemp'];
?>
    <tr>
        <td><?= $data['kdtemp'] ?></td>
        <td><?= $data['namatemp'] ?></td>
        <td><?= $data['jenistemp'] ?></td>
        <td><?= $data['berattemp'] ?></td>
        <td><?= "Rp. " . number_format($data['hargatemp']) ?></td>
        <td><?= "Rp. " . number_format($total) ?></td>
        <td style="text-align: center;">
            <a class="btn-sm btn-danger btn-delete" data-id="<?= $data['kdtemp']; ?>"><i class=" fa fa-trash"></i></a>
        </td>
    </tr>
<?php } ?>

<script>
    $('.btn-delete').on('click', function() {
        const id = $(this).data('id');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });
</script>