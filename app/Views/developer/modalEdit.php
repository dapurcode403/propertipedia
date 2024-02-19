<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('dev/saveEdit', ['class' => 'form']); ?>
            <div class="modal-body">

                <input type='hidden' class='form-control' id='id' name='id' value="<?= $dev['id']; ?>">

                <div class="row mb-3">
                    <label for="nama_dev" class="col-sm-3 col-form-label">Nama Developer</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_dev" name="nama_dev" value="<?= $dev['nama_dev']; ?>">
                        <div id="errornama_dev" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dev['alamat_dev']; ?>">
                        <div id="erroralamat" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="notlp" class="col-sm-3 col-form-label">No Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="notlp" name="notlp" value="<?= $dev['no_telp_dev']; ?>">
                        <div id="errornotlp" class="invalid-feedback">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btnSimpan">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnSimpan').attr('disabled', 'disabled');
                    $('.btnSimpan').html('<div class="spinner-border"></div> simpan...');
                },
                complete: function() {
                    $('.btnSimpan').removeAttr('disabled');
                    $('.btnSimpan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.error.nama_dev) {
                            $('#nama_dev').addClass('is-invalid');
                            $('#errornama_dev').html(response.error.nama_dev);
                        } else {
                            $('#nama_dev').removeClass('is-invalid');
                            $('#errornama_dev').html('');
                        };

                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('#erroralamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('#erroralamat').html('');
                        };

                        if (response.error.notlp) {
                            $('#notlp').addClass('is-invalid');
                            $('#errornotlp').html(response.error.notlp);
                        } else {
                            $('#notlp').removeClass('is-invalid');
                            $('#errornotlp').html('');
                        };

                    } else {
                        $('#modalEdit').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: response.success,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        loadData();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>