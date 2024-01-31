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
                                            <h6 class="text-xs text-center font-weight-bold mb-0 text-sm">{{ $pasien->no_rm }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $pasien->nama }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Lahir</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $pasien->tgl_lahir }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bangsal</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $pasien->bangsal }}</p>
                                        </td>
                                    </tr><tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hasil Screening</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $pasien->hasil_screening}}</p>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hasil Screening</th>
                                        <td class="align-middle text-center text-sm">
                                            @if($pasien->hasil_screening === 'Positif')
                                            <span class="badge badge-sm bg-gradient-danger">{{ $pasien->hasil_screening }}</span>
                                            @elseif($pasien->hasil_screening === 'Negatif')
                                            <span class="badge badge-sm bg-gradient-success">{{ $pasien->hasil_screening }}</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-secondary">{{ $pasien->hasil_screening }}</span>
                                            @endif
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Screening</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">{{ $pasien->tgl_periksa }}</p>
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
