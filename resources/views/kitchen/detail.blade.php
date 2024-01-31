@extends('layouts.user_type.auth')

@section('title', $title)

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Detail Menu Makan Pasien</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                        <div class="table-responsive p-0">
                            <table class="table table-hover align-items-center mb-0">
                                <tbody>
                                    <tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No. RM</th>
                                        <td>
                                            <h6 class="text-xs text-center font-weight-bold mb-0 text-sm">
                                                {{ $pasien->pasien->no_rm }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $pasien->pasien->nama }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Lahir</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $pasien->pasien->tgl_lahir }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Bangsal</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $pasien->pasien->bangsal }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Alergi</th>
                                        <td>
                                            @if($pasien->alergi_makanan == NULL)
                                                <p class="text-xs text-center font-weight-bold mb-0">Tidak ada alergi
                                                </p>
                                            @else
                                                <p class="text-xs text-center font-weight-bold mb-0">
                                                    {{ $pasien->alergi_makanan }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Menu Makan</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $pasien->hasil_screening }}</p>
                                        </td>
                                    </tr> -->
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Screening</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $pasien->created_at }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Diagnosis Gizi</th>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                {{ $pasien->diagnosis_gizi }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <form
                                            action="{{ route('kitchen.detail', ['id' => $pasien->id_screening]) }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Status Makanan</th>
                                            <td>
                                                <select class="form-control" name="status" id="status">
                                                    @if($pasien->statusMakanan == 1)
                                                        <option value="1" selected>Sudah Dimasak</option>
                                                        <option value="0">Belum Dimasak</option>
                                                    @else
                                                        <option value="1">Sudah Dimasak</option>
                                                        <option value="0" selected>Belum Dimasak</option>
                                                    @endif
                                                </select>
                                            </td>

                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Keterangan</th>
                                        <td>
                                            <textarea class="form-control" name="keterangan" id="keterangan"
                                                rows="3">{{ $pasien->keterangan }}</textarea>
                                        </td>
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <div>
                                <a href="{{ route('kitchen.menumakan') }}"
                                    class="btn btn-secondary btn-sm me-2">Back</a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                <a href="{{ route('kitchen.print', ['id' => $pasien->id_screening]) }}"
                                    class="btn btn-warning btn-sm me-2" target="_blank">Print</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
