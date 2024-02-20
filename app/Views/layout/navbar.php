<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav text-center"><b>PROPERTIPEDIA</b></ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <button type="button" class="btn btn-sm btn-danger form-control logout">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </li>
    </ul>
</nav>

<script>
$('.logout').click(function(e) {
    e.preventDefault();
    const href = "<?= base_url(); ?>/logout";
    Swal.fire({
        title: 'Anda yakin akan LOGOUT dari Aplikasi?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout!'
    }).then((result) => {
        if (result.value) {
            window.location.href = href;
        }
    })
})
</script>