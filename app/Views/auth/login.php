<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Propertipedia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>nice/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url(); ?>nice/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>nice/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>nice/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>nice/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>nice/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url(); ?>nice/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url(); ?>nice/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>nice/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>nice/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="nice/assets/img/logo.png" alt="">
                            <span class="d-none d-lg-block">PROPERTIPEDIA</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login To Your Account</h5>
                            </div>

                            <form action="<?= base_url(); ?>authlogin" method="POST" class="row g-3 needs-validation"
                                novalidate>
                                <?= csrf_field() ?>
                                <?= session()->getflashdata('msg'); ?>
                                <?= session()->getflashdata('error'); ?>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                        <div class="invalid-feedback">Please enter your email.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>

                            </form>

                        </div>
                    </div>



                </div>
            </div>
        </div>

    </section>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>nice/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>nice/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>nice/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url(); ?>nice/assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url(); ?>nice/assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url(); ?>nice/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url(); ?>nice/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url(); ?>nice/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>nice/assets/js/main.js"></script>

</body>

</html>