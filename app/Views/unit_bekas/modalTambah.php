<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Data Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('unt_scnd/saveAktivitas', ['class' => 'form']); ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control float-right tanggal" id="tglAktivitas2"
                                name="tglAktivitas2" disabled>
                            <input type="hidden" class="form-control float-right tanggal" id="tglAktivitas"
                                name="tglAktivitas">
                            <div id="errortglFollowup" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="aktivitas" class="col-sm-3 col-form-label">Picture</label>
                    <div class="col-sm-8">
                        <style>
                        .my_camera,
                        .my_camera video {
                            display: inline-block;
                            width: 100% !important;
                            margin: auto;
                            height: auto !important;
                            border-radius: 15px;
                        }
                        </style>
                        <div class="my_camera"></div>
                        <button type="button" class="btn btn-success btn-block btn-flat" onclick="take_picture();"><i
                                class="fas fa-camera-retro">
                                Take
                                Foto</i></button>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="aktivitas" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8" id="result">

                    </div>
                    <input type="hidden" name="imagecam" id="imagecam" class="image-tag">
                </div>
                <div id="map_location"></div>
                <div id="lat"></div>
                <div id="long"></div>

                <div class="form-group row">
                    <label for="aktivitas" class="col-sm-3 col-form-label">Aktivitas</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required
                            oninvalid="this.setCustomValidity('Keterangan tidak boleh kosong');"
                            onchange="try{setCustomValidity('')}catch(e){};"
                            x-moz-errormessage="Keterangan tidak boleh kosong"></textarea>
                        <div id="errorketerangan" class="invalid-feedback">
                        </div>
                    </div>
                </div>



                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btnSimpan">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

                <?= form_close(); ?>
                <!-- </form> -->

            </div>
        </div>
    </div>
</div>
<script>
Webcam.set({
    width: 240,
    height: 320,
    dest_width: 240,
    dest_height: 320,
    image_format: 'jpeg',
    jpeg_quality: 90,
});
Webcam.attach('.my_camera');

function take_picture() {
    Webcam.snap(function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('result').innerHTML = '<img width=80 height=80 src="' + data_uri + '"/>';
    })
}
</script>

<script>
$(document).ready(function() {
    findMyCoordinates();

    $(function() {
        $('.tanggal').daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            readOnly: true,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
    });
});
</script>

<script>
$(document).ready(function() {
    $('.form').submit(function(e) {
        e.preventDefault();

        let form = $('.form')[0];
        let data = new FormData(form);

        if ($('#imagecam').val() === '') {
            Swal.fire({
                title: "Kamu belum foto aktivitas",
                text: "Foto dulu ya... 😉",
            });
        } else {
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                // data: $(this).serialize(),
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btnSimpan').attr('disabled', 'disabled');
                    $('.btnSimpan').html('<i class="fa fa-spin fa-spinner"></i> simpan...');
                },
                complete: function() {
                    $('.btnSimpan').removeAttr('disabled');
                    $('.btnSimpan').html('Simpan');
                },
                success: function(response) {
                    $('#modalTambah').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    loadDataAktivitas();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        }


    });
});
</script>

<script>
function findMyCoordinates() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                console.log(position.coords.latitude, position.coords.longitude);
                $('#map_location').html('<iframe width="100%" height="200" src="https://maps.google.com/maps?q=' +
                    position.coords.latitude + ',' + position.coords.longitude + '&output=embed"></iframe>');

                $('#lat').html('<label>Lat :' + position.coords.latitude + '</label>');
                $('#long').html('<label>Long :' + position.coords.longitude + '</label>');
            },
            (error) => {
                alert(error.message);
            }
        );
    } else {
        alert('Geolocation is not available');
    }
}
</script>