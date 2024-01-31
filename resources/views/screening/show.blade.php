@extends('layouts.user_type.auth')
<style>
    .equal-height-cards {
        display: flex;
        flex-wrap: wrap;
    }

    .equal-height-card {
        flex: 1;
        margin-right: 15px;
        margin-bottom: 15px;
    }

    .equal-height-card:last-child {
        margin-right: 0;
    }

    @media (max-width: 767px) {
        .equal-height-card {
            flex: 0 0 100%;
            margin-right: 0;
            margin-bottom: 15px;
        }
    }
</style>
@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
            
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('/pdf/screening/' . $screening->id_screening) }}" class="btn btn-primary" target="_blank">Cetak PDF</a>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Detail Screening</h6>
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
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pasien</th>
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
                                        </tr>
                                        <!-- <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hasil Screening</th>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->hasil_screening}}</p>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <th class="text-uppercase   text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Waktu Screening</th>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->created_at }}</p>
                                            </td>
                                        </tr>

                                        <!-- <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rencana Monitoring</th>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->rencana_monitoring }}</p>
                                            </td>
                                        </tr> -->
                                        <!-- <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Diagnosis Medis</th>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->diagnosis_medis }}</p>
                                            </td>
                                        </tr> -->

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

                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="text-end mt-3">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Close</a>
                            </div> -->
                        </div>
                    @if ($screening->tindak_lanjut === 'Perlu')
                    </div>
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Detail Antropometri</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Antropometri BB</th>
                                                <td>
                                                    @if($screening->antropometri == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Antropometri tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->antropometri->berat_badan }} kg</p>
                                                    @endif
                                                </td>                                    
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Antropometri TB</th>
                                                <td>
                                                    @if($screening->antropometri == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Antropometri tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->antropometri->tinggi_badan }} cm</p>
                                                    @endif
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Antropometri LILA</th>
                                                <td>
                                                    @if($screening->antropometri == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Antropometri tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->antropometri->lila }} cm</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Antropometri IMT</th>
                                                <td>
                                                    @if($screening->antropometri == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Antropometri tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->antropometri->imt }} kg/m2</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Antropometri Tinggi Lutut</th>
                                                <td>
                                                    @if($screening->antropometri == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Antropometri tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->antropometri->tinggilutut }} cm</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    

                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Detail Biokimia</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia Hb</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->hb }} g/dL</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia GDS</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->gds }} mm3</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia Kolesterol</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->kolesterol }} mg/dL</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia Trigliserida</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->trigliserit }} mg/dL</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia SGOT</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->sgot }} mg/dL</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia SGPT</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->sgpt }} mg/dL</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia Albumin</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->albumin }} mg/dL</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia Ureum</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->ureum }} mg/dL</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biokimia Kreatinin</th>
                                                <td>
                                                    @if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->kreatinin }} mg/dL</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Detail Fisik</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Klinis</th>
                                                <td>
                                                    @if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Klinis tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->klinis }}</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gangguan Gastrointestinal</th>
                                                <td>
                                                    @if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Gangguan Gastrointestinal tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->gangguan_gastrointestinal }}</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tekanan Darah</th>
                                                <td>
                                                    @if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->tekanan_darah }}/ mmHg</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Respirasi</th>
                                                <td>
                                                    @if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->respirasi }}/ menit</p>
                                                    @endif
                                            </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nadi</th>
                                                <td>
                                                    @if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->nadi }}/ menit</p>
                                                    @endif
                                            </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Suhu</th>
                                                <td>
                                                    @if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->suhu }}/ °C</p>
                                                    @endif
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Riwayat Gizi</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <tbody>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pola Makan</th>
                                                <td>
                                                    @if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Pola Makan tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->pola_makan }}</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kebiasaan Minum</th>
                                                <td>
                                                    @if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Kebiasaan minum tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->kebiasaan_minum }}</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Konsumsi Makanan Selingan</th>
                                                <td>
                                                    @if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Makanan Selingan tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->makanan_selingan }}</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Diit yang sudah dijalankan SMRS</th>
                                                <td>
                                                    @if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Diit tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->diit_smrs}}</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penggunaan BTM</th>
                                                <td>
                                                    @if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Penggunaan BTM tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->btm}}</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penggunaan suplemen</th>
                                                <td>
                                                    @if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Penggunaan Suplemen tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->suplemen}}</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aktifitas Fisik</th>
                                                <td>
                                                    @if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Aktivitas Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->aktivitas_fisik}}</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Konseling Gizi</th>
                                                <td>
                                                    @if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Konseling Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->konseling_gizi}}</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="equal-height-cards">
                            <div class="card mb-4 equal-height-card">
                                <div class="card-header pb-0">
                                    <h6 class="">Riwayat Personal</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @if($screening->riwayat_personal == null)
                                                            <p class="text-xs font-weight-bold opacity-7 mb-0">Riwayat Penyakit tidak diisi</p>
                                                        @else
                                                            <?php   
                                                                $labels = ['Mobilitas: ', 'Keterbatasan Fisik: ', 'Riwayat Penyakit: ', 'Personal: ', 'Keluarga: '];

                                                                $riwayat_personal = $screening->riwayat_personal;

                                                                foreach ($labels as $label) {
                                                                    $riwayat_personal = str_replace($label . ' ', $label, $riwayat_personal);
                                                                }
                                                            ?>
                                                            <p class="text-xs font-weight-bold mb-0">{!! nl2br(e($riwayat_personal)) !!}</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 equal-height-card">
                                <div class="card-header pb-0">
                                    <h6 class="">Diagnosis Gizi</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @if($screening->diagnosis_gizi == null)
                                                            <p class="text-xs font-weight-bold opacity-7 mb-0">Diagnosis Gizi tidak diisi</p>
                                                        @else
                                                            <p class="text-xs font-weight-bold mb-0">{{ $screening->diagnosis_gizi }}</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 equal-height-card">
                                <div class="card-header pb-0">
                                    <h6 class="">Intervensi Gizi</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @if($screening->intervensi_gizi == null)
                                                            <p class="text-xs font-weight-bold opacity-7 mb-0">Intervensi Gizi tidak diisi</p>
                                                        @else
                                                            <?php
                                                                $labels = ['Tujuan Diet: ', 'Preskripsi Diet: ', 'Kebutuhan Zat Gizi: '];

                                                                $intervensi_gizi = $screening->intervensi_gizi;

                                                                foreach ($labels as $label) {
                                                                    $intervensi_gizi = str_replace($label . ' ', $label, $intervensi_gizi);
                                                                }
                                                            ?>
                                                            <p class="text-xs font-weight-bold mb-0">{!! nl2br(e($intervensi_gizi)) !!}</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 equal-height-card">
                                <div class="card-header pb-0">
                                    <h6 class="">Rencana Monitoring dan Evaluasi Gizi</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @if($screening->rencana_monitoring == null)
                                                            <p class="text-xs font-weight-bold opacity-7 mb-0">Rencana Monitoring tidak diisi</p>
                                                        @else
                                                            <?php
                                                                $labels = ['Parameter yang dimonitor: ', 'Evaluasi: ', 'Target akhir intervensi: '];

                                                                $rencana_monitoring = $screening->rencana_monitoring;

                                                                foreach ($labels as $label) {
                                                                    $rencana_monitoring = str_replace($label . ' ', $label, $rencana_monitoring);
                                                                }
                                                            ?>
                                                            <p class="text-xs font-weight-bold mb-0">{!! nl2br(e($rencana_monitoring)) !!}</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                                            
                                            
                        @endif
                        
                        <!-- Disini Ya bang Sekatnya :) -->
                </div>

            </div>
        </div>
    </main>     

<!-- @endsection
