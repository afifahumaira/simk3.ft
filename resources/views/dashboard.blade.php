@extends ('layouts.layout')

@section('content')
    @include('sweetalert::alert')

    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content" class="app-content flex-column-fluid rounded bg-light h-100 mb-20 "
            style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 my-5 px-5 ">
                <!--begin::Page title-->
                <h1 class="page-heading mb-5 ms-7 d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0"
                    style="color: #16243D; font-family: Roboto Flex;">Dashboard</h1>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">


                @if (auth()->user()->hak_akses == 'pengguna')
                    <div class="row my-5 d-flex justify-content-around">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body ">
                                    <div class="numbers  d-flex justify-content-between" style="font-size: 16px">
                                        <p class="card-category " style="color: #FF9600">Total Potensi Bahaya</p>
                                        <span class="card-title">{{ $data['jumlah_potensi_bahaya'] }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <button type="button" class="btn text-white btn-sm" style="background:#DC3545">{{ $data['jumlah_potensi_bahaya_pending'] }}
                                            Pending</button>
                                        <button type="button" class="btn text-white btn-sm mx-2"
                                            style="background:#0099FF">{{ $data['jumlah_potensi_bahaya_tindaklanjut'] }}
                                            Ditindaklanjuti</button>
                                        <button type="button" class="btn  text-white btn-sm" style="background:#29CC6A">{{ $data['jumlah_potensi_bahaya_sukses'] }}
                                            Disetujui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body d-flex justify-content-around flex-column">
                                    <p class="card-category  " style="color: #00876C; font-size:16px ">Total Investigasi</p>
                                    <span class="card-title mb-0" style="font-size:24px">{{ $data['jumlah_investigasi'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body">
                                    <div class="numbers d-flex justify-content-between mb-2" style="font-size: 16px">
                                        <p class="card-category   " style="color: #0056B9 ">Total Lapor Insiden
                                        </p>
                                        <span class="card-title">{{ $data['jumlah_insiden'] }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <button type="button" class="btn text-white btn-sm" style="background:#DC3545">{{ $data['jumlah_insiden_pending'] }}
                                            Pending</button>
                                        <button type="button" class="btn text-white btn-sm mx-2"
                                            style="background:#0099FF">{{ $data['jumlah_insiden_tindaklanjut'] }}
                                            Ditindaklanjuti</button>
                                        <button type="button" class="btn  text-white btn-sm" style="background:#29CC6A">{{ $data['jumlah_insiden_sukses'] }}
                                            Disetujui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- End View Pengguna --}}

                {{-- View Admin --}}
                @if (auth()->user()->hak_akses == 'Admin')
                    <div class="row my-5">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats h-100 ">
                                <div class="card-body mx-3">
                                    <div class="pull-left mb-4 ">
                                        <h1
                                            class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2 "style="color: #16243D; font-family: Roboto Flex;">
                                            Total Data Masuk</h1>
                                    </div>
                                    <div class="pt-5 mt-5">
                                        <ul style="list-style-type:circle; font-size:18px" class="text-white ps-0 mt-3">
                                            <li class=" d-flex justify-content-between align-items-center rounded-2 px-4 py-3"
                                                style="background-color: #008BF1">
                                                Lapor Insiden
                                                <span class="card-title d-flex align-items-center my-0 rounded-3 px-3"
                                                    style="background-color: rgba(255,255,255,.5);">{{ $data['jumlah_insiden'] }}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center rounded-2 px-4 py-3 my-5"
                                                style="background-color: #FF9600">
                                                Potensi Bahaya
                                                <span class="card-title d-flex align-items-center my-0 rounded-3 px-3"
                                                    style="background-color: rgba(255,255,255,.5);">{{ $data['jumlah_potensi_bahaya'] }}</span>
                                            </li>
                                            {{-- <li class=" d-flex justify-content-between align-items-center rounded-2 px-4 py-2 my-4"
                                                style="background-color: #108E72">
                                                Investigasi
                                                <span class="card-title d-flex align-items-center my-0 rounded-3 px-3"
                                                    style="background-color: rgba(255,255,255,.5);">10</span>
                                            </li> --}}
                                            <li class=" d-flex justify-content-between align-items-center rounded-2 px-4 py-3"
                                                style="background-color: #DC3545">
                                                Hirarc
                                                <span class="card-title d-flex align-items-center my-0 rounded-3 px-3"
                                                    style="background-color: rgba(255,255,255,.5);">{{ $data['jumlah_hirarc'] }}</span>
                                            </li>
                                        </ul>
                                        {{-- <p class="card-category " style="color: #FF9600">Total Potensi Bahaya</p>
                                        <span class="card-title">10</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 ">
                            <div class="card card-stats h-100">
                                <div class="card-body ">
                                    <div class="numbers  d-flex flex-column mb-5">
                                        <p class="card-category mb-0" style="font-size:20px; font-weight:bold;">Status
                                            Pelaporan </p>
                                        <span class=" " style="font-size: 12px; font-weight:400;">Lapor insiden</span>
                                    </div>
                                    <div class="pt-3 pb-2">
                                        <span class="card-title mb-0"
                                            style="font-size:18px; font-weight:bold;">{{ $data['jumlah_insiden'] }}
                                            Laporan</span>
                                    </div>
                                    <div class="d-flex justify-content-around ">
                                        <div class=" col-lg-4 text-white d-flex flex-column py-3 rounded-4 w-25"
                                            style="background:#DC3545">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-clipboard-x text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_insiden_pending'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Pending</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-white d-flex flex-column py-3 rounded-4 w-25 bg-primary">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi bi-search text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_insiden_tindaklanjut'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Tindaklanjut</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-white d-flex flex-column py-3 rounded-4 w-25 bg-success">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-person-check-fill text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_insiden_sukses'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Disetujui</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 ">
                            <div class="card card-stats h-100">
                                <div class="card-body ">
                                    <div class="numbers  d-flex flex-column mb-5">
                                        <p class="card-category mb-0" style="font-size:20px; font-weight:bold;">Status
                                            Pelaporan </p>
                                        <span class=" " style="font-size: 12px; font-weight:400;">Potensi
                                            bahaya</span>
                                    </div>
                                    <div class="pt-3 pb-2">
                                        <span class="card-title mb-0"
                                            style="font-size:18px; font-weight:bold;">{{ $data['jumlah_potensi_bahaya'] }}
                                            Laporan</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <div class="col-lg-4 text-white d-flex flex-column py-3 rounded-4 w-25"
                                            style="background:#DC3545">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-clipboard-x text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_potensi_bahaya_pending'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Pending</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-white d-flex flex-column py-3 rounded-4 w-25 bg-primary">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi bi-search text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_potensi_bahaya_tindaklanjut'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Tindaklanjut</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-white d-flex flex-column py-3 rounded-4 w-25 bg-success">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-person-check-fill text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_potensi_bahaya_sukses'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Disetujui</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                @endif
                {{-- End View Admin --}}

                {{-- View p2k3 --}}
                @if (auth()->user()->hak_akses == 'P2K3' ||
                        auth()->user()->hak_akses == 'K3 Departtemen' ||
                        auth()->user()->hak_akses == 'Pimpinan')
                    <div class="row my-5">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats h-100 ">
                                <div class="card-body mx-3">
                                    <div class="pull-left mb-4 ">
                                        <h1
                                            class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2 "style="color: #16243D; font-family: Roboto Flex;">
                                            Total Data Masuk</h1>
                                    </div>
                                    <div class="pt-3">
                                        <ul style="list-style-type:circle; font-size:16px" class="text-white ps-0">
                                            <li class=" d-flex justify-content-between align-items-center rounded-2 px-4 py-2"
                                                style="background-color: #008BF1">
                                                Lapor Insiden
                                                <span class="card-title d-flex align-items-center my-0 rounded-3 px-3"
                                                    style="background-color: rgba(255,255,255,.5);">{{ $data['jumlah_insiden'] }}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center rounded-2 px-4 py-2 my-4"
                                                style="background-color: #FF9600">
                                                Potensi Bahaya
                                                <span class="card-title d-flex align-items-center my-0 rounded-3 px-3"
                                                    style="background-color: rgba(255,255,255,.5);">{{ $data['jumlah_potensi_bahaya'] }}</span>
                                            </li>
                                            {{-- <li class=" d-flex justify-content-between align-items-center rounded-2 px-4 py-2 my-4"
                                                style="background-color: #108E72">
                                                Investigasi
                                                <span class="card-title d-flex align-items-center my-0 rounded-3 px-3"
                                                    style="background-color: rgba(255,255,255,.5);">10</span>
                                            </li> --}}
                                            <li class=" d-flex justify-content-between align-items-center rounded-2 px-4 py-2"
                                                style="background-color: #DC3545">
                                                Hirarc
                                                <span class="card-title d-flex align-items-center my-0 rounded-3 px-3"
                                                    style="background-color: rgba(255,255,255,.5);">{{ $data['jumlah_hirarc'] }}</span>
                                            </li>
                                        </ul>
                                        {{-- <p class="card-category " style="color: #FF9600">Total Potensi Bahaya</p>
                                    <span class="card-title">10</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 ">
                            <div class="card card-stats h-100">
                                <div class="card-body ">
                                    <div class="numbers  d-flex flex-column mb-5">
                                        <p class="card-category mb-0" style="font-size:20px; font-weight:bold;">Status
                                            Pelaporan </p>
                                        <span class=" " style="font-size: 12px; font-weight:400;">Lapor
                                            insiden</span>
                                    </div>
                                    <div class="pt-3 pb-2">
                                        <span class="card-title mb-0"
                                            style="font-size:18px; font-weight:bold;">{{ $data['jumlah_insiden'] }}
                                            Laporan</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <div class="text-white d-flex flex-column py-3 rounded-4 w-25"
                                            style="background:#DC3545">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-person-check-fill text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_insiden_pending'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Pending</span>
                                            </div>
                                        </div>
                                        <div class="text-white d-flex flex-column py-3 rounded-4 w-25 bg-primary">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi bi-search text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_insiden_tindaklanjut'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Ditindaklanjuti</span>
                                            </div>
                                        </div>
                                        <div class="text-white d-flex flex-column py-3 rounded-4 w-25 bg-success">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-person-check-fill text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_insiden_sukses'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Disetujui</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 ">
                            <div class="card card-stats h-100">
                                <div class="card-body ">
                                    <div class="numbers  d-flex flex-column mb-5">
                                        <p class="card-category mb-0" style="font-size:20px; font-weight:bold;">Status
                                            Pelaporan </p>
                                        <span class=" " style="font-size: 12px; font-weight:400;">Potensi
                                            bahaya</span>
                                    </div>
                                    <div class="pt-3 pb-2">
                                        <span class="card-title mb-0"
                                            style="font-size:18px; font-weight:bold;">{{ $data['jumlah_potensi_bahaya'] }}
                                            Laporan</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <div class="text-white d-flex flex-column py-3 rounded-4 w-25"
                                            style="background:#DC3545">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-clipboard-x text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_potensi_bahaya_pending'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Pending</span>
                                            </div>
                                        </div>
                                        <div class="text-white d-flex flex-column py-3 rounded-4 w-25 bg-primary">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-person-check-fill text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_potensi_bahaya_tindaklanjut'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Ditindaklanjuti</span>
                                            </div>
                                        </div>
                                        <div class="text-white d-flex flex-column py-3 rounded-4 w-25 bg-success">
                                            <div class="mb-4 d-flex justify-content-center py-2">
                                                <i class="bi bi-person-check-fill text-white fs-2hx"></i>
                                            </div>
                                            <div class="fs-2hx d-flex justify-content-center"
                                                style=" font-family: Roboto Flex;">
                                                {{ $data['jumlah_potensi_bahaya_sukses'] }}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="card-title">Disetujui</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                <!--begin::Row-->
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card card-bordered">

                            <div class="card-body">
                                <div class="pull-left pb-4">
                                    <h1
                                        class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2 "style="color: #16243D; font-family: Roboto Flex;">
                                        Total Laporan Insiden</h1>

                                </div>
                                {{-- <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 ">

                                    
                                    <div class="card-toolbar">
                                     
                                        <div id="kalender" data-kt-daterangepicker="true"
                                            data-kt-daterangepicker-opens="left"
                                            class="cursor-pointer d-flex align-items-center px-4">
  
                                            <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <div id="kt_apexcharts_3" style="height: 350px"></div> --}}
                                <div class="px-5 mx-5">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Content container-->
        </div>
    </div>
@stop


{{-- @section('custom-css')
    <style>
        .card-body .card-category {
            font-size: 16px;
            font-weight: 700;
            font-family: Roboto Flex;
        }

        .card-body .card-title {
            color: #16243D;
            font-size: 16px;
            font-family: Roboto Flex;
            font-weight: 700
        }
    </style>
@stop --}}

@section('customscript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @for ($i = 0; $i < count($data['chart']['bulan']); $i++)
                        '{{ $data['chart']['bulan'][$i] }}',
                    @endfor
                ],
                datasets: [{
                    label: '# Jumlah',
                    data: [
                        @for ($i = 0; $i < count($data['chart']['jumlah']); $i++)
                            '{{ $data['chart']['jumlah'][$i] }}',
                        @endfor
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 205, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(201, 203, 207, 0.5)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1

                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop
