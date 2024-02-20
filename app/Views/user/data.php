 <!-- Table with stripped rows -->
 <table class="table table-bordered table-sm table-responsive-md">
     <thead>
         <tr>
             <th>#</th>
             <th>Nama</th>
             <th>Level</th>
             <th>Username</th>
             <th>Email</th>
             <th>Password</th>
             <th class="text-center">Aksi</th>
         </tr>
     </thead>
     <tbody>
         <?php $no = 1;
            foreach ($User as $key => $value) : ?>
         <tr>
             <th scope="row"><?= $no++; ?></th>
             <td><?= $value['name']; ?></td>
             <td><?= $value['role']; ?></td>
             <td><?= $value['username']; ?></td>
             <td><?= $value['email']; ?></td>
             <td><?= $value['password']; ?></td>
             <td class="text-center">
                 <button class="btn btn-sm btn-success btn-edit" data-id="<?= $value['id']; ?>"
                     id="btn-edit<?= $value['id']; ?>">Edit</button> | <button class="btn btn-sm btn-danger btn-delete"
                     data-id="<?= $value['id']; ?>" id="btn-delete<?= $value['id']; ?>">Delete</button> | <button
                     class="btn btn-sm btn-info btn-reset" data-id="<?= $value['id']; ?>"
                     id="btn-reset<?= $value['id']; ?>">Reset Pwd</button>
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
        url: "<?= base_url(); ?>usr/edit/" + id,
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
    const href = "<?= base_url(); ?>usr/del/" + id;
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
$('.btn-reset').click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');

    Swal.fire({
        title: "Reset Password",
        input: "text",
        inputAttributes: {
            autocapitalize: "off"
        },
        showCancelButton: true,
        confirmButtonText: "Reset",
        showLoaderOnConfirm: true,
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: "<?= base_url(); ?>usr/reset/" + id + "/" + result.value,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Reset',
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
    });
})
 </script>