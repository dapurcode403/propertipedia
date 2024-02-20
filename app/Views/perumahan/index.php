<div class="col">
    <div class="card shadow bg-white rounded">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-4">
                    Master Perumahan
                </div>
                <div class="col-auto"><button class="btn btn-sm btn-primary btn-add-per">Tambah</button></div>
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
        url: "<?= base_url(); ?>prmh/data",
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
$('.btn-add-per').click(function(e) {
    e.preventDefault();
    $.ajax({
        url: "<?= base_url(); ?>prmh/add",
        dataType: "json",
        beforeSend: function() {
            $('.btn-add-per').attr('disabled', 'disabled');
            $('.btn-add-per').html(
                '<div class="text-center"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</div>'
            );
        },
        complete: function() {
            $('.btn-add-per').removeAttr('disabled');
            $('.btn-add-per').html('Tambah');
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