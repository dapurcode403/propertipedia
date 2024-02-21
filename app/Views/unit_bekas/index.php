<div class="col">
    <div class="card shadow bg-white rounded">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-4">
                    Unit Bekas
                </div>
                <div class="col-auto"><button class="btn btn-sm btn-primary btn-add-usr">Tambah</button></div>
            </div>
        </div>
        <div class="card-body">
            <div class="loadData"></div>
        </div>
    </div>
    <div class="viewmodal"></div>
</div>
<script>
loadData();

function loadData() {
    $.ajax({
        method: 'POST',
        url: "<?= base_url(); ?>unt_scnd/data",
        data: {
            <?= csrf_token() ?>: "<?= csrf_hash() ?>",
        },
        dataType: "json",
        beforeSend: function() {
            $('.loadData').html(
                ' <div class="text-center"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</div>'
            );
        },
        success: function(response) {
            $('.loadData').html(response.data);
        }
    });
}
</script>

<script>
$('.btn-add-usr').click(function(e) {
    e.preventDefault();
    $.ajax({
        url: "<?= base_url(); ?>unt_scnd/add",
        dataType: "json",
        beforeSend: function() {
            $('.btn-add-usr').attr('disabled', 'disabled');
            $('.btn-add-usr').html(
                '<div class="text-center"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</div>'
            );
        },
        complete: function() {
            $('.btn-add-usr').removeAttr('disabled');
            $('.btn-add-usr').html('Tambah');
        },
        success: function(response) {
            $('.viewmodal').html(response.data).show();
            $('#modalTambah').modal({
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