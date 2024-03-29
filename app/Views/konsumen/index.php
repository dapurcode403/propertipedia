<div class="col">
    <div class="card shadow bg-white rounded">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-4">
                    Master Konsumen
                </div>
                <div class="col-auto"><button class="btn btn-sm btn-primary btn-add-kons">Tambah</button></div>
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
            url: "<?= base_url(); ?>kons/data",
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
    $('.btn-add-kons').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url(); ?>kons/add",
            dataType: "json",
            beforeSend: function() {
                $('.btn-add-kons').attr('disabled', 'disabled');
                $('.btn-add-kons').html(
                    '<div class="text-center"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</div>'
                );
            },
            complete: function() {
                $('.btn-add-kons').removeAttr('disabled');
                $('.btn-add-kons').html('<ion-icon name="add-outline"></ion-icon> Tambah');
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