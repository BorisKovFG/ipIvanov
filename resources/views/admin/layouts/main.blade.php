<!doctype html>
<html lang="en">

<head>
    <title>Dashboard IP Ivanov</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/metisMenu/metisMenu.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
            </div>
            <!-- logo -->
            <div class="navbar-brand">
                <a href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt="DiffDash Logo"
                                          class="img-responsive logo"></a>
            </div>
            <!-- end logo -->
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="left-sidebar" class="sidebar">
        <button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
            <span class="sr-only">Toggle Fullwidth</span>
            <i class="fa fa-angle-left"></i>
        </button>
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="{{ asset('assets/img/user.png') }}" class="img-responsive img-circle user-photo"
                     alt="User Profile Picture">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong>Austin
                            Hoffman</strong> <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">Messages</a></li>
                        <li><a href="#">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="active"><a href="{{ route('admin.main.index') }}"><i class="lnr lnr-home"></i>
                            <span>Main</span></a></li>
                    <li class="active"><a href="{{ route('admin.users.index') }}"><i class="lnr lnr-users"></i>
                            <span>Users</span></a></li>
                    <li class="active"><a href="{{ route('admin.clients.index') }}"><i class="lnr lnr-layers"></i> <span>Clients</span></a>
                    </li>
                    <li class="active"><a href="{{ route('admin.fertilizers.index') }}"><i class="lnr lnr-poop"></i>
                            <span>Fertilizers</span></a></li>

                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN CONTENT -->
    <div id="main-content">
        <div class="container-fluid">
            <!-- WEBSITE ANALYTICS -->
            @yield('content')
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    <div class="clearfix"></div>
    <footer>
        <p class="copyright">&copy; 2022 <a href="https://ipivanov.test" target="_blank">IP Ivanov </a>The best poop
            quality</p>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/metisMenu/metisMenu.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chartist-plugin-legend-latest/chartist-plugin-legend.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>
<script src="{{ asset('assets/scripts/common.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    $(function () {

        // Date picker
        $('.inline-datepicker').datepicker({
            format: 'YYYY-MM-DD',
        });

        // sparkline charts
        var sparklineNumberChart = function () {

            var params = {
                width: '140px',
                height: '30px',
                lineWidth: '2',
                lineColor: '#20B2AA',
                fillColor: false,
                spotRadius: '2',
                spotColor: false,
                minSpotColor: false,
                maxSpotColor: false,
                disableInteraction: false
            };

            $('#number-chart1').sparkline('html', params);
            $('#number-chart2').sparkline('html', params);
            $('#number-chart3').sparkline('html', params);
            $('#number-chart4').sparkline('html', params);
        };

        sparklineNumberChart();


        // traffic sources
        var dataPie = {
            series: [45, 25, 30]
        };

        var labels = ['Direct', 'Organic', 'Referral'];
        var sum = function (a, b) {
            return a + b;
        };

        new Chartist.Pie('#demo-pie-chart', dataPie, {
            height: "270px",
            labelInterpolationFnc: function (value, idx) {
                var percentage = Math.round(value / dataPie.series.reduce(sum) * 100) + '%';
                return labels[idx] + ' (' + percentage + ')';
            }
        });


        // progress bars
        $('.progress .progress-bar').progressbar({
            display_text: 'none'
        });

        // line chart
        var data = {
            labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            series: [
                [200, 380, 350, 480, 410, 450, 550],
            ]
        };

        var options = {
            height: "200px",
            showPoint: true,
            showArea: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
            chartPadding: {
                top: 0,
                right: 0,
                bottom: 30,
                left: 30
            },
            plugins: [
                Chartist.plugins.tooltip({
                    appendToBody: true
                }),
                Chartist.plugins.ctAxisTitle({
                    axisX: {
                        axisTitle: 'Day',
                        axisClass: 'ct-axis-title',
                        offset: {
                            x: 0,
                            y: 50
                        },
                        textAnchor: 'middle'
                    },
                    axisY: {
                        axisTitle: 'Reach',
                        axisClass: 'ct-axis-title',
                        offset: {
                            x: 0,
                            y: -10
                        },
                    }
                })
            ]
        };

        new Chartist.Line('#demo-line-chart', data, options);


        // sales performance chart
        var sparklineSalesPerformance = function () {

            var lastWeekData = [142, 164, 298, 384, 232, 269, 211];
            var currentWeekData = [352, 267, 373, 222, 533, 111, 60];

            $('#chart-sales-performance').sparkline(lastWeekData, {
                fillColor: 'rgba(90, 90, 90, 0.1)',
                lineColor: '#5A5A5A',
                width: '' + $('#chart-sales-performance').innerWidth() + '',
                height: '100px',
                lineWidth: '2',
                spotColor: false,
                minSpotColor: false,
                maxSpotColor: false,
                chartRangeMin: 0,
                chartRangeMax: 1000
            });

            $('#chart-sales-performance').sparkline(currentWeekData, {
                composite: true,
                fillColor: 'rgba(60, 137, 218, 0.1)',
                lineColor: '#3C89DA',
                lineWidth: '2',
                spotColor: false,
                minSpotColor: false,
                maxSpotColor: false,
                chartRangeMin: 0,
                chartRangeMax: 1000
            });
        }

        sparklineSalesPerformance();

        var sparkResize;
        $(window).on('resize', function () {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineSalesPerformance, 200);
        });


        // top products
        var dataStackedBar = {
            labels: ['Q1', 'Q2', 'Q3'],
            series: [
                [800000, 1200000, 1400000],
                [200000, 400000, 500000],
                [100000, 200000, 400000]
            ]
        };

        new Chartist.Bar('#chart-top-products', dataStackedBar, {
            height: "250px",
            stackBars: true,
            axisX: {
                showGrid: false
            },
            axisY: {
                labelInterpolationFnc: function (value) {
                    return (value / 1000) + 'k';
                }
            },
            plugins: [
                Chartist.plugins.tooltip({
                    appendToBody: true
                }),
                Chartist.plugins.legend({
                    legendNames: ['Phone', 'Laptop', 'PC']
                })
            ]
        }).on('draw', function (data) {
            if (data.type === 'bar') {
                data.element.attr({
                    style: 'stroke-width: 30px'
                });
            }
        });

        // notification popup
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.options.showDuration = 1000;
        toastr['info']('Hello, {{ (!empty(auth()->user())) ? auth()->user()->name : 'Man' }}.'); //TODO userName

    });
</script>
</body>

</html>
