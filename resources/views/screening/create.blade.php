@extends('layouts.user_type.auth')
<style>
    .hidden {
        display: none;
    }

    th {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>
@section('content')
<div class="container mt-4">
    <h2>RS PKU MUHAMMADIYAH GAMPING</h2>
    <p>Jl. Wates KM 5,5 Gamping, Sleman, Yogyakarta - 55294</p>

    <form action="{{ route('storeScreening') }}" method="post">
        @csrf
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
                        <select name="id_ahligizi" id="id_ahligizi" class="form-select" required>
                            <option value="">Pilih Ahli Gizi</option>
                            @foreach($dataAhliGizi as $ahligizi)
                                <option value="{{ $ahligizi->id_ahligizi }}">{{ $ahligizi->nama }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="id_pasien" >Nama Pasien:</label></td>
                    <td>
                        <select name="id_pasien" id="id_pasien" class="form-select" required onchange="changeNoRM()">
                            <option value="">Pilih Nama Pasien</option>
                            @foreach($dataPasien as $pasien)
                                <option value="{{ $pasien->id }}" data-norm="{{ $pasien->no_rm }}">{{ $pasien->nama }}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <td><label for="noRM">No. RM:</label></td>
                    <td>
                        <select name="noRM" id="noRM" class="form-select" required>
                            <option value="">Pilih No. RM</option>
                            @foreach($dataPasien as $pasien)
                                <option value="{{ $pasien->no_rm }}">{{ $pasien->no_rm }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

            </tbody>
        </table>

        <h3>ASUHAN GIZI</h3>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">
                            1. Risiko malnutrisi berdasarkan hasil<br>skrining gizi oleh perawat, kondisi<br> pasien termasuk kategori :
                        </th>
                        <td>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="ringan" name="risiko" value="Risiko Ringan" value="Risiko Ringan">
                                <label class="form-check-label" for="ringan">Risiko ringan</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="sedang" name="risiko" value="Risiko sedang" value="Risiko Sedang">
                                <label class="form-check-label" for="sedang">Risiko sedang</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="tinggi" name="risiko" value="Risiko Tinggi" value="Risiko Tinggi">
                                <label class="form-check-label" for="tinggi">Risiko tinggi</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">2. Pasien mempunyai kondisi khusus:</th>
                        <td>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="ya" name="difabel" value="Ya">
                                <label class="form-check-label" for="ya">Ya</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="tidak" name="difabel" value="Tidak">
                                <label class="form-check-label" for="tidak">Tidak</label>
                            </div>
                        </td>
                        @error('difabel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </tr>
                    <tr>
                        <th scope="col">3. Alergi makanan:</th>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="telur" name="alergi[]" value="Telur">
                                <label class="form-check-label" for="telur">Telur</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="udang" name="alergi[]" value="Udang">
                                <label class="form-check-label" for="udang">Udang</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="susu" name="alergi[]"
                                    value="Susu sapi & produk olahannya">
                                <label class="form-check-label" for="susu">Susu sapi & produk olahannya</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="ikan" name="alergi[]" value="Ikan">
                                <label class="form-check-label" for="ikan">Ikan</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="kacang" name="alergi[]" value="Kacang kedelai / tanah">
                                <label class="form-check-label" for="kacang">Kacang kedelai/tanah</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="hazelnutAlmond" name="alergi[]" value="Hazelnut/almond">
                                <label class="form-check-label" for="hazelnutAlmond">Hazelnut/almond</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="glutenGandum" name="alergi[]" value="Gluten/gandum">
                                <label class="form-check-label" for="glutenGandum">Gluten/gandum</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="alergi[]" value="lainnya" id="alergiLainnyaCheckbox" onclick="toggleAlergiLainnya()">
                                <label class="form-check-label" for="alergiLainnyaCheckbox">Lainnya</label>
                                <div id="alergiLainnyaField" style="display: none;">
                                    <label for="alergiLainnyaInput">Sebutkan :</label>
                                    <input type="text" class="form-control" name="alergi_lainnya" id="alergiLainnyaInput">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">4. Preskripsi diet:</th>
                        <td>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="dietBiasa" name="diet" value="biasa" onclick="toggleDietField()">
                                <label class="form-check-label" for="dietBiasa">Diet Biasa</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="dietKhusus" class="form-check-input" name="diet" value="khusus" onclick="toggleDietField()">
                                <label for="dietKhusus" class="form-check-label">Diet Khusus</label>
                                <div id="dietKhususField" style="display: none;">
                                    <label for="dietKhususInput">Sebutkan :</label>
                                    <input type="text" class="form-control" name="dietKhusus" id="dietKhususInput">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">5. Tindak lanjut:</th>
                        <td>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="belumPerlu" name="tindak_lanjut" value="Belum Perlu">
                                <label class="form-check-label" for="belumPerlu">Belum perlu Asuhan Gizi (Skrining gizi ulang 1 minggu
                                    kemudian)</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="Perlu" name="tindak_lanjut" value="Perlu">
                                <label class="form-check-label" for="Perlu">Perlu Asuhan Gizi Dilanjutkan ke point asesmen gizi
                                    lanjutan</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="asuhan_gizi_lanjutan" class="hidden">
            <h3>ASUHAN GIZI LANJUTAN</h3>
            <div class="row">
                <p class="font-weight-bold">6. Antropometri:</p>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Berat Badan:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="berat_badan" placeholder="Berat Badan">
                            <span class="input-group-text">kg</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>LILA:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="lila" placeholder="Lingkar Lengan Atas">
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tinggi Lutut:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="tinggilutut" placeholder="Tinggi Lutut">
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tinggi Badan:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="tinggi_badan" placeholder="Tinggi Badan">
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>IMT:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="imt" placeholder="Indeks Massa Tubuh">
                            <span class="input-group-text">kg/m2</span>
                        </div>
                    </div>
                </div>

                <p class="font-weight-bold mt-3">7. Biokimia:</p>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hb:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="hb">
                            <span class="input-group-text">g/dl</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>GDS:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="gds">
                            <span class="input-group-text">mg/dl</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kolesterol:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="kolesterol">
                            <span class="input-group-text">mg/dl</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Trigliserit:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="trigliserit">
                            <span class="input-group-text">mg/dl</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>SGOT:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sgot">
                            <span class="input-group-text">mg/dl</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>SGPT:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sgpt">
                            <span class="input-group-text">mg/dl</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Albumin:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="albumin">
                            <span class="input-group-text">mg/dl</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ureum:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="ureum">
                            <span class="input-group-text">mg/dl</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kreatinin:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="kreatinin">
                            <span class="input-group-text">mg/dl</span>
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
                                        <input type="checkbox" class="form-check-input" name="klinis[]" value="Atropi otot lengan">
                                        <label class="form-check-label">Atropi otot lengan</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="klinis[]" value="Odema">
                                        <label class="form-check-label">Odema</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="klinis[]"
                                            value="Hilang lemak subkutan">
                                        <label class="form-check-label">Hilang lemak subkutan</label>
                                    </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    Gangguan Gastrointestinal:
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="gangguan_gastrointestinal[]"
                                            value="Anoreksia">
                                        <label class="form-check-label">Anoreksia</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="gangguan_gastrointestinal[]"
                                            value="Mual">
                                        <label class="form-check-label">Mual</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="gangguan_gastrointestinal[]"
                                            value="Muntah">
                                        <label class="form-check-label">Muntah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="gangguan_gastrointestinal[]"
                                            value="Kesulitan menelan">
                                        <label class="form-check-label">Kesulitan menelan</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="gangguan_gastrointestinal[]"
                                            value="Kesulitan mengunyah">
                                        <label class="form-check-label">Kesulitan mengunyah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="gangguan_gastrointestinal[]"
                                            value="Diare">
                                        <label class="form-check-label">Diare</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="gangguan_gastrointestinal[]"
                                            value="Gangguan gigi geligi">
                                        <label class="form-check-label">Gangguan gigi geligi</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="gangguan_gastrointestinal[]"
                                            value="Konstipasi">
                                        <label class="form-check-label">Konstipasi</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kondisi</td>
                                <td>
                                    <label>Tekanan Darah:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="tekanan_darah">
                                            <span class="input-group-text"> / mmHg</span>
                                        </div>
                                </td>
                                <td>
                                    <label>Respirasi:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="respirasi">
                                        <span class="input-group-text">x / menit</span>
                                    </div>
                                </td>
                                <td>
                                    <label>Nadi:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nadi">
                                            <span class="input-group-text">x / menit</span>
                                        </div>
                                </td>
                                <td>
                                    <label>Suhu:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="suhu">
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
                                        <input type="text" class="form-control" name="pola_makan">
                                    </div>

                                    <label>Kebiasaan Minum:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="kebiasaan_minum">
                                    </div>

                                    <label>Konsumsi Makanan Selingan:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="makanan_selingan">
                                    </div>

                                    <label>Diit yang sudah dijalankan SMRS:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="diit_smrs">
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
                                        <input type="text" class="form-control" name="btm"  placeholder="Isi Tidak atau Ya:(Sebutkan)">
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
                                        <input type="text" class="form-control" name="suplemen"  placeholder="Isi Tidak atau Ya:(Sebutkan)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    Aktivitas fisik:
                                </td>
                                <td>
                                    <label><input type="radio" name="aktivitas_fisik" value="Bed Rest">Bed Rest</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="aktivitas_fisik" value="Ringan">Ringan</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="aktivitas_fisik" value="Sedang">Sedang</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="aktivitas_fisik" value="Berat">Berat</label>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    Konseling gizi:
                                </td>
                                <td>
                                    
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="konseling_gizi"  placeholder="Isi Belum atau Pernah:(Sebutkan)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>10. Riwayat Personal:</th>
                                <td colspan="6">
                                    <div class="form-group">
                                        <textarea id="riwayat_personal" name="riwayat_personal" rows="8" class="form-control">Mobilitas: &#13;&#10;Keterbatasan Fisik: &#13;&#10;Riwayat Penyakit Personal: &#13;&#10;Riwayat Penyakit Keluarga: </textarea>
                                    </div>
                                </td>
                            </tr>
                            <!-- diagnosis gizi -->
                            <tr>
                                <th>11. Diagnosis Gizi</th>
                                <th colspan="6">
                                    <div class="form-group">
                                        <textarea id="diagnosis_gizi" name="diagnosis_gizi" rows="8" class="form-control" placeholder="Masukkan Diagnosis Gizi"></textarea>
                                    </div>
                                </th>
                            </tr>
                            <!-- intervensi gizi -->
                            <tr>
                                <th>12. Intervensi Gizi:</th>
                                <td colspan="6">
                                    <div class="form-group">
                                        <textarea id="intervensi_gizi" name="intervensi_gizi" rows="8" class="form-control">Tujuan Diet: &#13;&#10;Preskripsi Diet: &#13;&#10;Kebutuhan Zat Gizi: </textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>13. Rencana Monitoring<br>dan Evaluasi Gizi:</th>
                                <td colspan="6">
                                    <div class="form-group">
                                        <textarea id="rencana_monitoring" name="rencana_monitoring" rows="8" class="form-control">Parameter yang dimonitor: &#13;&#10;Evaluasi: &#13;&#10;Target akhir intervensi: </textarea>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                        
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script>
    $(document).ready(function () {
        $('input[name="tindak_lanjut"]').change(function () {
            if ($(this).val() === 'Perlu') {
                $('#asuhan_gizi_lanjutan').removeClass('hidden');
            } else {
                $('#asuhan_gizi_lanjutan').addClass('hidden');
            }
        });
    });
</script> -->

<!-- <script>
    $(document).ready(function () {
    // Tangani perubahan pada seluruh formulir
        $('input[name="tindak_lanjut"]').change(function () {
            if ($(this).val() === 'Perlu') {
                $('#asuhan_gizi_lanjutan').removeClass('hidden');
                // Tambahkan kode lain yang diperlukan untuk menangani formulir saat Perlu
            } else {
                $('#asuhan_gizi_lanjutan').addClass('hidden');
                // Tambahkan kode lain yang diperlukan untuk menangani formulir saat Belum Perlu
            }
        });

        // Tangani perubahan pada seluruh formulir saat halaman dimuat
        $('input[name="tindak_lanjut"]').trigger('change');
    });

</script> -->

<script>
        $(document).ready(function () {
        $('input[type="radio"][name="tindak_lanjut"]').change(function () {
            if ($(this).val() === "Perlu") {
                $('#asuhan_gizi_lanjutan').removeClass('hidden');
                $('#asuhan_gizi_lanjutan input[type="checkbox"]').attr('required', 'required');
            } else {
                $('#asuhan_gizi_lanjutan').addClass('hidden');
                $('#asuhan_gizi_lanjutan input[type="checkbox"]').removeAttr('required');
            }
        });

        function handleBelumPerluAsuhanGizi() {
            $('#asuhan_gizi_lanjutan').addClass('hidden');
            $('#asuhan_gizi_lanjutan input[type="checkbox"]').removeAttr('required');
        }

        handleBelumPerluAsuhanGizi();

        $('#belumPerlu').change(function () {
            handleBelumPerluAsuhanGizi();
        });

        $('#Perlu').change(function () {
            if ($(this).is(':checked')) {
                $('#asuhan_gizi_lanjutan').removeClass('hidden');
                $('#asuhan_gizi_lanjutan input[type="checkbox"]').attr('required', 'required');
            }
        });

        $('#asuhan_gizi_lanjutan').find('input[type="checkbox"]').on('change', function () {
            let checkboxes = $('#asuhan_gizi_lanjutan').find('input[type="checkbox"]');
            let checked = false;

            checkboxes.each(function () {
                if ($(this).is(':checked')) {
                    checked = true;
                    return false;
                }
            });

            if (checked) {
                checkboxes.removeAttr('required');
            } else {
                checkboxes.attr('required', 'required');
            }
        });
    });
</script>

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
<!-- <script>
    function changeNoRM() {
        var pasienSelect = document.getElementById('id_pasien');
        var noRMSelect = document.getElementById('noRM');
        var selectedPasien = pasienSelect.options[pasienSelect.selectedIndex];
        
        // Set nilai id_pasien dan noRM pada form
        document.getElementsByName('id_pasien')[0].value = selectedPasien.value;
        document.getElementById('noRM').value = selectedPasien.getAttribute('data-norm');
    }
</script> -->


<script>
    $(document).ready(function() {
        $('#nama').select2({
            placeholder: 'Pilih Nama',
            allowClear: true,
            data: [
                @foreach($dataPasien as $pasien)
                    { id: '{{ $pasien->id }}', text: '{{ $pasien->nama }}' },
                @endforeach
            ]
        });
    });
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
    function toggleAlergiLainnya() {
        var alergiLainnyaField = document.getElementById('alergiLainnyaField');

        if (document.getElementById('alergiLainnyaCheckbox').checked) {
            alergiLainnyaField.style.display = 'block';
        } else {
            alergiLainnyaField.style.display = 'none';
            document.getElementById('alergiLainnyaInput').value = '';
        }
    }
</script>

<script>
        function toggleBtmField(value) {
            if (value === 'ya') {
                document.getElementById('btmYaField').style.display = 'block';
            } else {
                document.getElementById('btmYaField').style.display = 'none';
            }
        }

</script>

<script>
        function toggleSuplemenField() {
            var suplemenYaField = document.getElementById('suplemenYaField');
            var suplemenYaInput = document.getElementById('suplemenYaInput');

            if (document.getElementById('suplemenTidak').checked) {
                suplemenYaField.style.display = 'none';
                suplemenYaInput.value = '';
            } else {
                suplemenYaField.style.display = 'block';
            }
        }
</script>

<script>
        function toggleKonselingField() {
            var konseling_giziPernahField = document.getElementById('konseling_giziPernahField');
            var konseling_giziPernahInput = document.getElementById('konseling_giziPernahInput');

            if (document.getElementById('konselingBelum').checked) {
                konseling_giziPernahField.style.display = 'none';
                konseling_giziPernahInput.value = '';
            } else {
                konseling_giziPernahField.style.display = 'block';
            }
        }
</script>

@endsection
@push('ahligiziHome')

@endpush
