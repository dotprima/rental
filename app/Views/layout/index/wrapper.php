<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard PRO - Premium Bootstrap 4 Admin Template</title>
    <!-- Favicon -->
    <link rel="icon" href="./assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="./assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body>
    <!-- Navabr -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="./pages/dashboards/dashboard.html">
                <img src="./assets/img/brand/white.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./pages/dashboards/dashboard.html">
                                <img src="./assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="/admin/" class="nav-link">
                            <span class="nav-link-inner--text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./pages/examples/pricing.html" class="nav-link">
                            <span class="nav-link-inner--text">Pricing</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./pages/examples/login.html" class="nav-link">
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./pages/examples/register.html" class="nav-link">
                            <span class="nav-link-inner--text">Register</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./pages/examples/lock.html" class="nav-link">
                            <span class="nav-link-inner--text">Lock</span>
                        </a>
                    </li>
                </ul>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <?php if(!logged_in()):?>
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="login" class="btn btn-warning btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-user mr-2"></i>
                            </span>
                            <span class="nav-link-inner--text">Login Now </span>
                        </a>
                    </li>
                    <?php else:?>
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="/logout" class="btn btn-danger btn-lg">
                            <span class="btn-inner--icon">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                            </span>
                            <span class="nav-link-inner--text danger">Logout</span>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="/dashboard" class="btn btn-warning btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-users-cog mr-2"></i>
                            </span>
                            <span class="nav-link-inner--text">Dashboard</span>
                        </a>
                    </li>
                    <?php endif ?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <?= $this->include('layout/footer/footer') ?>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="./assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <!-- Argon JS -->
    <script src="./assets/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="./assets/js/demo.min.js"></script>
</body>

</html>