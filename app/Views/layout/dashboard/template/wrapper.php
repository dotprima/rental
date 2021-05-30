<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title><?=$title?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://primanugraha.tech/public/favicon.ico">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->

    <link rel="stylesheet" href="../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../../assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    <?= $this->include('layout/dashboard/template/navbar') ?>

    <!-- Main content -->

    <?= $this->include('layout/dashboard/template/main_content') ?>

    <!-- Page content -->
    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <?= $this->include('layout/footer/footer') ?>

    </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="../../assets/vendor/select2/dist/js/select2.min.js"></script>
    <script src="../../assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="../../assets/vendor/quill/dist/quill.min.js"></script>
    <script src="../../assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script src="../../assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Argon JS -->
    <script src="../../assets/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="../../assets/js/demo.min.js"></script>
    <?= $this->renderSection('js') ?>

</body>


</html>