<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <!-- CSS files -->
    @include('layouts.head')
    <style>
        .layout-ask {
            min-height: 0% !important;
        }

        .ts-dropdown,
        .ts-dropdown.form-control,
        .ts-dropdown.form-select {
            z-index: 9999 !important;
        }
    </style>
</head>

<body>
    <script src="{{ asset('template/back/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page {{ $title == 'Tanya AI' ? 'layout-ask' : '' }}">
        <!-- Navbar -->
        @include('layouts.header')
        @if ($title != 'Tanya AI')
            @include('layouts.navbar')
        @endif
        <div class="page-wrapper">
            <!-- Page header -->
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Your report name">
                    </div>
                    <label class="form-label">Report type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input"
                                    checked>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Simple</span>
                                        <span class="d-block text-secondary">Provide only basic data needed for the
                                            report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Advanced</span>
                                        <span class="d-block text-secondary">Insert charts and additional advanced
                                            analyses to be inserted in the report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Report url</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        https://tabler.io/reports/
                                    </span>
                                    <input type="text" class="form-control ps-0" value="report-01"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <select class="form-select">
                                    <option value="1" selected>Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Client name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Reporting period</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Create new report
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    @include('layouts.foot')

    @if ($title == 'Dashboard')
        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                window.ApexCharts && (new ApexCharts(document.getElementById('chart-social-referrals'), {
                    chart: {
                        type: "line",
                        fontFamily: 'inherit',
                        height: 288,
                        parentHeightOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        animations: {
                            enabled: false
                        },
                    },
                    fill: {
                        opacity: 1,
                    },
                    stroke: {
                        width: 2,
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: <?= $series ?>,
                    tooltip: {
                        theme: 'dark'
                    },
                    grid: {
                        padding: {
                            top: -20,
                            right: 0,
                            left: -4,
                            bottom: -4
                        },
                        strokeDashArray: 4,
                        xaxis: {
                            lines: {
                                show: true
                            }
                        },
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false
                        },
                        type: 'datetime',
                    },
                    yaxis: {
                        labels: {
                            padding: 4
                        },
                    },
                    labels: <?= $labels ?>,
                    colors: [tabler.getColor("facebook"), tabler.getColor("twitter"), tabler.getColor(
                        "dribbble")],
                    legend: {
                        show: true,
                        position: 'bottom',
                        offsetY: 12,
                        markers: {
                            width: 10,
                            height: 10,
                            radius: 100,
                        },
                        itemMargin: {
                            horizontal: 8,
                            vertical: 8
                        },
                    },
                })).render();
            });
        </script> --}}
        <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function() {
                window.ApexCharts && (new ApexCharts(document.getElementById('chart-social-referrals'), {
                    chart: {
                        type: "line",
                        fontFamily: 'inherit',
                        height: 288,
                        parentHeightOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        animations: {
                            enabled: false
                        },
                    },
                    fill: {
                        opacity: 1,
                    },
                    stroke: {
                        width: 2,
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: [{
                        name: "Closed",
                        data: {!! json_encode($chart['Closed']) !!}
                    }, {
                        name: "Reopened",
                        data: {!! json_encode($chart['Reopened']) !!}
                    }, {
                        name: "Assigned",
                        data: {!! json_encode($chart['Assigned']) !!}
                    }, {
                        name: "Overdue",
                        data: {!! json_encode($chart['Overdue']) !!}
                    }, {
                        name: "Updated",
                        data: {!! json_encode($chart['Updated']) !!}
                    }],
                    tooltip: {
                        theme: 'dark'
                    },
                    grid: {
                        padding: {
                            top: -20,
                            right: 0,
                            left: -4,
                            bottom: -4
                        },
                        strokeDashArray: 4,
                        xaxis: {
                            lines: {
                                show: true
                            }
                        },
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false
                        },
                        type: 'datetime',
                    },
                    yaxis: {
                        labels: {
                            padding: 4
                        },
                    },
                    labels: {!! json_encode($chart['label']) !!},
                    colors: [tabler.getColor("success"), tabler.getColor("warning"), tabler.getColor(
                        "primary"), tabler.getColor("danger"), tabler.getColor("info")],
                    legend: {
                        show: true,
                        position: 'bottom',
                        offsetY: 12,
                        markers: {
                            width: 10,
                            height: 10,
                            radius: 100,
                        },
                        itemMargin: {
                            horizontal: 8,
                            vertical: 8
                        },
                    },
                })).render();
            });
            // @formatter:on
        </script>
    @endif

</body>

</html>
