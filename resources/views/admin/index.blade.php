@extends('layouts.backend.master')

@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="morning-sec">
            <div class="card o-hidden profile-greeting">
                <div class="card-body">
                    <div class="media">
                        <div class="badge-groups w-100 d-flex justify-content-center">
                            <div class="badge f-18">
                                <i class="mr-1" data-feather="clock"></i>
                                <span id="txt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="greeting-user text-center">
                        <h4 class="f-w-100">
                           <span id="greeting"></span>
                        </h4>
                        <p>
                            <span>
                                Selamat datang di halaman administrator Restawuran, disini anda dapat menambah menu,
                                kategori, meja dan menambah reservasi.
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <!-- Chart 1 -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title f-w-100 text-center">Reservasi</h5>
                    <!-- Container for chart currently sale -->
                    <div id="Reservationcount"></div>
                </div>
            </div>
        </div>
        <!-- Chart 2 -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title f-w-100 text-center">Jadwal Reservasi</h5>
                    <!-- Container for chart currently sale -->
                    <div id="Reservationtime"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title f-w-100 text-center">Menu</h5>
                    <!-- Container for chart currently sale -->
                    <div id="pie"></div>
                </div>
            </div>
        </div>
</div>

<div class="row">
    <div class="col-sm-12">        
        <div class="card">
            <div class="card-body">
            <h5 style="text-align: center;">Data Reservasi</h5>
                <div class="dt-ext table-responsive">
                                        <table class="display" id="auto-fill">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Tamu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($reservationDetails as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex py-1 align-items-center">
                                                                <div class="avatars mr-2">
                                                                    <div class="avatar ratio">
                                                                        <img style="object-fit: cover; width: 40px; height: 40px;"
                                                                            class="b-r-8"
                                                                            src="https://ui-avatars.com/api/?background=4466f2&color=fff&name={{ $item->first_name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-fill">
                                                                    <div class="font-weight-bold">{{ ucwords($item->first_name) }} {{ ucwords($item->last_name) }}</div>
                                                                    <div class="text-muted">
                                                                        <a href="#" class="text-reset">{{ $item->email }} || {{ $item->tel_number }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->res_date }}</td>
                                                        <td>{{ $item->guest_number }}</td>
                                                        <td>
                                                            <!-- Your action buttons here -->
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">No reservation details available</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            
                                        </table>
                </div>     
            </div>
        </div>
</div>



    

            

        @push('datatable-scripts')
        <script>
                        // greeting
            var today = new Date();
            var curHr = today.getHours();

            if (curHr >= 0 && curHr < 4) {
                document.getElementById("greeting").innerHTML = "Hai Kamu, Selamat Beristirahat 💤";
            } else if (curHr >= 4 && curHr < 12) {
                document.getElementById("greeting").innerHTML = "Hai Kamu, Selamat Pagi 🌄";
            } else if (curHr >= 12 && curHr < 16) {
                document.getElementById("greeting").innerHTML = "Hai Kamu, Selamat Siang ☀";
            } else {
                document.getElementById("greeting").innerHTML = "Hai Kamu, Selamat Malam 🌙";
            }

            // time
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                // var s = today.getSeconds();

                h = checkTime(h);
                m = checkTime(m);
                // s = checkTime(s);

                document.getElementById("txt").innerHTML = h + ":" + m;
                var t = setTimeout(startTime, 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                } // add zero in front of numbers < 10
                return i;
            }

            startTime(); // Call startTime once to display the initial time
        </script>
        
        <!-- Pie Chart -->
        <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var options = {
                            series: {!! json_encode($menuCounts) !!},
                            chart: {
                                type: 'pie',
                                height: 220,
                                toolbar: {
                                    show: false
                                },
                            },
                            labels: {!! json_encode($categoryNames) !!},
                            legend: {
                                position: 'bottom',
                            },
                            plotOptions: {
                                pie: {
                                    dataLabels: {
                                        offset: -12,
                                        minAngleToShowLabel: 10,
                                        style: {
                                            colors: [CubaAdminConfig.primary],
                                        },
                                        formatter: function (val, opts) {
                                            return opts.w.config.series[opts.seriesIndex] + ': ' + val;
                                        },
                                    },
                                },
                            },
                        };

                        var chart = new ApexCharts(document.querySelector("#pie"), options);
                        chart.render();
                    });
                </script>

                <!-- Bar Chart -->
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var options = {
                            series: [
                                {
                                    name: "Reservation",
                                    data: {!! json_encode($reservationData->pluck('reservation_count')->map(function($count) { return round($count, 0); })) !!},
                                },
                            ],
                            chart: {
                                height: 200,
                                type: "bar",
                                toolbar: {
                                    show: false,
                                },
                            },
                            plotOptions: {
                                bar: {
                                dataLabels: {
                                    position: 'top', // top, center, bottom
                                },

                                columnWidth: '15%',
                                startingShape: 'rounded',
                                endingShape: 'rounded'
                                }
                            },
                            dataLabels: {
                                enabled: true,
                            },
                            stroke: {
                                curve: "smooth",
                            },
                            xaxis: {
                                type: "Month",
                                show: true,
                                categories: {!! json_encode($reservationData->pluck('month')) !!},
                                labels: {
                                    low: 0,
                                    offsetX: 0,
                                    show: true,
                                },
                                axisBorder: {
                                    low: 0,
                                    offsetX: 0,
                                    show: false,
                                },
                            },
                            markers: {
                                strokeWidth: 3,
                                colors: "#ffffff",
                                strokeColors: [CubaAdminConfig.primary],
                                hover: {
                                    size: 6,
                                },
                            },
                            yaxis: {
                                low: 0,
                                max: 10, //tergantung mejanya ada berapa
                                offsetX: 0,
                                offsetY: 0,
                                show: true,
                                labels: {
                                    low: 0,
                                    offsetX: 0,
                                    show: true,
                                },
                                axisBorder: {
                                    low: 0,
                                    offsetX: 0,
                                    show: true,
                                },
                            },
                            grid: {
                                show: true,
                                padding: {
                                    left: 0,
                                    right: 0,
                                    bottom: 0,
                                    top: 0,
                                },
                            },
                            colors: [CubaAdminConfig.primary],
                            legend: {
                                show: true,
                            },
                        };
                        var chart = new ApexCharts(document.querySelector("#Reservationcount"), options);
                        chart.render();
                    });
                </script>

                <!-- high_reservation_time -->
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var options = {
                            series: [
                                {
                                    name: "Reservation",
                                    data: {!! json_encode($reservationData->pluck('reservation_count')->map(function($count) { return round($count, 0); })) !!},
                                },
                            ],
                            chart: {
                                height: 200,
                                type: "bar",
                                toolbar: {
                                    show: false,
                                },
                            },
                            plotOptions: {
                                bar: {
                                    dataLabels: {
                                        position: 'top', // top, center, bottom
                                    },
                                    columnWidth: '10%',
                                    startingShape: 'rounded',
                                    endingShape: 'rounded'
                                }
                            },

                            stroke: {
                                curve: "smooth",
                            },
                            xaxis: {
                                type: 'category',
                                categories: {!! json_encode($reservationData->pluck('high_reservation_time')) !!},
                                labels: {
                                    show: true,
                                },
                            },
                            yaxis: {
                                low: 0,
                                max: 10,
                                offsetX: 0,
                                offsetY: 0,
                                show: true,
                                labels: {
                                    low: 0,
                                    offsetX: 0,
                                    show: true,
                                },
                                axisBorder: {
                                    low: 0,
                                    offsetX: 0,
                                    show: true,
                                },
                            },
                            grid: {
                                show: true,
                                padding: {
                                    left: 0,
                                    right: 0,
                                    bottom: 0,
                                    top: 0,
                                },
                            },
                            colors: [CubaAdminConfig.primary], // Add a color for High Reservation Time
                            legend: {
                                show: false,
                            },
                        };
                        var chart = new ApexCharts(document.querySelector("#Reservationtime"), options);
                        chart.render();
                        });
                    </script>




            <script src="{{ url('cuba/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
            <script src="{{ url('cuba/assets/js/datatable/datatable-extension/custom.js') }}"></script>
            <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatables.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatable-extension.css') }}">
            @endpush
@endsection