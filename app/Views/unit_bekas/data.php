 <!-- Table with stripped rows -->
 <table class="table table-bordered table-sm table-responsive-md">
     <thead>
         <tr>
             <th>#</th>
             <th>Foto</th>
             <th>Nama Kontak</th>
             <th>No WA</th>
             <th>Alamat</th>
             <th>Koordinat</th>
             <th>Insert By</th>
             <th>Status</th>
             <th class="text-center">Aksi</th>
         </tr>
     </thead>
     <tbody>
         <?php $no = 1;
            foreach ($un_b as $key => $value) : ?>
         <tr>
             <th scope="row"><?= $no++; ?></th>
             <td>
                 <a href="" class="foto_unit" data-gambar="<?= ($value['foto'] == '') ? '' : $value['foto'] ?>">
                     <?= fotoSmall($value['foto']); ?>
                 </a>
             </td>
             <td><?= $value['nama_kontak']; ?></td>
             <td><?= $value['no_wa']; ?></td>
             <td><?= $value['alamat']; ?></td>
             <td><?= $value['latitude'] . ' - ' . $value['longitude']; ?></td>
             <td><?= getUserName($value['ins_by']); ?></td>
             <td><?= $value['status']; ?></td>
             <td class="text-center">
                 <!-- <button class="btn btn-sm btn-success btn-edit" data-id="<?= $value['id']; ?>"
                     id="btn-edit<?= $value['id']; ?>">Edit</button> | <button class="btn btn-sm btn-danger btn-delete"
                     data-id="<?= $value['id']; ?>" id="btn-delete<?= $value['id']; ?>">Delete</button> -->
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
        url: "<?= base_url(); ?>unt_scnd/edit/" + id,
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
            $('#modalEdit').modal({
                backdrop: 'static',
                keyboard: true,
                show: true
            });
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
    const href = "<?= base_url(); ?>unt_scnd/del/" + id;
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

 <script>
$('.foto_unit').click(function(e) {
    e.preventDefault();
    const gambar = $(this).data('gambar');
    // alert(gambar);
    $.ajax({
        type: "post",
        url: "<?= base_url(); ?>unt_scnd/fotoUnit",
        data: {
            <?= csrf_token() ?>: "<?= csrf_hash() ?>",
            gambar: gambar,
        },
        dataType: "json",
        success: function(response) {
            $('.viewmodal').html(response.data).show();
            $('#modalfoto').modal({
                backdrop: 'static',
                keyboard: true,
                show: true
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
});
 </script>