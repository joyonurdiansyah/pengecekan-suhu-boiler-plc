@extends('layouts.app')

@section('title', 'Dashboard')

@push('after-style')
    <style>
        /* hover list menu */
        .list-group-item:hover {
            background-color: #0d5eb5;
            color: white;
        }

        /* atur button show and hide speedometer dan linechart*/
        #showChartspeedmeter {
            --color: #0d5eb5;
            font-family: inherit;
            display: inline-block;
            width: 8em;
            height: 2.6em;
            line-height: 2.5em;
            margin: 20px;
            position: relative;
            overflow: hidden;
            border: 2px solid var(--color);
            transition: color .5s;
            z-index: 1;
            font-size: 17px;
            border-radius: 6px;
            font-weight: 500;
            color: var(--color);
            }

            #showChartspeedmeter:before {
            content: "";
            position: absolute;
            z-index: -1;
            background: var(--color);
            height: 150px;
            width: 200px;
            border-radius: 50%;
            }

            #showChartspeedmeter:hover {
            color: #fff;
            }

            #showChartspeedmeter:before {
            top: 100%;
            left: 100%;
            transition: all .7s;
            }

            #showChartspeedmeter:hover:before {
            top: -30px;
            left: -30px;
            }

            #showChartspeedmeter:active:before {
            background: #3a0ca3;
            transition: background 0s;
            }

            /* cursor pointer */
            #speedmeter, 
            #feedwatermeter, 
            #lhtempmeter, 
            #rhtempmeter, 
            #LHFDFans, 
            #RHFDFans, 
            #IDFans, 
            #LHStokers, 
            #RHStockers {
                cursor: pointer;
            }

            .list-group-numbered {
                cursor: pointer;
            }
    </style>
@endpush

{{-- @vite('resources/css/app.css') --}}

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading d-flex justify-content-between align-items-center">
            <h3>Data Trend</h3>
            <div class="user-info" style="flex-grow: 1; text-align: right;">
                <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 48px;"></i>
                <div class="user-email" style="margin-top: 8px;">
                    ihsan.ramadhan@pt.bas.id.com
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="col-12">

                <section class="pt-5 pb-5">
                    <div class="container" id="chartspeedmeter">
                        <div class="row">
                            <div class="col-12">
                                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner data-speedmeter">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <figure class="highcharts-figure">
                                                                    <div id="speedmeter"></div>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:25px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <figure class="highcharts-figure">
                                                                    <div id="feedwatermeter"></div>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <figure class="highcharts-figure">
                                                                    <div id="lhtempmeter"></div>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <figure class="highcharts-figure">
                                                                    <div id="rhtempmeter"></div>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <figure class="highcharts-figure">
                                                                    <div id="LHFDFans"></div>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <figure class="highcharts-figure">
                                                                    <div id="RHFDFans"></div>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">

                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <figure class="highcharts-figure">
                                                                    <div id="IDFans"></div>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div class="card-content">
                                                                <div
                                                                    style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                    <figure class="highcharts-figure">
                                                                        <div id="LHStokers"></div>
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                            <figure class="highcharts-figure">
                                                                <div id="RHStockers"></div>
                                                            </figure>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <i class="bi bi-speedometer"></i>
                                                            </div>
                                                            <div class="card-body text-center" style="padding-top: 45px;">
                                                                <h5 class="card-title"> FEEDTANK TEMP </h5>
                                                                <p class="card-text"
                                                                    style="font-size: 14px; position:relative; top:20px; color:#3498db;">
                                                                    3.0 M3/H
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <i class="bi bi-speedometer"></i>
                                                            </div>
                                                            <div class="card-body text-center" style="padding-top: 45px;">
                                                                <h5 class="card-title"> INLET WATER FLOW </h5>
                                                                <p class="card-text"
                                                                    style="font-size: 14px; position:relative; top:20px; color:#3498db;">
                                                                    3.0 M3/H
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="padding-left:20px; padding-right:20px;">
                                                        <div class="card-content">
                                                            <div
                                                                style="text-align: center; font-size: 36px; margin-top:30px;">
                                                                <i class="bi bi-speedometer"></i>
                                                            </div>
                                                            <div class="card-body text-center" style="padding-top: 45px;">
                                                                <h5 class="card-title"> OUTLET STEAM FLOW </h5>
                                                                <p class="card-text"
                                                                    style="font-size: 14px; position:relative; top:20px; color:#3498db;">
                                                                    3.0 M3/H
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-primary" style="margin-right: 20px;" href="#carouselExampleIndicators2"
                                role="button" data-slide="prev">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <a class="btn btn-primary" href="#carouselExampleIndicators2" role="button"
                                data-slide="next">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Existing Alarm History card -->
                <section class="linechart pt-4">
                    <div>
                        <button id="showChartspeedmeter" style="display: none;">Kembali</button>
                    </div>
                    <div class="container">
                        <div class="row">
                            <!-- Alarm History Column -->
                            <div class="col-md-4">
                                <div class="card alarm-history-card" style="position: relative; display: none;">
                                    <div class="card-content">
                                        <div class="card-body" style="text-align: left;">
                                            <h3 class="card-title" style="font-size: 24px;">Data</h3>
                                            <ol class="list-group list-group-numbered">
                                                <li class="list-group-item">Steam Pressure</li>
                                                <li class="list-group-item">Level Feedwater</li>
                                                <li class="list-group-item">LH Temp</li>
                                                <li class="list-group-item">RH Temp</li>
                                                <li class="list-group-item">LH FD Fan</li>
                                                <li class="list-group-item">RH FD Fan</li>
                                                <li class="list-group-item">ID Fan</li>
                                                <li class="list-group-item">LH Stocker</li>
                                                <li class="list-group-item">RH Stocker</li>
                                                    {{-- <li class="list-group-item">Feedtank Temp</li>
                                                    <li class="list-group-item">Inlet Water Flow</li>
                                                    <li class="list-group-item">Outlet Steam Flow</li>  --}}
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Line Chart Column -->
                            <div class="col-md-8" id="daftar-line-chart">
                                <div class="card daftar-chart" style="display: none;">
                                    <div class="card-body">
                                        <!-- Button group for time range -->
                                        {{-- <div class="btn-group" role="group" aria-label="Time range">
                                            <button type="button" class="btn btn-outline-secondary" onclick="updateChart('1H')">1H</button>
                                            <button type="button" class="btn btn-outline-secondary" onclick="updateChart('24H')">24H</button>
                                            <button type="button" class="btn btn-outline-secondary" onclick="updateChart('1W')">1W</button>
                                        </div> --}}
                                        <!-- Highcharts container -->
                                        <div id="steamPressureChart" style="height: 200px; margin-top: 1rem;"></div>
                                        <div id="levelFeedwaterChart" style="height: 200px; margin-top: 1rem;"></div>
                                        <div id="LHTempChart" style="height: 200px; margin-top: 1rem;"></div>
                                        <div id="RHTempChart" style="height: 200px; margin-top: 1rem;"></div>
                                        <div id="LHFDFanChart" style="height: 200px; margin-top: 1rem;"></div>
                                        <div id="RHFDFanChart" style="height: 200px; margin-top: 1rem;"></div>
                                        <div id="IDFanChart" style="height: 200px; margin-top: 1rem;"></div>
                                        <div id="LHStokersChart" style="height: 200px; margin-top: 1rem;"></div>
                                        <div id="RHStockersChart" style="height: 200px; margin-top: 1rem;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection


@push('after-script')
    {{-- <script src="{{ url('/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script> --}}
    <script src="{{ url('/assets/plugins/global/date-eu.js') }}"></script>
    <script type="text/javascript">
        // eksekusi loading screen
        $(window).on('load', function() {
            $('#loading-overlay').fadeOut('slow');
        });

        // var chartData = {
        //     '1H': {
        //         labels: ["0", "10", "20", "30", "40", "50", "60"],
        //         data: [1, 3, 2, 5, 4, 3, 4]
        //     },
        //     '24H': {
        //         labels: ["0", "4", "8", "12", "16", "20", "24"],
        //         data: [2, 2.5, 3, 3.5, 4, 4.5, 4]
        //     },
        //     '1W': {
        //         labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        //         data: [3, 3.5, 3, 4, 3.5, 4, 4.5]
        //     }
        // };

        // linechart pvsteam
        function fetchAndRenderSteamPressureChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-pvsteam')
                    .then(response => response.json())
                    .then(data => {
                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.PVSteam, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('steamPressureChart', {
                                title: {
                                    text: 'PVSteam Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'PVSteam'
                                    },
                                    min: 4,
                                    max: 7,
                                    tickInterval: 0.5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'PVSteam',
                                    data: chartData,
                                    color: 'brown'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }


        // linechart feedwater
        function fetchAndRenderLevelFeedwaterChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-feedwater')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data Line Chart LevelFeedWater:', data);

                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.LevelFeedWater, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('levelFeedwaterChart', {
                                title: {
                                    text: 'LevelFeedWater Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'LevelFeedWater'
                                    },
                                    min: 40,
                                    max: 60,
                                    tickInterval: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'LevelFeedWater',
                                    data: chartData,
                                    color: 'blue'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }

        // linechart lhtemp
        function fetchAndRenderLHTempChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-LHTemp')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data Line Chart LHTemp:', data);

                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.LHTemp, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('LHTempChart', {
                                title: {
                                    text: 'LHTemp Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'LHTemp'
                                    },
                                    min: 14,
                                    max: 220,
                                    startOnTick: true,
                                    endOnTick: true,
                                    tickInterval: 20
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'LHTemp',
                                    data: chartData,
                                    color: 'green'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }

        // linechart rhtemp
        function fetchAndRenderRHTempChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-RHTemp')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data Line Chart RHTemp:', data);

                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.RHTemp, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('RHTempChart', {
                                title: {
                                    text: 'RHTemp Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'RHTemp'
                                    },
                                    min: 14,
                                    max: 220,
                                    tickInterval: 20
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'RHTemp',
                                    data: chartData,
                                    color: 'orange'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }


        // linechart LHFDFan
        function fetchAndRenderLHFDFanChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-LHFDFan')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data Line Chart LHFDFan:', data);

                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.LHFDFan, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('LHFDFanChart', {
                                title: {
                                    text: 'LHFDFan Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'LHFDFan'
                                    },
                                    min: 9,
                                    max: 25,
                                    tickInterval: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'LHFDFan',
                                    data: chartData,
                                    color: 'purple'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }


        // linechart RHFDFanChart
        function fetchAndRenderRHFDFanChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-RHFDFan')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data Line Chart RHFDFan:', data);

                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.RHFDFan, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('RHFDFanChart', {
                                title: {
                                    text: 'RHFDFan Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'RHFDFan'
                                    },
                                    min: 9,
                                    max: 25,
                                    tickInterval: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'RHFDFan',
                                    data: chartData,
                                    color: 'turquoise'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }

        // linechart IDFan
        function fetchAndRenderIDFanChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-IDFan')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data Line Chart IDFan:', data);

                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.IDFan, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('IDFanChart', {
                                title: {
                                    text: 'IDFan Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'IDFan'
                                    },
                                    min: 10,
                                    max: 25,
                                    tickInterval: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'IDFan',
                                    data: chartData,
                                    color: 'Red'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }

        // linechart LHStoker
        function fetchAndRenderLHStokerChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-LHStoker')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data Line Chart LHStoker:', data);

                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.LHStoker, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('LHStokersChart', {
                                title: {
                                    text: 'LHStoker Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'LHStoker'
                                    },
                                    min: 12,
                                    max: 22,
                                    tickInterval: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'LHStoker',
                                    data: chartData,
                                    color: 'purple'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }

        // linechart RHStoker
        function fetchAndRenderRHStokerChart() {
            setInterval(() => {
                fetch('/boiler/line-chart-RHStoker')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data Line Chart RHStoker:', data);

                        const chartData = data.map(item => {
                            const timestamp = new Date(item.waktu).getTime();
                            const formattedTimestamp = new Date(timestamp).toLocaleString();
                            return [timestamp, item.RHStoker, formattedTimestamp];
                        });

                        if (chartData.length >= 8) {
                            Highcharts.chart('RHStockersChart', {
                                title: {
                                    text: 'RHStoker Chart',
                                    align: 'left'
                                },
                                xAxis: {
                                    type: 'datetime',
                                    title: {
                                        text: 'Time'
                                    },
                                    labels: {
                                        formatter: function() {
                                            return new Date(this.value).toLocaleTimeString();
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'RHStoker'
                                    },
                                    min: 12,
                                    max: 22,
                                    tickInterval: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: [{
                                    name: 'RHStoker',
                                    data: chartData,
                                    color: 'yellow'
                                }],
                                tooltip: {
                                    formatter: function() {
                                        return '<b>' + new Date(this.x).toLocaleString() + '</b><br/>' + this.series.name + ': ' + this.y;
                                    }
                                },
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        }
                    });
            }, 1000);
        }

        // 

        fetchAndRenderSteamPressureChart();
        fetchAndRenderLevelFeedwaterChart();
        fetchAndRenderLHTempChart();
        fetchAndRenderRHTempChart();
        fetchAndRenderLHFDFanChart();
        fetchAndRenderRHFDFanChart();
        fetchAndRenderIDFanChart();
        fetchAndRenderLHStokerChart();
        fetchAndRenderRHStokerChart();
    </script>

    {{-- steam speedmeter preassure --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('speedmeter', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'STEAM PRESSURE'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 89.9,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                    min: 4.00,
                    max: 7.00,
                    tickPixelInterval: 72,
                    tickPosition: 'inside',
                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                    tickLength: 20,
                    tickWidth: 2,
                    minorTickInterval: null,
                    labels: {
                        distance: 20,
                        style: {
                            fontSize: '14px'
                        }
                    },
                    lineWidth: 0,
                    plotBands: [{
                        from: 4.00,
                        to: 5.00,
                        color: '#DF5353',
                        thickness: 20
                    }, {
                        from: 5.00,
                        to: 6.00,
                        color: '#DDDF0D',
                        thickness: 20
                    }, {
                        from: 6.00,
                        to: 7.00,
                        color: '#55BF3B',
                        thickness: 20
                    }]
                },
                series: [{
                    name: 'Speed',
                    data: [{
                        y: 4.00,
                        waktu: ''
                    }],
                    tooltip: {
                        formatter: function() {
                            return Highcharts.dateFormat('%H:%M:%S', this.x) + '<br/>' + this.y;
                        }
                    },
                    dataLabels: {
                        format: '{y} bar',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Pressure: ' + this.y + ' bar';
                    }
                },
            });

            function updatePressure() {
                $.ajax({
                    url: '/boiler/stream-pressure',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data speedmeter: ", data);
                        const newVal = parseFloat(data.PVSteam);
                        if (newVal < 4.00 || newVal > 7.00) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updatePressure: ", error);
                    }
                });
            }

            updatePressure();
            setInterval(updatePressure, 1000);
        });
    </script>

    {{-- speedmeter level feed water --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('feedwatermeter', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'LEVEL FEEDWATER'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                    min: 40,
                    max: 60,
                    tickPixelInterval: 72,
                    tickPosition: 'inside',
                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                    tickLength: 20,
                    tickWidth: 2,
                    minorTickInterval: null,
                    labels: {
                        distance: 20,
                        style: {
                            fontSize: '14px'
                        }
                    },
                    lineWidth: 0,
                    plotBands: [{
                            from: 40,
                            to: 50,
                            color: '#DF5353',
                            thickness: 20
                        },
                        {
                            from: 50,
                            to: 60,
                            color: '#DDDF0D',
                            thickness: 20
                        },
                        {
                            from: 55,
                            to: 60,
                            color: '#55BF3B',
                            thickness: 20
                        }
                    ]
                },
                series: [{
                    name: 'Level',
                    data: [{
                        y: 0,
                        waktu: ''
                    }],
                    tooltip: {
                        valueSuffix: '%'
                    },
                    dataLabels: {
                        format: '{y}%',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Level: ' + this.y + '%';
                    }
                },
            });

            function updateMeter() {
                $.ajax({
                    url: '/boiler/level-feed-water',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data level feed water: ", data);
                        const newVal = parseFloat(data.LevelFeedWater);
                        if (newVal < 0 || newVal > 60) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updateMeter: ", error);
                    }
                });
            }

            updateMeter();
            setInterval(updateMeter, 1000);
        });
    </script>

    {{-- speedmeter LH Temp --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('lhtempmeter', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'LH TEMP'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                    min: 14,
                    max: 228,
                    tickPixelInterval: 36,
                    tickPosition: 'inside',
                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                    tickLength: 20,
                    tickWidth: 2,
                    minorTickInterval: null,
                    labels: {
                        distance: 20,
                        style: {
                            fontSize: '14px'
                        },
                        formatter: function() {
                            if (this.value === 15) {
                                return 14;
                            } else {
                                return this.value;
                            }
                        }
                    },
                    lineWidth: 0,
                    plotBands: [{
                            from: 14,
                            to: 80,
                            color: '#DF5353',
                            thickness: 20
                        },
                        {
                            from: 80,
                            to: 160,
                            color: '#DDDF0D',
                            thickness: 20
                        },
                        {
                            from: 160,
                            to: 228,
                            color: '#55BF3B',
                            thickness: 20
                        }
                    ]
                },
                series: [{
                    name: 'Level',
                    data: [{
                        y: 0,
                        waktu: ''
                    }],
                    tooltip: {
                        valueSuffix: '°C'
                    },
                    dataLabels: {
                        format: '{y}°C',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Level: ' + this.y + '°C';
                    }
                },
            });

            function updateTemperature() {
                $.ajax({
                    url: '/boiler/lh-temperature',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data lh-temperature: ", data);
                        const newVal = parseFloat(data.LHTemp);
                        if (newVal < 14 || newVal > 228) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updateTemperature: ", error);
                    }
                });
            }

            updateTemperature();
            setInterval(updateTemperature, 1000);
        });
    </script>

    {{-- speedmeter RH TEMP --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('rhtempmeter', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'RH TEMP'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                    min: 14,
                    max: 220,
                    tickPixelInterval: 36,
                    tickPosition: 'inside',
                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                    tickLength: 20,
                    tickWidth: 2,
                    minorTickInterval: null,
                    labels: {
                        distance: 20,
                        style: {
                            fontSize: '14px'
                        },
                        formatter: function() {
                            if (this.value === 15) {
                                return 14;
                            } else {
                                return this.value;
                            }
                        }
                    },
                    lineWidth: 0,
                    plotBands: [{
                            from: 14,
                            to: 80,
                            color: '#DF5353',
                            thickness: 20
                        },
                        {
                            from: 80,
                            to: 160,
                            color: '#DDDF0D',
                            thickness: 20
                        },
                        {
                            from: 160,
                            to: 220,
                            color: '#55BF3B',
                            thickness: 20
                        }
                    ]
                },
                series: [{
                    name: 'Level',
                    data: [{
                        y: 0,
                        waktu: ''
                    }],
                    tooltip: {
                        valueSuffix: '°C'
                    },
                    dataLabels: {
                        format: '{y}°C',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Level: ' + this.y + '°C';
                    }
                },
            });

            function updateTemperature() {
                $.ajax({
                    url: '/boiler/rh-temperature',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data rh-temperature: ", data);
                        const newVal = parseFloat(data.RHTemp);
                        if (newVal < 14 || newVal > 200) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updateTemperature: ", error);
                    }
                });
            }

            updateTemperature();
            setInterval(updateTemperature, 1000);
        });
    </script>

    {{-- speedmeter LHFDFan --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('LHFDFans', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'LHFD Fan'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                    min: 9,
                    max: 25,
                    tickPixelInterval: 72,
                    tickPosition: 'inside',
                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                    tickLength: 20,
                    tickWidth: 2,
                    minorTickInterval: null,
                    labels: {
                        distance: 20,
                        style: {
                            fontSize: '14px'
                        }
                    },
                    lineWidth: 0,
                    plotBands: [{
                            from: 9,
                            to: 15,
                            color: '#DF5353',
                            thickness: 20
                        },
                        {
                            from: 15,
                            to: 20,
                            color: '#DDDF0D',
                            thickness: 20
                        },
                        {
                            from: 20,
                            to: 25,
                            color: '#55BF3B',
                            thickness: 20
                        }
                    ]
                },
                series: [{
                    name: 'Level',
                    data: [{
                        y: 0,
                        waktu: ''
                    }],
                    tooltip: {
                        valueSuffix: '%'
                    },
                    dataLabels: {
                        format: '{y}%',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Level: ' + this.y + '%';
                    }
                },
            });

            function updateLHDFan() {
                $.ajax({
                    url: '/boiler/LHFDFan',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data LHFDFan: ", data);
                        const newVal = parseFloat(data.LHFDFan);
                        if (newVal < 6 || newVal > 25) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updateLHDFan: ", error);
                    }
                });
            }

            updateLHDFan();
            setInterval(updateLHDFan, 1000);
        });
    </script>

    {{-- speedmeter RHFDFAN --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('RHFDFans', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'RHFD FAN'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                    min: 6,
                    max: 25,
                    tickPixelInterval: 72,
                    tickPosition: 'inside',
                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                    tickLength: 20,
                    tickWidth: 2,
                    minorTickInterval: null,
                    labels: {
                        distance: 20,
                        style: {
                            fontSize: '14px'
                        }
                    },
                    lineWidth: 0,
                    plotBands: [{
                            from: 6,
                            to: 15,
                            color: '#DF5353',
                            thickness: 20
                        },
                        {
                            from: 15,
                            to: 20,
                            color: '#DDDF0D',
                            thickness: 20
                        },
                        {
                            from: 20,
                            to: 25,
                            color: '#55BF3B',
                            thickness: 20
                        }
                    ]
                },
                series: [{
                    name: 'Level',
                    data: [{
                        y: 0,
                        waktu: ''
                    }],
                    tooltip: {
                        valueSuffix: '%'
                    },
                    dataLabels: {
                        format: '{y}%',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Level: ' + this.y + '%';
                    }
                },
            });

            function updateRHFDFAN() {
                $.ajax({
                    url: '/boiler/RHFDFan',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data RHFDFan: ", data);
                        const newVal = parseFloat(data.RHFDFan);
                        if (newVal < 6 || newVal > 25) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updateRHFDFAN: ", error);
                    }
                });
            }
            updateRHFDFAN();
            setInterval(updateRHFDFAN, 1000);
        });
    </script>

    {{-- speedmeter IDFAN --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('IDFans', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'IDFan'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                    min: 10,
                    max: 25,
                    tickPixelInterval: 72,
                    tickPosition: 'inside',
                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                    tickLength: 20,
                    tickWidth: 2,
                    minorTickInterval: null,
                    labels: {
                        distance: 20,
                        style: {
                            fontSize: '14px'
                        }
                    },
                    lineWidth: 0,
                    plotBands: [{
                            from: 10,
                            to: 15,
                            color: '#DF5353',
                            thickness: 20
                        },
                        {
                            from: 15,
                            to: 20,
                            color: '#DDDF0D',
                            thickness: 20
                        },
                        {
                            from: 20,
                            to: 25,
                            color: '#55BF3B',
                            thickness: 20
                        }
                    ]
                },
                series: [{
                    name: 'Level',
                    data: [{
                        y: 0,
                        waktu: ''
                    }],
                    tooltip: {
                        valueSuffix: '%'
                    },
                    dataLabels: {
                        format: '{y}%',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Level: ' + this.y + '%';
                    }
                },
            });

            function updateIDFan() {
                $.ajax({
                    url: '/boiler/IDFan',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data ID Fan: ", data);
                        const newVal = parseFloat(data.IDFan);
                        if (newVal < 10 || newVal > 25) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updateIDFan: ", error);
                    }
                });
            }

            updateIDFan();
            setInterval(updateIDFan, 1000);
        });
    </script>

    {{-- speedmeter LHStoker --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('LHStokers', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'LHStoker'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                min: 12,
                max: 23,
                tickPixelInterval: 72,
                tickPosition: 'inside',
                tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                tickLength: 20,
                tickWidth: 2,
                minorTickInterval: null,
                labels: {
                    distance: 20,
                    style: {
                        fontSize: '14px'
                    }
                },
                lineWidth: 0,
                plotBands: [
                    {
                        from: 12,
                        to: 15,
                        color: '#DF5353',
                        thickness: 20
                    },
                    {
                        from: 15,
                        to: 20,
                        color: '#DDDF0D',
                        thickness: 20
                    },
                    {
                        from: 20,
                        to: 23,
                        color: '#55BF3B',
                        thickness: 20
                    }
                ]
            },
                series: [{
                    name: 'Level',
                    data: [{
                        y: 0,
                        waktu: ''
                    }],
                    tooltip: {
                        valueSuffix: '%'
                    },
                    dataLabels: {
                        format: '{y}%',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Level: ' + this.y + '%';
                    }
                },
            });

            function updateLHStocker() {
                $.ajax({
                    url: '/boiler/LHStocker',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data LHStocker: ", data);
                        const newVal = parseFloat(data.LHStoker);
                        if (newVal < 12 || newVal > 23) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updateLHStocker: ", error);
                    }
                });
            }

            updateLHStocker();
            setInterval(updateLHStocker, 1000);
        });
    </script>

    {{-- speedmeter RHStoker --}}
    <script>
        $(document).ready(function() {
            var chart = Highcharts.chart('RHStockers', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },
                title: {
                    text: 'RHStocker'
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },
                yAxis: {
                min: 12,
                max: 22,
                tickPixelInterval: 72,
                tickPosition: 'inside',
                tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                tickLength: 20,
                tickWidth: 2,
                minorTickInterval: null,
                labels: {
                    distance: 20,
                    style: {
                        fontSize: '14px'
                    }
                },
                lineWidth: 0,
                plotBands: [
                    {
                        from: 12,
                        to: 15,
                        color: '#DF5353',
                        thickness: 20
                    },
                    {
                        from: 15,
                        to: 20,
                        color: '#DDDF0D',
                        thickness: 20
                    },
                    {
                        from: 20,
                        to: 22,
                        color: '#55BF3B',
                        thickness: 20
                    }
                ]
            },
                series: [{
                    name: 'Level',
                    data: [{
                        y: 0,
                        waktu: ''
                    }],
                    tooltip: {
                        valueSuffix: '%'
                    },
                    dataLabels: {
                        format: '{y}%',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }
                }],
                tooltip: {
                    formatter: function() {
                        return 'Waktu: ' + this.point.waktu + '<br>Level: ' + this.y + '%';
                    }
                },
            });

            function updateRHStocker() {
                $.ajax({
                    url: '/boiler/RHStocker',
                    type: 'GET',
                    success: function(data) {
                        console.log("Data LHStocker: ", data);
                        const newVal = parseFloat(data.RHStoker);
                        if (newVal < 12 || newVal > 22) {
                            return;
                        }
                        chart.series[0].points[0].update({
                            y: newVal,
                            waktu: data.waktu
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error in updateRHStocker: ", error);
                    }
                });
            }

            updateRHStocker();
            setInterval(updateRHStocker, 1000);
        });
    </script>

    {{-- geser card --}}
    <script>
        $(document).ready(function() {
            $("#carouselExampleIndicators2").swipe({
                swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
                    if (direction == 'left') $(this).carousel('next');
                    if (direction == 'right') $(this).carousel('prev');
                },
                allowPageScroll: "vertical"
            });
        });
    </script>

    {{-- selection list line chart hide and show --}}
    <script>
        $(document).ready(function() {
            $("<style>")
                .prop("type", "text/css")
                .html("\
                        .active-line-chart {\
                            background-color: #435EBE;\
                            color: white;\
                        }")
                .appendTo("head");

            $('.list-group-item').on('click', function() {
                hideAllCharts();
                $('.list-group-item').removeClass('active-line-chart');
                $(this).addClass('active-line-chart');

                $('.daftar-chart').show();
                var chartId = getChartIdFromText($(this).text());
                if (chartId) {
                    $(chartId).show();
                }
            });

            function hideAllCharts() {
                $('#steamPressureChart, #levelFeedwaterChart, #LHTempChart, #RHTempChart, #LHFDFanChart, #RHFDFanChart, #IDFanChart, #LHStokersChart, #RHStockersChart')
                .hide();
            }

            function getChartIdFromText(text) {
                switch (text.trim()) {
                    case 'Steam Pressure':
                        return '#steamPressureChart';
                    case 'Level Feedwater':
                        return '#levelFeedwaterChart';
                    case 'LH Temp':
                        return '#LHTempChart';
                    case 'RH Temp':
                        return '#RHTempChart';
                    case 'LH FD Fan':
                        return '#LHFDFanChart';
                    case 'RH FD Fan':
                        return '#RHFDFanChart';
                    case 'ID Fan':
                        return '#IDFanChart';
                    case 'LH Stocker':
                        return '#LHStokersChart';
                    case 'RH Stocker':
                        return '#RHStockersChart';
                    default:
                        return null;
                }
            }
        });
    </script>

    {{-- selection id hide and show cardlist --}}
    <script>
        $(document).ready(function() {
            function showRelatedContent(cardId) {
                $('#chartspeedmeter').hide("slide", { direction: "up" }, 500);

                $('.alarm-history-card, .daftar-chart, #steamPressureChart, #levelFeedwaterChart, #LHTempChart, #RHTempChart, #LHFDFanChart, #RHFDFanChart, #IDFanChart, #LHStokersChart, #RHStockersChart')
                    .hide();
                $('.list-group-item').removeClass('active-line-chart');

                $('.alarm-history-card').show("slide", { direction: "down" }, 500);
                $('.daftar-chart').show("slide", { direction: "down" }, 500);

                switch (cardId) {
                    case 'speedmeter':
                        $('#steamPressureChart').show();
                        $('.list-group-item:contains("Steam Pressure")').addClass('active-line-chart');
                        break;
                    case 'feedwatermeter':
                        $('#levelFeedwaterChart').show();
                        $('.list-group-item:contains("Level Feedwater")').addClass('active-line-chart');
                        break;
                    case 'lhtempmeter':
                        $('#LHTempChart').show();
                        $('.list-group-item:contains("LH Temp")').addClass('active-line-chart');
                        break;
                    case 'rhtempmeter':
                        $('#RHTempChart').show();
                        $('.list-group-item:contains("RH Temp")').addClass('active-line-chart');
                        break;
                    case 'LHFDFans':
                        $('#LHFDFanChart').show();
                        $('.list-group-item:contains("LH FD Fan")').addClass('active-line-chart');
                        break;
                    case 'RHFDFans':
                        $('#IDFanChart').show();
                        $('.list-group-item:contains("RH FD Fan")').addClass('active-line-chart');
                        break;
                    case 'IDFans':
                        $('#IDFanChart').show();
                        $('.list-group-item:contains("ID Fan")').addClass('active-line-chart');
                        break;
                    case 'LHStokers':
                        $('#LHStokersChart').show();
                        $('.list-group-item:contains("LH Stocker")').addClass('active-line-chart');
                        break;
                    case 'RHStockers':
                        $('#RHStockersChart').show();
                        $('.list-group-item:contains("RH Stocker")').addClass('active-line-chart');
                        break;
                }

                $('#showChartspeedmeter').show("slide", { direction: "down" }, 500);
            }

            $('#showChartspeedmeter').click(function() {
                $('#chartspeedmeter').show("slide", { direction: "up" }, 500);
                $('.alarm-history-card, .daftar-chart').hide("slide", { direction: "up" }, 500);
                $('#showChartspeedmeter').hide("slide", { direction: "up" }, 500);
            });

            $('#speedmeter, #feedwatermeter, #lhtempmeter, #rhtempmeter, #LHFDFans, #RHFDFans, #IDFans, #LHStokers, #RHStockers').click(function() {
                showRelatedContent(this.id);
            });
            
        });
    </script>

    {{-- tampil dan sembunyikan spinner --}}
    
    
@endpush
