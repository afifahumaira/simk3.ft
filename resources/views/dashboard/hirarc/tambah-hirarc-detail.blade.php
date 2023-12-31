@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">
        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Tambah Data HIRADC</h2>
                    <a href="{{ route('hirarc.index') }}" type="button"
                        class="btn text-white btn-secondary btn-sm d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; "><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                {{-- <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari tambah data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('hirarc.index') }}" type="button"
                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                        style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                    <button type="button"
                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                        data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-title  gap-1 mx-5 my-5  ">
                    <div id="kt_app_content"
                        class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                        <div class="card bg-light">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong
                                        style="color: #16243D; font-family: Plus Jakarta Sans, sans-serif; font-size:16px;">Data
                                        HIRADC</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('hirarc.save') }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Pilih Departemen</label>
                                        <div class=" w-100">
                                            <select name="departemen_id" id="departemen_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Pilih Departemen">
                                                <option value="">Pilih Departemen</option>
                                                @foreach ($departments as $dep)
                                                    <option value="{{ $dep->id }}"
                                                        {{ old('departemen_id') == $dep->name ? 'selected' : '' }}>
                                                        {{ $dep->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label for="location_id" class="form-label">Pilih Lokasi:</label>
                                        <select id="location_id" name="location_id" class="form-select"
                                            data-placeholder="Pilih Departemen Terlebih Dahulu">

                                        </select>
                                    </div>
                                    <div id="additionalForm">
                                        <div class="ps-3 pe-5 ">
                                            <label for="activitie_id" class="form-label">Pilih Aktifitas:</label>
                                            <select id="activitie_id" name="activitie" class="form-select"
                                                data-control="select2">
                                                <option value="">Pilih Aktifitas
                                                </option>
                                                @foreach ($activitie as $act)
                                                    <option value="{{ $act->name }}"
                                                        {{ old('activitie') == $act->name ? 'selected' : '' }}>
                                                        {{ $act->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div id="additionalForm">
                                        <div class="ps-3 pe-5">
                                            <label for="hazard_id" class="form-label">Pilih
                                                Hazard:</label>
                                            <select id="hazard_id" name="hazard" class="form-select"
                                                data-control="select2">
                                                <option value="">Pilih Hazard
                                                </option>
                                                @foreach ($hazard as $haz)
                                                    <option value="{{ $haz->name }}"
                                                        {{ old('hazard') == $haz->name ? 'selected' : '' }}>
                                                        {{ $haz->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div id="additionalForm">
                                        <div class="ps-3 pe-5">
                                            <label for="risk_id" class="form-label">Pilih
                                                Risiko:</label>
                                            <select id="risk_id" name="risk" class="form-select"
                                                data-control="select2">
                                                <option value="">Pilih Risiko
                                                </option>
                                                @foreach ($risk as $ris)
                                                    <option value="{{ $ris->name }}"
                                                        {{ old('risk') == $ris->name ? 'selected' : '' }}>
                                                        {{ $ris->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Sesuai dengan peraturan
                                            pemerintah</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="N/A"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name="kesesuaian"
                                                id="kesesuaian" style="font-family: 'Inter';">
                                                <option value="">- Pilih -</option>
                                                <option value="1" {{ old('kesesuaian') == 1 ? 'selected' : '' }}>Yes
                                                </option>
                                                <option value="2" {{ old('kesesuaian') == 2 ? 'selected' : '' }}>No
                                                </option>
                                                <option value="3" {{ old('kesesuaian') == 3 ? 'selected' : '' }}>Not
                                                    Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kondisi</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="Normal"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name="kondisi"
                                                id="kondisi" style="font-family: 'Inter';">
                                                <option value="">- Pilih -</option>
                                                <option value="1" {{ old('kondisi') == 1 ? 'selected' : '' }}>Normal
                                                </option>
                                                <option value="2" {{ old('kondisi') == 2 ? 'selected' : '' }}>Not
                                                    Normal</option>
                                                <option value="3" {{ old('kondisi') == 3 ? 'selected' : '' }}>
                                                    Emergency</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Pengendalian</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="kendali" id="kendali"
                                                value="{{ old('kendali', request()->input('kendali')) }}">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label d-flex" for="select1">Keparahan Risiko
                                            Saat Ini <p class="ms-1 mb-0" style="font-style: italic"> (Severity)</p>
                                            </label>
                                        <select class="form-control" id="current_severity" onchange="risk_rating()"
                                            name="current_severity" data-control="select2" data-hide-search="true"
                                            data-placeholder="Pilih Keparahan Risiko
                                    (severity)">
                                            <option value="" selected disabled>Pilih
                                                Keparahan
                                                (severity)</option>
                                            <option value="1" {{ old('current_severity') == 1 ? 'selected' : '' }}>
                                                [1] Tergores, sayatan kecil, kerugian dalam rupiah
                                                sebesar
                                                Rp 1.000.000,-
                                            </option>
                                            <option value="3" {{ old('current_severity') == 3 ? 'selected' : '' }}>
                                                [3] Cidera menyebabkan absen
                                                maksimal 3
                                                hari, kerugian
                                                dalam rupiah sebesar Rp 10.000.000,-</option>
                                            <option value="7" {{ old('current_severity') == 7 ? 'selected' : '' }}>
                                                [7] Cidera menyebabkan absen
                                                lebih dari
                                                3 hari, kerugian
                                                dalam rupiah sebesar Rp 50.000.000,-</option>
                                            <option value="15" {{ old('current_severity') == 15 ? 'selected' : '' }}>
                                                [15] Cacat sementara, butuh rawat inap, kerugian
                                                dalam rupiah
                                                sebesar Rp
                                                100.000.000,-</option>
                                            <option value="40" {{ old('current_severity') == 40 ? 'selected' : '' }}>
                                                [40] Cidera serius atau sampai kematian, kerugian
                                                dalam
                                                rupiah sebesar Rp
                                                1.000.000.000,-</option>
                                        </select>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label d-flex">Paparan Risiko
                                            Saat Ini <p class="ms-1 mb-0" style="font-style: italic"> (Exposure)</p>
                                            </label>
                                        <select class="form-control" id="current_exposure" onchange="risk_rating()"
                                            name="current_exposure" data-control="select2" data-hide-search="true"
                                            data-placeholder="Pilih Paparan Risiko (Exposure)">
                                            <option value="" selected disabled>Pilih
                                                Paparan
                                                (Exposure)</option>
                                            <option value="0.5" {{ old('current_exposure') == 0.5 ? 'selected' : '' }}>
                                                [0.5] 1 kali dalam setahun
                                            </option>
                                            <option value="1" {{ old('current_exposure') == 1 ? 'selected' : '' }}>
                                                [1] Beberapa kali dalam setahun
                                            </option>
                                            <option value="2" {{ old('current_exposure') == 2 ? 'selected' : '' }}>
                                                [2] 1 kali sebulan</option>
                                            <option value="3" {{ old('current_exposure') == 3 ? 'selected' : '' }}>
                                                [3] 1 kali dalam seminggu
                                            </option>
                                            <option value="6" {{ old('current_exposure') == 6 ? 'selected' : '' }}>
                                                [6] 1 kali dalam sehari</option>
                                            <option value="10" {{ old('current_exposure') == 10 ? 'selected' : '' }}>
                                                [10] Berkelanjutan</option>
                                        </select>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label d-flex">Kemungkinan Risiko
                                            Terjadi Saat Ini <p class="ms-1 mb-0" style="font-style: italic">
                                                (Probability)
                                            </p></label>
                                        <select class="form-control" onchange="risk_rating()" id="current_probability"
                                            name="current_probability" data-control="select2" data-hide-search="true"
                                            data-placeholder="Pilih Kemungkinan Risiko Terjadi (Probability)">
                                            <option value="" selected disabled>Pilih Kemungkinan Terjadi
                                                (Probability)</option>
                                            <option value="1"
                                                {{ old('current_probability') == 1 ? 'selected' : '' }}>
                                                [1] Kejadian yang secara teori hanya mungkin terjadi
                                            </option>
                                            <option value="3"
                                                {{ old('current_probability') == 3 ? 'selected' : '' }}>
                                                [3] mungkin terjadi sekali dalam
                                                10
                                                tahun</option>
                                            <option value="6"
                                                {{ old('current_probability') == 6 ? 'selected' : '' }}>
                                                [6] Kejadian yang jarang tetapi
                                                dapat
                                                sesekali terjadi
                                            </option>
                                            <option value="10"
                                                {{ old('current_probability') == 10 ? 'selected' : '' }}>
                                                [10] Peristiwa berulang setidaknya sekali dalam
                                                setahun
                                            </option>
                                        </select>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Tingkat Risiko Saat Ini</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name=""
                                                id="current_risk_rating"
                                                value="{{ old('current_risk_rating', request()->input('current_risk_rating')) }}"
                                                readonly disabled>
                                            <input type="hidden" name="current_risk_rating" id="current_risk_rating1">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kategori Risiko Saat Ini
                                        </label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="Pilih Kategori Risiko Saat Ini"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name=""
                                                id="current_risk_category"
                                                style="font-family: Arial, Helvetica, sans-serif;" required disabled>
                                                <option value=""></option>
                                                <option value="1"
                                                    {{ old('current_risk_category') == 1 ? 'selected' : '' }}>Slight
                                                </option>
                                                <option value="2"
                                                    {{ old('current_risk_category') == 2 ? 'selected' : '' }}>Low</option>
                                                <option value="3"
                                                    {{ old('current_risk_category') == 3 ? 'selected' : '' }}>Medium
                                                </option>
                                                <option value="4"
                                                    {{ old('current_risk_category') == 4 ? 'selected' : '' }}>High</option>
                                                <option value="5"
                                                    {{ old('current_risk_category') == 5 ? 'selected' : '' }}>Very High
                                                </option>
                                            </select>
                                            <input type="hidden" name="current_risk_category"
                                                id="current_risk_category1">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Penyebab Utama</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="penyebab" id="penyebab"
                                                value="{{ old('penyebab', request()->input('penyebab')) }}">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Usulan</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="usulan" id="usulan"
                                                value="{{ old('usulan', request()->input('usulan')) }}">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Formulir yang Dibutuhkan</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="form_diperlukan"
                                                id="form_diperlukan"
                                                value="{{ old('form_diperlukan', request()->input('form_diperlukan')) }}">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">SOP</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="sop" id="sop"
                                                value="{{ old('sop', request()->input('sop')) }}">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label d-flex">Keparahan
                                            Residual <p class=" ms-1" style="font-style: italic">(Severity)</p></label>
                                        <select class="form-control" onchange="risk_residual()" id="residual_severity"
                                            name="residual_severity" data-control="select2" data-hide-search="true"
                                            data-placeholder="Keparahan (Severity)">
                                            <option value="" selected disable>Keparahan
                                                <p class="ms-1 mb-0" style="font-style: italic">(Severity)</p>
                                            </option>
                                            <option value="1" {{ old('residual_severity') == 1 ? 'selected' : '' }}>
                                                [1] Tergores, sayatan kecil, kerugian dalam rupiah
                                                sebesar
                                                Rp 1.000.000,-
                                            </option>
                                            <option value="3" {{ old('residual_severity') == 3 ? 'selected' : '' }}>
                                                [3] Cidera menyebabkan absen
                                                maksimal 3
                                                hari, kerugian
                                                dalam rupiah sebesar Rp 10.000.000,-</option>
                                            <option value="7" {{ old('residual_severity') == 7 ? 'selected' : '' }}>
                                                [7] Cidera menyebabkan absen
                                                lebih dari
                                                3 hari, kerugian
                                                dalam rupiah sebesar Rp 50.000.000,-</option>
                                            <option value="15" {{ old('residual_severity') == 15 ? 'selected' : '' }}>
                                                [15] Cacat sementara, butuh rawat inap, kerugian
                                                dalam rupiah
                                                sebesar Rp
                                                100.000.000,-</option>
                                            <option value="40" {{ old('residual_severity') == 40 ? 'selected' : '' }}>
                                                [40] Cidera serius atau sampai kematian, kerugian
                                                dalam
                                                rupiah sebesar Rp
                                                1.000.000.000,-</option>
                                        </select>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label d-flex">Paparan Risiko
                                            Residual <p class="ms-1 mb-0" style="font-style: italic">(Exposure)</p>
                                            </label>
                                        <select class="form-control" onchange="risk_residual()" id="residual_exposure"
                                            name="residual_exposure" data-control="select2" data-hide-search="true"
                                            data-placeholder="Paparan (Exposure)">
                                            <option value="" selected disable>Paparan
                                                (Exposure)</option>
                                            <option value="0.5"
                                                {{ old('residual_exposure') == 0.5 ? 'selected' : '' }}>[0.5] 1 kali dalam
                                                setahun
                                            </option>
                                            <option value="1" {{ old('residual_exposure') == 1 ? 'selected' : '' }}>
                                                [1] eberapa kali dalam setahun
                                            </option>
                                            <option value="2" {{ old('residual_exposure') == 2 ? 'selected' : '' }}>
                                                [2] 1 kali sebulan</option>
                                            <option value="3" {{ old('residual_exposure') == 3 ? 'selected' : '' }}>
                                                [3] 1 kali dalam seminggu
                                            </option>
                                            <option value="6" {{ old('residual_exposure') == 6 ? 'selected' : '' }}>
                                                [6] 1 kali dalam sehari</option>
                                            <option value="10" {{ old('residual_exposure') == 10 ? 'selected' : '' }}>
                                                [10] Berkelanjutan</option>
                                        </select>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label d-flex">Kemungkinan Risiko
                                            Terjadi Residual <p class="ms-1 mb-0" style="font-style: italic">(Probability)
                                            </p></label>
                                        <select class="form-control" id="residual_probability" onchange="risk_residual()"
                                            name="residual_probability" data-control="select2" data-hide-search="true"
                                            data-placeholder="Kemungkinan Terjadi (Probability)">
                                            <option value="" selected disable>Kemungkinan
                                                Terjadi (Probability)</option>
                                            <option value="1"
                                                {{ old('residual_probability') == 1 ? 'selected' : '' }}>
                                                [1] Kejadian yang secara teori hanya mungkin terjadi
                                            </option>
                                            <option value="3"
                                                {{ old('residual_probability') == 3 ? 'selected' : '' }}>
                                                [3] Mungkin terjadi sekali dalam
                                                10
                                                tahun</option>
                                            <option value="6"
                                                {{ old('residual_probability') == 6 ? 'selected' : '' }}>
                                                [6] Kejadian yang jarang tetapi
                                                dapat
                                                sesekali terjadi
                                            </option>
                                            <option value="10"
                                                {{ old('residual_probability') == 10 ? 'selected' : '' }}>
                                                [10] Peristiwa berulang setidaknya sekali dalam
                                                setahun
                                            </option>
                                        </select>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Tingkat Risiko Residual</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name=""
                                                id="residual_risk_rating"
                                                value="{{ old('residual_risk_rating', request()->input('residual_risk_rating1')) }}"
                                                readonly disabled>
                                            <input type="hidden" name="residual_risk_rating" id="residual_risk_rating1">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kategori Risiko Residual</label>
                                        <div class=" w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="Pilih Kategori Risiko Residual"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name=""
                                                id="residual_risk_category"
                                                style="font-family: Arial, Helvetica, sans-serif;" required disabled>
                                                <option value=""></option>
                                                <option value="1"
                                                    {{ old('residual_risk_category1') == 1 ? 'selected' : '' }}>Slight
                                                </option>
                                                <option value="2"
                                                    {{ old('residual_risk_category1') == 2 ? 'selected' : '' }}>Low
                                                </option>
                                                <option value="3"
                                                    {{ old('residual_risk_category1') == 3 ? 'selected' : '' }}>Medium
                                                </option>
                                                <option value="4"
                                                    {{ old('residual_risk_category1') == 4 ? 'selected' : '' }}>High
                                                </option>
                                                <option value="5"
                                                    {{ old('residual_risk_category1') == 5 ? 'selected' : '' }}>Very High
                                                </option>
                                            </select>
                                            <input type="hidden" name="residual_risk_category"
                                                id="residual_risk_category1">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Penanggung Jawab </label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="penanggung_jawab"
                                                id="penanggung_jawab"
                                                value="{{ old('penanggung_jawab', request()->input('penanggung_jawab')) }}">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Status</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="status" id="status"
                                                value="{{ old('status', request()->input('status')) }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center border-0">
                                        <div class=" d-flex justify-content-center">
                                            <button type="submit" id="simpanHirarc"
                                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                                data-bs-toggle="modal" data-bs-target="#simpandata">Simpan
                                                Data</button>
                                            <a href="{{ route('hirarc.index') }}" type="submit"
                                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#resetform"
                                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id">
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <a href="{{ route('laporan-insiden.tambah') }}" type="submit"
                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal" data-bs-target="#resetform"
                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px;height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                            <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">
                                        <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                            <h2 class="mt-5 text-center"
                                                style="color: #16243D; font-size: 20px font-weight:700">keluar dari tambah
                                                data?
                                                <p class="mb-0 mt-2 text-center "
                                                    style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                                    dimasukkan belum tersimpan </p>
                                            </h2>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center border-0">
                                            <a href="{{ route('laporan-insiden.tambah') }}" type="button"
                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                            <button type="button"
                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                </div>
            </div>
            </form>
        </div>
    </div>
    <!--end::Content container-->
    </div>
    </div>
@stop
@section('customscript')
    <script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".tanggalPicker").flatpickr({
                altInput: true,
                altFormat: "d F Y",
                dateFormat: "Y-m-d",
                locale: "id"
            });
        });

        function risk_cat(value, text) {
            var x = document.getElementById("current_risk_category");
            // console.log(value);
            test = document.getElementById("current_risk_category1")
            test.value = value
            // console.log(test.value)
            var option = document.createElement("option");
            option.value = value;
            option.text = text;
            option.selected = "selected";
            x.add(option);
            // var x = document.getElementById("opt_current_cat");
            // x.value = value;
            // x.text = text
        }

        function residual_cat(value, text) {
            var x = document.getElementById("residual_risk_category");
            test = document.getElementById("residual_risk_category1")
            test.value = value
            var option = document.createElement("option");
            option.value = value;
            option.text = text;
            option.selected = "selected";
            x.add(option);
            // const x = document.getElementById("opt_residual_cat");
            // x.value = value;
            // x.text = text
        }

        function risk_rating() {
            var severity = document.getElementById("current_severity").value;
            var exposure = document.getElementById("current_exposure").value;
            var proby = document.getElementById("current_probability").value;
            var risk_rating = severity * exposure * proby;
            document.getElementById("current_risk_rating").value = risk_rating;
            document.getElementById("current_risk_rating1").value = risk_rating;
            if (risk_rating <= "20") {

                // $('.selDiv option:contains("Selection 1")');
                // $('#current_risk_category option[value="1"]');
                risk_cat("1", "Slight", "select");
            } else if (risk_rating >= "21" && risk_rating <= "70") {
                risk_cat("2", "Low", "select");
            } else if (risk_rating >= "71" && risk_rating <= "200") {
                risk_cat("3", "Medium", "select");
            } else if (risk_rating >= "201" && risk_rating <= "400") {
                risk_cat("4", "High", "select");
            } else {
                risk_cat("5", "Very High", "select");
            }
        }

        function risk_residual() {
            var severity = document.getElementById("residual_severity").value;
            var exposure = document.getElementById("residual_exposure").value;
            var proby = document.getElementById("residual_probability").value;
            var risk_rating = severity * exposure * proby;
            document.getElementById("residual_risk_rating").value = risk_rating;
            document.getElementById("residual_risk_rating1").value = risk_rating;
            if (risk_rating <= "20") {
                residual_cat("1", "Slight", "select");
            } else if (risk_rating >= "21" && risk_rating <= "70") {
                residual_cat("2", "Low", "select");
            } else if (risk_rating >= "71" && risk_rating <= "200") {
                residual_cat("3", "Medium", "select");
            } else if (risk_rating => "201" && risk_rating <= "400") {
                residual_cat("4", "High", "select");
            } else {
                residual_cat("5", "Very High");
            }
        }
    </script>
    <script>
        $('#departemen_id').on('change', function() {
            var id = this.value;
            var locationSelect = $('#location_id');
            var url = '{{ route('hirarc.location') }}' + "?id=" + id;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    locationSelect.empty();
                    $.each(data.loct, function(index, location) {
                        locationSelect.append($('<option>', {
                            value: location.id,
                            text: location.name
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.log("AJAX Error: " + error);
                }
            });
        });
    </script>
@stop
