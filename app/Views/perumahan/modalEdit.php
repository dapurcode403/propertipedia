<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('prmh/saveEdit', ['class' => 'form']); ?>
            <div class="modal-body">

                <input type='hidden' class='form-control' id='id' name='id' value="<?= $per['id']; ?>">

                <div class="form-group row">
                    <label for="id_dev" class="col-sm-3 col-form-label">Developer</label>
                    <div class="col-sm-8">
                        <select class="custom-select" aria-label="Default select example" name="id_dev" id="id_dev">

                            <?php foreach ($developer as $dev) : ?>
                            <option value="<?= $dev['id']; ?>" <?= ($dev['id'] == $per['id_dev']) ? 'selected' : ''; ?>>
                                <?= strtoupper($dev['nama_dev']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_per" class="col-sm-3 col-form-label">Nama Perumahan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_per" name="nama_per"
                            value="<?= $per['nama']; ?>">
                        <div id="errornama_per" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="<?= $per['alamat']; ?>">
                        <div id="erroralamat" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="notlp" class="col-sm-3 col-form-label">No Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="notlp" name="notlp" value="<?= $per['no_telp']; ?>">
                        <div id="errornotlp" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lat" class="col-sm-3 col-form-label">Latitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lat" name="lat" value="<?= $per['latitude']; ?>">
                        <div id="errorlat" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="long" class="col-sm-3 col-form-label">Longitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="long" name="long" value="<?= $per['longitude']; ?>">
                        <div id="errorlong" class="invalid-feedback">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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

                    if (response.error.nama_per) {
                        $('#nama_per').addClass('is-invalid');
                        $('#errornama_per').html(response.error.nama_per);
                    } else {
                        $('#nama_per').removeClass('is-invalid');
                        $('#errornama_per').html('');
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

                    if (response.error.lat) {
                        $('#lat').addClass('is-invalid');
                        $('#errorlat').html(response.error.lat);
                    } else {
                        $('#lat').removeClass('is-invalid');
                        $('#errorlat').html('');
                    };

                    if (response.error.long) {
                        $('#long').addClass('is-invalid');
                        $('#errorlong').html(response.error.long);
                    } else {
                        $('#long').removeClass('is-invalid');
                        $('#errorlong').html('');
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