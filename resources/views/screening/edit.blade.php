@extends('layouts.user_type.auth')
<style>
    .hidden {
        display: none;
    }
</style>
@section('content')
<div class="container mt-4">
    <h2>RS PKU MUHAMMADIYAH GAMPING</h2>
    <p>Jl. Wates KM 5,5 Gamping, Sleman, Yogyakarta - 55294</p>

    <form action="{{ route('updateScreening', ['id' => $screening->id_screening]) }}" method="post">
        @csrf
        @method('PUT')

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <tbody>
                <tr>
                    <td><label for="id_ahligizi">Ahli Gizi:</label></td>
                    <td>
                        <select name="id_ahligizi" id="id_ahligizi" class="form-select">
                            @foreach($dataAhliGizi as $ahligizi)
                                <option value="{{ $ahligizi->id_ahligizi }}" @if($ahligizi->id_ahligizi == $screening->id_ahligizi) selected @endif>{{ $ahligizi->nama }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                <td><label for="nama_pasien">Nama Pasien:</label></td>
                                            <td>
                                                {{ $screening->pasien->nama}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                <td><label for="nama_pasien">Nomor RM:</label></td>

                                            <td>
                                               {{ $screening->pasien->no_rm }}
                                            </td>
                                        </tr>
                <tr>
                    <td><label for="risiko">Risiko:</label></td>
                    <td>
                        <select name="risiko" id="risiko" class="form-select">
                            <option value="Risiko Ringan" @if($screening->risiko == 'Risiko Ringan') selected @endif>Risiko Ringan</option>
                            <option value="Risiko Sedang" @if($screening->risiko == 'Risiko Sedang') selected @endif>Risiko Sedang</option>
                            <option value="Risiko Tinggi" @if($screening->risiko == 'Risiko Tinggi') selected @endif>Risiko Tinggi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="difabel">Difabel:</label></td>
                    <td>
                        <select name="difabel" id="difabel" class="form-select">
                            <option value="Tidak" @if($screening->difabel == 'Tidak') selected @endif>Tidak</option>
                            <option value="Ya" @if($screening->difabel == 'Ya') selected @endif>Ya</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="alergi_makanan">Alergi Makanan:</label></td>
                    <td>
                        @php
                            $alergiValues = $screening->alergi ?? [];
                        @endphp
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="telur" name="alergi[]" value="Telur" @if(in_array('Telur', $alergiValues)) checked @endif>
                            <label class="form-check-label" for="telur">Telur</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="udang" name="alergi[]" value="Udang" @if(in_array('Udang', $alergiValues)) checked @endif>
                            <label class="form-check-label" for="udang">Udang</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="susu" name="alergi[]" value="Susu sapi & produk olahannya" @if(in_array('Susu sapi & produk olahannya', $alergiValues)) checked @endif>
                            <label class="form-check-label" for="susu">Susu sapi & produk olahannya</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="ikan" name="alergi[]" value="Ikan" @if(in_array('Ikan', $alergiValues)) checked @endif>
                            <label class="form-check-label" for="ikan">Ikan</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="kacang" name="alergi[]" value="Kacang kedelai / tanah" @if(in_array('Kacang kedelai / tanah', $alergiValues)) checked @endif>
                            <label class="form-check-label" for="kacang">Kacang kedelai / tanah</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="hazelnutAlmond" name="alergi[]" value="Hazelnut/almond" @if(in_array('Hazelnut/almond', $alergiValues)) checked @endif>
                            <label class="form-check-label" for="hazelnutAlmond">Hazelnut/almond</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="glutenGandum" name="alergi[]" value="Gluten/gandum" @if(in_array('Gluten/gandum', $alergiValues)) checked @endif>
                            <label class="form-check-label" for="glutenGandum">Gluten/gandum</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="alergi[]" value="lainnya" id="alergiLainnyaCheckbox" onclick="toggleAlergiLainnya()" @if(in_array('lainnya', $alergiValues)) checked @endif>
                            <label class="form-check-label" for="alergiLainnyaCheckbox">Lainnya</label>
                            <div id="alergiLainnyaField" style="display: @if(in_array('lainnya', $alergiValues)) block @else none @endif;">
                                <label for="alergiLainnyaInput">Sebutkan :</label>
                                <input type="text" class="form-control" name="alergi_lainnya" id="alergiLainnyaInput" value="{{ $screening->alergi_lainnya }}">
                            </div>
                        </div>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td><label for="preskripsi_diet">Preskripsi Diet:</label></td>
                    <td>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="dietBiasa" name="preskripsi_diet" value="Diet Biasa" @if($screening->preskripsi_diet == 'Diet Biasa' || !$screening->preskripsi_diet) checked @endif onclick="toggleDietField()">
                            <label class="form-check-label" for="dietBiasa">Diet Biasa</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="dietKhusus" class="form-check-input" name="preskripsi_diet" value="Diet Khusus" @if(Str::contains($screening->preskripsi_diet, 'Diet Khusus')) checked @endif onclick="toggleDietField()">
                            <label for="dietKhusus" class="form-check-label">Diet Khusus</label>
                            <div id="dietKhususField" style="@if(Str::contains($screening->preskripsi_diet, 'Diet Khusus')) display: block; @else display: none; @endif">
                                <label for="dietKhususInput">Sebutkan :</label>
                                <input type="text" class="form-control" name="dietKhusus" id="dietKhususInput" value="{{ $screening->dietKhusus ?? '' }}">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="tindak_lanjut">Tindak Lanjut:</label></td>
                    <td>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="belumPerlu" name="tindak_lanjut" value="Belum Perlu" @if($screening->tindak_lanjut == 'Belum Perlu') checked @endif>
                            <label class="form-check-label" for="belumPerlu">Belum perlu Asuhan Gizi (Skrining gizi ulang 1 minggu
                                kemudian)</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="Perlu" name="tindak_lanjut" value="Perlu" @if($screening->tindak_lanjut == 'Perlu') checked @endif>
                            <label class="form-check-label" for="Perlu">Perlu Asuhan Gizi Dilanjutkan ke point asesmen gizi
                                lanjutan</label>
                        </div>
                    </td>
                </tr>
                <tr id="asuhan_gizi_lanjutan" @if(old('tindak_lanjut', $screening->tindak_lanjut) != 'Perlu') class="hidden" @endif>
                        <td colspan="2">
                            <h3>ASUHAN GIZI LANJUTAN</h3>
                            <div class="row">
                                <p class="font-weight-bold">6. Antropometri:</p>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Berat Badan:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="berat_badan" placeholder="Berat Badan" value="{{ $screening->antropometri->berat_badan ?? '' }}">
                                            <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>LILA:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="lila" placeholder="Lingkar Lengan Atas" value="{{ $screening->antropometri->lila ?? '' }}">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tinggi Lutut:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="tinggilutut" placeholder="Tinggi Lutut" value="{{ $screening->antropometri->tinggilutut ?? '' }}">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tinggi Badan:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="tinggi_badan" placeholder="Tinggi Badan" value="{{ $screening->antropometri->tinggi_badan ?? '' }}">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>IMT:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="imt" placeholder="Indeks Massa Tubuh" value="{{ $screening->antropometri->imt ?? '' }}">
                                            <span class="input-group-text">kg/m2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="font-weight-bold">7. Biokimia:</p>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>HB:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="hb" placeholder="HB" value="{{ $screening->biokimia->hb ?? '' }}">
                                            <span class="input-group-text">g/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>GDS:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="gds" placeholder="GDS" value="{{ $screening->biokimia->gds ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kolesterol:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="kolesterol" placeholder="Kolesterol" value="{{ $screening->biokimia->kolesterol ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Trigliserit:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="trigliserit" placeholder="Trigliserit" value="{{ $screening->biokimia->trigliserit ?? '' }}">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>SGOT:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="sgot" placeholder="SGOT" value="{{ $screening->biokimia->sgot ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SGPT:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="sgpt" placeholder="SGPT" value="{{ $screening->biokimia->sgpt ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Albumin:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="albumin" placeholder="Albumin" value="{{ $screening->biokimia->albumin ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ureum:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ureum" placeholder="Ureum" value="{{ $screening->biokimia->ureum?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kreatinin:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="kreatinin" placeholder="Kreatinin" value="{{ $screening->biokimia->kreatinin?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="font-weight-bold">7. Biokimia:</p>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>HB:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="hb" placeholder="HB" value="{{ $screening->biokimia->hb ?? '' }}">
                                            <span class="input-group-text">g/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>GDS:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="gds" placeholder="GDS" value="{{ $screening->biokimia->gds ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kolesterol:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="kolesterol" placeholder="Kolesterol" value="{{ $screening->biokimia->kolesterol ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Trigliserit:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="trigliserit" placeholder="Trigliserit" value="{{ $screening->biokimia->trigliserit ?? '' }}">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>SGOT:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="sgot" placeholder="SGOT" value="{{ $screening->biokimia->sgot ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SGPT:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="sgpt" placeholder="SGPT" value="{{ $screening->biokimia->sgpt ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Albumin:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="albumin" placeholder="Albumin" value="{{ $screening->biokimia->albumin ?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ureum:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ureum" placeholder="Ureum" value="{{ $screening->biokimia->ureum?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kreatinin:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="kreatinin" placeholder="Kreatinin" value="{{ $screening->biokimia->kreatinin?? '' }}">
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                8. Fisik / Klinis:
                                            </th>
                                            <td>
                                                <div class="form-check">
                                                    @php
                                                        $klinisValues = is_array($screening->klinisValues) ? $screening->klinisValues : [];
                                                    @endphp

                                                    <p class="font-weight-bold mb-1">Kondisi Fisik:</p>
                                                    @foreach(['Atropi otot lengan', 'Odema', 'Hilang lemak subkutan'] as $label)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="{{ strtolower(str_replace(' ', '_', $label)) }}" name="klinis[]" value="{{ $label }}" @if(in_array($label, $klinisValues)) checked @endif>
                                                            <label class="form-check-label" for="{{ strtolower(str_replace(' ', '_', $label)) }}">{{ $label }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Gangguan Gastrointestinal:
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    @php
                                                        $gastrointestinalValues = is_array($screening->gangguanGastrointestinalValues) ? $screening->gangguanGastrointestinalValues : [];
                                                    @endphp
                                                    <p class="font-weight-bold mb-1">Gangguan Gastrointestinal:</p>
                                                    @foreach(['Anoreksia', 'Mual', 'Muntah', 'Kesulitan menelan', 'Kesulitan mengunyah', 'Diare', 'Gangguan gigi geligi', 'Konstipasi'] as $label)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="{{ strtolower(str_replace(' ', '_', $label)) }}" name="gangguan_gastrointestinal[]" value="{{ $label }}" @if(in_array($label, $gastrointestinalValues)) checked @endif>
                                                            <label class="form-check-label" for="{{ strtolower(str_replace(' ', '_', $label)) }}">{{ $label }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Kondisi</td>
                                            <td>
                                                <label>Tekanan Darah:</label>
                                                <div class="input-group">
                                                            <input type="text" class="form-control" name="tekanan_darah" placeholder="Tekanan Darah" value="{{ $screening->fisik->tekanan_darah ?? '' }}">
                                                            <span class="input-group-text">mmHg</span>
                                                        </div>
                                            </td>
                                            <td>
                                                <label>Respirasi:</label>
                                                <div class="input-group">
                                                            <input type="text" class="form-control" name="respirasi" placeholder="Respirasi" value="{{ $screening->fisik->respirasi ?? '' }}">
                                                            <span class="input-group-text">x / menit</span>
                                                        </div>
                                            </td>
                                            <td>
                                                <label>Nadi:</label>
                                                <div class="input-group">
                                                            <input type="text" class="form-control" name="nadi" placeholder="Nadi" value="{{ $screening->fisik->nadi ?? '' }}">
                                                            <span class="input-group-text">x / menit</span>
                                                        </div>
                                            </td>
                                            <td>
                                                <label>Suhu:</label>
                                                <div class="input-group">
                                                            <input type="text" class="form-control" name="suhu" placeholder="Suhu" value="{{ $screening->fisik->suhu ?? '' }}">
                                                            <span class="input-group-text">°C</span>
                                                        </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>9. Riwayat Gizi:</th>
                                            <td colspan="6">
                                                <label>Pola Makan:</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="pola_makan" placeholder="Pola Makan" value="{{ $screening->gizi->pola_makan ?? '' }}">
                                                </div>

                                                <label>Kebiasaan Minum:</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="kebiasaan_minum" placeholder="Kebiasaan Minum" value="{{ $screening->gizi->kebiasaan_minum ?? '' }}">
                                                </div>

                                                <label>Konsumsi Makanan Selingan:</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="makanan_selingan" placeholder="Makanan Selingan" value="{{ $screening->gizi->makanan_selingan ?? '' }}">
                                                </div>

                                                <label>Diit yang sudah dijalankan SMRS:</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="diit_smrs" placeholder="Diit yang sudah dijalankan SMRS" value="{{ $screening->gizi->diit_smrs ?? '' }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Penggunaan BTM:
                                            </td>
                                            <td>
                                                
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="btm"  placeholder="Isi Tidak atau Ya:(Sebutkan)" value="{{ $screening->gizi->btm ?? '' }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Penggunaan suplemen:
                                            </td>
                                            <td>
                                                
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="suplemen"  placeholder="Isi Tidak atau Ya:(Sebutkan)" value="{{ $screening->gizi->suplemen ?? '' }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Aktifitas Fisik:</td>
                                            <td>
                                                <select name="aktivitas_fisik" id="aktivitas_fisik" class="form-select">
                                                    <option value="Bed Rest" @if($screening->aktivitas_fisik == 'Bed Rest') selected @endif>Bed Rest</option>
                                                    <option value="Ringan" @if($screening->aktivitas_fisik == 'Ringan') selected @endif>Ringan</option>
                                                    <option value="Sedang" @if($screening->aktivitas_fisik == 'Sedang') selected @endif>Sedang</option>
                                                    <option value="Berat" @if($screening->aktivitas_fisik == 'Berat') selected @endif>Berat</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Konseling gizi:
                                            </td>
                                            <td>
                                                
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="konseling_gizi"  placeholder="Isi Belum atau Pernah:(Sebutkan)" value="{{ $screening->gizi->konseling_gizi ?? '' }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>10. Riwayat Personal:</th>
                                            <td colspan="6">
                                                <div class="form-group">
                                                    @php
                                                        $riwayat_personal = $screening->riwayat_personal ?? '';
                                                        $default_riwayat_personal = "Mobilitas: \nKeterbatasan Fisik: \nRiwayat Penyakit Personal: \nRiwayat Penyakit Keluarga: ";
                                                        $formatted_riwayat_personal = $riwayat_personal ? $riwayat_personal : $default_riwayat_personal;
                                                    @endphp
                                                    <textarea id="riwayat_personal" name="riwayat_personal" rows="8" class="form-control">{{ $formatted_riwayat_personal }}</textarea>
                                                </div>
                                            </td>
                                        </tr>




                                        <tr>
                                            <th>11. Diagnosis Gizi:</th>
                                            <td colspan="6">
                                                <div class="form-group">
                                                    <textarea id="diagnosis_gizi" name="diagnosis_gizi" rows="8" class="form-control">{{ $screening->diagnosis_gizi ?? '' }}</textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>12. Intervensi Gizi:</th>
                                            <td colspan="6">
                                                <div class="form-group">
                                                    @php
                                                        $intervensi_gizi = $screening->intervensi_gizi ?? '';
                                                        $default_intervensi_gizi = "Tujuan Diet: \nKeterbatasan Fisik: \nPreskripsi Diet: \nKebutuhan Zat Gizi:";
                                                        $formatted_intervensi_gizi = $intervensi_gizi ? $intervensi_gizi : $default_intervensi_gizi;
                                                    @endphp
                                                    <textarea id="intervensi_gizi" name="intervensi_gizi" rows="8" class="form-control">{{ $formatted_intervensi_gizi }}</textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>13. Rencana Monitoring<br>dan Evaluasi Gizi:</th>
                                            <td colspan="6">
                                                <div class="form-group">
                                                    @php
                                                        $rencana_monitoring = $screening->rencana_monitoring ?? '';
                                                        $default_rencana_monitoring = "Parameter yang dimonitor: \nEvaluasi: \nTarget akhir intervensi: ";
                                                        $formatted_rencana_monitoring = $rencana_monitoring ? $rencana_monitoring : $default_rencana_monitoring;
                                                    @endphp
                                                    <textarea id="rencana_monitoring" name="rencana_monitoring" rows="8" class="form-control">{{ $formatted_rencana_monitoring }}</textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                <!-- </div> -->

            </tbody>
        </table>
        
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    var dataPasien = @json($dataPasien);

    function changeNoRM() {
        var selectedNama = document.getElementById("id_pasien").value;
        var noRMDropdown = document.getElementById("noRM");

        noRMDropdown.innerHTML = '<option value="">Pilih No. RM</option>';

        for (var i = 0; i < dataPasien.length; i++) {
            if (dataPasien[i].id == selectedNama) {
                var option = document.createElement("option");
                option.text = dataPasien[i].no_rm;
                option.value = dataPasien[i].no_rm;
                noRMDropdown.appendChild(option);
            }
        }
    }
</script>
<script>
        function toggleDietField() {
            var dietKhususField = document.getElementById('dietKhususField');
            var dietKhususInput = document.getElementById('dietKhususInput');

            if (document.getElementById('dietBiasa').checked) {
                dietKhususField.style.display = 'none';
                dietKhususInput.value = '';
            } else {
                dietKhususField.style.display = 'block';
            }
        }
</script>
<script>
    $(document).ready(function () {
        $('input[type="radio"][name="tindak_lanjut"]').change(function () {
            if ($(this).val() === "Perlu") {
                $('#asuhan_gizi_lanjutan').removeClass('hidden');
            } else {
                $('#asuhan_gizi_lanjutan').addClass('hidden');
            }
        });
    });
</script>
@endsection
