<!-- Table with stripped rows -->
<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Telepon</th>
            <th class="text-center">Map</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($perumahan as $key => $value) : ?>
        <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $value['nama']; ?></td>
            <td><?= $value['alamat']; ?></td>
            <td><?= $value['no_telp']; ?></td>
            <td class="text-center"><?= $value['latitude'] . ' , ' . $value['longitude']; ?></td>
            <td style="width: 15%;" class="text-center">
                <button class="btn btn-sm btn-success btn-edit" data-id="<?= $value['id']; ?>"
                    id="btn-edit<?= $value['id']; ?>">Edit</button> | <button class="btn btn-sm btn-danger btn-delete"
                    data-id="<?= $value['id']; ?>" id="btn-delete<?= $value['id']; ?>">Delete</button>


            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<script>
$('.btn-edit').click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    $.ajax({
        url: "<?= base_url(); ?>prmh/edit/" + id,
        dataType: "json",
        beforeSend: function() {
            $('#btn-edit' + id).attr('disabled', 'disabled');
            $('#btn-edit' + id).html(
                '<div class="spinner-border spinner-border-sm"></div> wait...');
        },
        complete: function() {
            $('#btn-edit' + id).removeAttr('disabled');
            $('#btn-edit' + id).html('Edit');
        },
        success: function(response) {
            $('.viewmodal').html(response.data).show();
            const myModal = new bootstrap.Modal('#modalEdit');
            myModal.show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
});
</script>

<script>
$('.btn-delete').click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    const href = "<?= base_url(); ?>prmh/del/" + id;
    Swal.fire({
        title: 'Anda yakin akan Hapus data ini?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#btn-delete' + id).attr('disabled', 'disabled');
                    $('#btn-delete' + id).html(
                        '<div class="spinner-border spinner-border-sm"></div> wait...');
                },
                complete: function() {
                    $('#btn-delete' + id).removeAttr('disabled');
                    $('#btn-delete' + id).html('Delete');
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Hapus',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    loadData();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })
})
</script>