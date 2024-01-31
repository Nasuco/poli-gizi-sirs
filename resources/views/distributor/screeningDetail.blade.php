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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. RM</th>
                                        <td>
                                            <h6 class="text-xs text-center font-weight-bold mb-0 text-sm">{{ $screening->pasien->no_rm }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->nama}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Lahir</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->tgl_lahir }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bangsal</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->bangsal }}</p>
                                        </td>
                                    </tr><tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hasil Screening</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->hasil_screening}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Waktu Screening</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->created_at }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rencana Monitoring</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->rencana_monitoring }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Diagnosis Medis</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->diagnosis_medis }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Risiko</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->risiko }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Difabel</th>
                                        <td>
                                            @if($screening->difabel == 1)
                                            <p class="text-xs text-center font-weight-bold mb-0">Ya</p>
                                            @else
                                            <p class="text-xs text-center font-weight-bold mb-0">Tidak</p>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alergi Makanan</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->alergi_makanan }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Preskripsi Diet</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->preskripsi_diet }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tindak Lanjut</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->tindak_lanjut }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Antropometri BB</th>
                                        <td>
                                            @if($screening->antropometri == null)
                                            <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Antropometri tidak diisi</p>
                                            @else
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->antropometri->bb }} kg</p>
                                            @endif
                                        </td>                                    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="text-end mt-3">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Close</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
