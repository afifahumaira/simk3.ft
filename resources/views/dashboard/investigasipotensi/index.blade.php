@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">
        <div class="card m-5">
            <div class="card-header py-3 shadow-sm">
                <h2 class="card-title fw-bold">Daftar Investigasi Laporan Potensi Bahaya</h2>
                <div class="card-toolbar">
                    <div id="kt_docs_search_handler_basic" class="my-auto" data-kt-search-keypress="true"
                        data-kt-search-min-length="2" data-kt-search-enter="true" data-kt-search-layout="inline">
                        <form data-kt-search-element="form" class="w-100 position-relative shadow-sm rounded"
                            autocomplete="off">
                            <input type="hidden" />
                            <i
                                class="ki-duotone ki-magnifier fs-3 fs-lg-2 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                    class="path1"></span><span class="path2"></span></i>
                            <input type="text" class="form-control form-control-solid px-15 bg-white" name="search"
                                value="" placeholder="Search " data-kt-search-element="input" />
                            <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                data-kt-search-element="spinner">
                                <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                            </span>
                            <span
                                class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                data-kt-search-element="clear">
                            </span>
                        </form>
                    </div>
                </div>
                {{-- @if (auth()->user()->hak_akses == 'Pimpinan')
                <div class="card-toolbar">
                    <div class="ps-3 pe-5  d-flex align-items-center justify-content-end ">
                        
                        <div class="w-0 ">
                            <select name="filter" id="filter" class="form-select fs-6 w-100 shadow"
                                data-control="select2" data-hide-search="true">
                                <option value="">Status</option>
                                <option value="1"
                                    {{ request()->has('filter') ? (request()->filter == 1 ? 'selected' : false) : '' }}>
                                    Pending</option>
                                <option value="2"
                                    {{ request()->has('filter') ? (request()->filter == 2 ? 'selected' : false) : '' }}>
                                    Ditindak
                                    lanjuti</option>
                                <option value="3"
                                    {{ request()->has('filter') ? (request()->filter == 3 ? 'selected' : false) : '' }}>
                                    Tuntas
                                </option>

                            </select>
                        </div>
                    </div>

                </div>
            @endif --}}
            </div>
            <div class="card-body">
                <div class="">
                    @if (auth()->user()->hak_akses == 'Admin' ||
                            auth()->user()->hak_akses == 'P2K3' ||
                            auth()->user()->hak_akses == 'K3 Departemen')
                        <table class="table table-rounded table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="">Kode Laporan Potensi Bahaya</th>
                                    <th scope="col">Departemen</th>
                                    <th scope="col">Lokasi Potensi Bahaya</th>
                                    <th scope="col">Potensi Bahaya</th>
                                    <th scope="col">Penanggung Jawab</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investigasis as $investigasi)
                                    <tr>
                                        <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $investigasi->potensibahaya_id }}</td>
                                        <td>{{ $investigasi->departemen->name }}</td>
                                        <td>{{ $investigasi->lokasi }}</td>
                                        <td>{{ $investigasi->potensi_bahaya }}</td>
                                        <td>
                                            {{ $investigasi->p2k3_data?->nama }}
                                        </td>

                                        <td>
                                            <a href="{{ route('investigasipotensi.lihat', $investigasi->id) }}"
                                                type="button" class="btn btn-sm btn-warning px-4"><i
                                                    class="bi bi-eye text-dark pe-0"></i></a>
                                            <a href="{{ route('investigasipotensi.ubah', $investigasi->id) }}"
                                                type="button" class="btn btn-sm btn-primary px-4"><i
                                                    class="bi bi-pencil-square pe-0"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm px-4" data-bs-toggle="modal"
                                                data-bs-target="#deleteForm{{ $investigasi->id }}"><i
                                                    class="bi bi-trash pe-0"></i></button>

                                            <div class="modal fade" id="deleteForm{{ $investigasi->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered ">
                                                    <div class="modal-content">

                                                        <form method="POST"
                                                            action="{{ route('investigasipotensi.delete', $investigasi->id) }}">
                                                            @csrf
                                                            <div
                                                                class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                                <h2 class="mt-5 text-center"
                                                                    style="color: #16243D; font-size: 20px font-weight:700">
                                                                    Yakin
                                                                    data
                                                                    ingin dihapus?
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="modal-footer d-flex justify-content-center border-0">
                                                                <button type="submit"
                                                                    class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                                    style="width:76px; height:31px; background: #29CC6A;">Ya</button>
                                                                <button type="button"
                                                                    class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                                    data-bs-dismiss="modal"
                                                                    style="width:76px; height:31px; ">Tidak</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if (auth()->user()->hak_akses == 'Pimpinan')
                        <table class="table table-rounded table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col">Departemen</th>
                                    <th scope="col">Lokasi Potensi Bahaya</th>
                                    <th scope="col">Potensi Bahaya</th>
                                    <th scope="col">Penanggung Jawab</th>                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investigasis as $investigasi)
                                    <tr>
                                        <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $investigasi->departemen->name }}</td>
                                        <td>{{ $investigasi->lokasi }}</td>
                                        <td>{{ $investigasi->potensi_bahaya }}</td>
                                        <td>{{ $investigasi->p2k3_data->nama }}</td>

                                        <td>
                                            <a href="{{ route('investigasipotensi.lihat', $investigasi->id) }}"
                                                type="button" class="btn btn-sm btn-warning px-4"><i
                                                    class="bi bi-eye text-dark pe-0"></i></a>


                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editmodal" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <form action="{{ route('investigasipotensi.edit', $investigasi->id) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title" id="staticBackdropLabel">Ubah Data
                                                            Investigasi
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close" id="update"></button>
                                                    </div>

                                                    <div class="modal-body mt-5 ">
                                                        <div id="additionalForm">
                                                            <div class="ps-3 pe-5 pb-5">
                                                                <label class="col-form-label ps-2">P2K3</label>
                                                                <div class=" w-100">
                                                                    <select id="p2k3" name="p2k3"
                                                                        class="form-select fs-6 w-100"
                                                                        data-control="select2" data-hide-search="true"
                                                                        data-placeholder="p2k3">
                                                                        @foreach ($p2k3s as $p2k3)
                                                                            <option value="{{ $p2k3->id }}">
                                                                                {{ $p2k3->nama }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div id="additionalForm">
                                                                <div class="ps-3 pe-5">
                                                                    <label class="col-form-label ps-2">Status Investigasi
                                                                    </label>
                                                                    <div class=" w-100">
                                                                        <select name="status" id="status"
                                                                            class="form-select fs-6 w-100"
                                                                            data-control="select2" data-hide-search="true"
                                                                            data-placeholder="status">
                                                                            <option value="2">Investigasi
                                                                            </option>
                                                                            <option value="3">Tuntas
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="modal-footer d-flex justify-content-center border-0 mt-5">
                                                            <button type="submit"
                                                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                                style="background: #29CC6A;height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                                                Data</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
            <div class="card-footer">
                {{ $investigasis->links('pagination::customb5') }}
            </div>
        </div>
    </div>
@stop

@section('customscript')
    <script>
        $(document).on("click", "#update", function() {
            var p2k3 = $(this).attr('data-bs-p2k3');
            var status = $(this).attr('data-bs-status');
            $("#p2k3").val(p2k3).setAttribute('selected', 'selected');
            $("#status").val(status).setAttribute('selected', 'selected');

        });

        $(document).ready(function() {
            // Get the select filter element
            var selectFilter = $("#filter");

            // Get the current URL
            var currentUrl = window.location.href;

            // Bind an event handler to the change event of the select filter
            selectFilter.on("change", function() {

                const selectedValue = selectFilter.val();
                const currentURL = window.location.href;
                const url = new URL(currentURL);
                const params = new URLSearchParams(url.search);

                // Check if the "filter" parameter already exists
                if (params.has('filter')) {
                    // Update the existing "filter" parameter with the selected value
                    params.set('filter', selectedValue);
                } else {
                    // If "filter" parameter doesn't exist, add it
                    params.append('filter', selectedValue);
                }

                // Set the updated query parameters back to the URL object
                url.search = params.toString();

                // Redirect to the updated URL, which will reload the page
                window.location.href = url.toString();
            });
        });
    </script>
@stop
