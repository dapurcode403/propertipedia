<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Propertipedia</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>lte/dist/css/adminlte.min.css">
    <!-- Icon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>img/logo.png">
    <!-- jQuery -->
    <script src="<?= base_url(); ?>lte/plugins/jquery/jquery.min.js"></script>
    <!-- myscript -->
    <script src="<?= base_url(); ?>lte/dist/js/myscript.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>lte/plugins/toastr/toastr.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>lte/plugins/daterangepicker/daterangepicker.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <!-- maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Untuk section custom -->
    <?= $this->renderSection('style'); ?>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>lte/dist/img/AdminLTELogo.png" alt="Logo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <?= $this->include('layout/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <img src="<?= base_url(); ?>lte/dist/img/avatar.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info text-wrap">
                        <a href="<?= base_url(); ?>profile" class="d-block"><?= session('name'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?= $this->include('layout/sidebar') ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title; ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <?= $this->renderSection('content'); ?>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <?= $this->include('layout/footer') ?>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url(); ?>lte/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- date-range-picker -->
    <script src="<?= base_url(); ?>lte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url(); ?>lte/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- chartjs -->
    <script src="<?= base_url(); ?>lte/plugins/chart.js/Chart.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url(); ?>lte/plugins/toastr/toastr.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url(); ?>lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>lte/dist/js/adminlte.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



    <!-- webcam -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"
        integrity="sha512-AQMSn1qO6KN85GOfvH6BWJk46LhlvepblftLHzAv1cdIyTWPBKHX+r+NOXVVw6+XQpeW4LJk/GTmoP48FLvblQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Untuk section custom -->
    <?= $this->renderSection('script'); ?>


</body>

</html>