@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Detail Pasien</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No. RM</th>
                                        <td>
                                            <h6 class="text-xs text-center font-weight-bold mb-0 text-sm">
                                                {{ $makananProsesdetail->pasien->no_rm }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $makananProsesdetail->pasien->nama }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Lahir</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $makananProsesdetail->pasien->tgl_lahir }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Bangsal</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $makananProsesdetail->pasien->bangsal }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Alergi Makanan</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $makananProsesdetail->alergi_makanan }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Screening</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $makananProsesdetail->pasien->tgl_periksa }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Diagnosis Gizi</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $makananProsesdetail->diagnosis_gizi }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tindak Lanjut</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $makananProsesdetail->tindak_lanjut }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Keterangan</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $makananProsesdetail->keterangan }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <form
                                            action="{{ route('distributor.makananProsesDetail', ['id' => $makananProsesdetail->id_screening]) }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Status Pengiriman</th>
                                                <td>
                                            <select class="form-control" name="status" id="status">
                                                <option value="@if($makananProsesdetail->statusPengantaran == 0) 0 @else 1 @endif">@if($makananProsesdetail->statusPengantaran == 0) Belum Diantarkan @else Sudah Diantarkan @endif</option>
                                                <option value="@if($makananProsesdetail->statusPengantaran == 0) 1 @else 0 @endif">@if($makananProsesdetail->statusPengantaran == 0) Sudah Diantarkan @else Belum Diantarkan @endif</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('distributor.makananProses') }}"
                                class="btn btn-secondary">Kembali</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

@endsection
