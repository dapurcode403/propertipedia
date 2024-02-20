<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('usr/save', ['class' => 'form']); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div id="errornama" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username" name="username">
                        <div id="errorusername" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email">
                        <div id="erroremail" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="password" name="password">
                        <div id="errorpassword" class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-sm-3 col-form-label">Level</label>
                    <div class="col-sm-8">
                        <select class="custom-select" aria-label="Default select example" name="role" id="role">
                            <option value="" style="display: none;" selected disabled>Pilih Level</option>
                            <option value="administrator">Administrator</option>
                            <option value="admin">Admin</option>
                            <option value="marketing">Marketing</option>
                            <option value="sales">Sales</option>
                        </select>
                        <div id="errorrole" class="invalid-feedback">
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

                    if (response.error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('#errornama').html(response.error.nama);
                    } else {
                        $('#nama').removeClass('is-invalid');
                        $('#errornama').html('');
                    };

                    if (response.error.username) {
                        $('#username').addClass('is-invalid');
                        $('#errorusername').html(response.error.username);
                    } else {
                        $('#username').removeClass('is-invalid');
                        $('#errorusername').html('');
                    };

                    if (response.error.email) {
                        $('#email').addClass('is-invalid');
                        $('#erroremail').html(response.error.email);
                    } else {
                        $('#email').removeClass('is-invalid');
                        $('#erroremail').html('');
                    };

                    if (response.error.password) {
                        $('#password').addClass('is-invalid');
                        $('#errorpassword').html(response.error.password);
                    } else {
                        $('#password').removeClass('is-invalid');
                        $('#errorpassword').html('');
                    };

                    if (response.error.role) {
                        $('#role').addClass('is-invalid');
                        $('#errorrole').html(response.error.role);
                    } else {
                        $('#role').removeClass('is-invalid');
                        $('#errorrole').html('');
                    };

                } else {
                    $('#modalTambah').modal('hide');
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