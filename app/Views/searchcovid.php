<?php

function waktu($lastUpdate){
    date_default_timezone_set('Asia/Jakarta');
    $fixed = date('D d M Y', strtotime($lastUpdate));
    return $fixed;
}

function getdata($data){
    $data = file_get_contents($data);
    $data = json_decode($data ,true);
    return $data;
}

function getpersen($data1,$data2){
    return ($data1/$data2)*100;
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Covid 19 Realtime - <?=$negara?></title>

    <!-- Favicon -->
    <link rel="icon" href="https://primanugraha.tech/public/favicon.ico" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/nucleo/css/nucleo.css"
        type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css" type="text/css">

    <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/argon.min.css?v=1.2.0"
        type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

    <div class="main-content" id="panel">

        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <div class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" id="name" placeholder="Cara Negara" class="form-control" />
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <!-- Header -->

        <div class="header bg-primary pb-6">

            <div class="container-fluid">
                <div class="header-body">

                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">

                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboards</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/covid">Covid</a></li>
                                    <li class="breadcrumb-item active"><a href="<?=base_url()?>"><?=$negara?></a></li>
                                </ol>

                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="https://github.com/mathdroid/covid-19-api" class="btn btn-sm btn-neutral">Thanks To
                                MathDroid</a>
                        </div>
                    </div>
                    <!-- Card stats -->
                    <div class="row" id="row"></div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">

                                            <span class="card-title text-uppercase text-muted mb-0">World
                                                Data</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="fas fa-globe-americas"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">

                                        <span class="text-success mr-2">Last Update</span>
                                        <span class=""><?=waktu($world['lastUpdate'])?></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">RECOVERED</h5>
                                            <span
                                                class="h2 font-weight-bold mb-0"><?=number_format($world['recovered']["value"])?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="fas fa-heartbeat"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">CONFIRMED</h5>
                                            <span
                                                class="h2 font-weight-bold mb-0"><?=number_format($world['confirmed']["value"])?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fas fa-head-side-virus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">DEATH</h5>
                                            <span
                                                class="h2 font-weight-bold mb-0"><?=number_format($world['deaths']["value"])?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                                <i class="fas fa-skull-crossbones"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card bg-gradient-danger">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white"><?=$negara?>
                                            data
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0 text-white"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div>
                                            <img src="<?=$logo?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2">Last Update</span>
                                    <span class="text-nowrap text-light"><?=waktu($world['lastUpdate'])?></span>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive ">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">In the world</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            Confirmed
                                        </th>
                                        <td>
                                            <?=number_format($response["confirmed"]["value"])?>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="mr-2"><?=round(getpersen($response["confirmed"]["value"],$world['confirmed']["value"]),2)?>%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: <?=round(getpersen($response["confirmed"]["value"],$world['confirmed']["value"]),2)?>%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Recovered
                                        </th>
                                        <td>
                                            <?=number_format($response["recovered"]["value"])?>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="mr-2"><?=round(getpersen($response["recovered"]["value"],$world['recovered']["value"]),2)?>%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success" role="progressbar"
                                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: <?=round(getpersen($response["recovered"]["value"],$world['recovered']["value"]),2)?>%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Death
                                        </th>
                                        <td>
                                            <?=number_format($response["recovered"]["value"])?>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="mr-2"><?=round(getpersen($response["recovered"]["value"],$world['deaths']["value"]),2)?>%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: <?=round(getpersen($response["recovered"]["value"],$world['deaths']["value"]),2)?>%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2021 <a href="https://www.primanugraha.tech" class="font-weight-bold ml-1"
                                target="_blank">Prima Nugraha</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.primanugraha.tech" class="nav-link" target="_blank">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.primanugraha.tech/about" class="nav-link" target="_blank">About
                                    Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
    var found = 0;
    $(document).ready(function() {
        $.ajaxSetup({
            cache: false
        });
        $('#name').keyup(function() {
            $('#row').html('');
            $('#state').val('');
            var searchField = $('#name').val();
            var expression = new RegExp(searchField, "i");

            $.getJSON('<?=base_url()?>/data.json', function(data) {
                $.each(data, function(key, value) {

                    if (value.name.search(expression) != -1) {
                        found = found + 1;
                        if (found <= 8) {
                            $('#row').append(`
                            <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                
                                    <li class="list-group-item link-class">
                                <img src="https://www.countryflags.io/` + value.iso2 + `/flat/64.png" height="40" width="40" class="img-thumbnail" /> 
                                <span class="nama"><a href="<?=base_url()?>/covid/search/` + value.iso2 + `">` + value
                                .name + `</a></span>
                                </li>
                                
                            </div>
                        </div>`);
                        }
                    }
                });
                found = 0;
            });

        });

        $('#row').on('click', 'li', function() {
            let name = $(this).children('.nama').text();
            $('#name').val(name);
            $("#row").html('');
        });


    });
    </script>
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
    <!-- Argon JS -->
    <script src="../../assets/js/argon.min.js?v=1.2.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="../../assets/js/demo.min.js"></script>

</body>

</html>