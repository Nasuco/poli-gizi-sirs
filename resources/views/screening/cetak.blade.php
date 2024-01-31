<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Skrining {{ $screening->pasien->nama }}</title>

    <style type="text/css">
        /* General styling */
        body {
            font-family: 'Open Sans', sans-serif; /* Use a modern, clean font */
            font-size: 14px;
            color: #333;
            line-height: 1.6;
            margin: 20px;
        }

        header,
        footer {
            padding: 15px;
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
        }

        header h1 {
            margin: 0;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .invoice-details {
            margin-top: 10px;
        }

        .invoice-details h3 {
            margin-bottom: 10px;
        }

        .invoice-total {
            font-weight: bold;
        }

        .footer-text {
            font-size: 12px;
            color: #999;
        }
        .difabel-info {
            color: #007bff;
            font-weight: bold;
        }
        .section-break {
            margin-top: 10px;
            border-bottom: 1px solid #ddd;
        }

        .text-center {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }

        .link {
            color: #007bff;
            text-decoration: none;
        }
</style>


    </style>

</head>
<body>

<header style="font-family: 'Open Sans', sans-serif; font-size: 14px; padding: 15px; background-color: #f5f5f5; border-bottom: 1px solid #ddd;">
    <img src="/var/www/html/SIRS-Project/public/assets/img/logo-pku.png" alt="Logo" width="100" style="float: left; margin-right: 15px;">
    <div style="overflow: hidden;">
        <h2 style="margin: 0; font-weight: bold;">RS PKU Muhammadiyah Gamping</h2>
        <p style="margin: 5px 0;">JL. Wates Km. 5,5 Ambarketawang, Gamping, Sleman, Yogyakarta – 55294</p>
        <a class="link" href="https://pkugamping.com" style="text-decoration: none; color: #007bff;">pkugamping.com</a>
    </div>
</header>

<section class="invoice-details">
    <h2>Hasil Skrining {{ $screening->pasien->no_rm }}</h2>

    <table class="invoice-details">
        <thead>
            <tr>
                <th class="text-left">Informasi Pasien</th>
                <th class="text-right">Dokter</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>Tanggal Periksa</td>
                            <td>{{ $screening->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>{{ $screening->pasien->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{ $screening->pasien->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td>Bangsal</td>
                            <td>{{ $screening->pasien->bangsal }}</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td class="text-right" >{{ $screening->ahligizi->nama }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

</section>

<section class="section-break">
    <div class="section-header">
        <h3 class="text-center">Asuhan Gizi</h3>
    </div>

    <table class="table-centered">
        <thead>
            <tr>
                <th>Risiko</th>
                <th>Difabel</th>
                <th>Alergi Makanan</th>
                <th>Preskripsi Diet</th>
                <th>Tindak Lanjut</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $screening->risiko }}</td>
                <td>
                    @if($screening->difabel == 1)
                        Ya
                    @else
                        Tidak
                    @endif
                </td>
                <td>{{ $screening->alergi_makanan }}</td>
                <td>{{ $screening->preskripsi_diet }}</td>
                <td>{{ $screening->tindak_lanjut }}</td>
            </tr>
        </tbody>            
    </table>
    @if ($screening->tindak_lanjut === 'Perlu')
    <div class="section-header">
        <h3 class="text-center">Asuhan Gizi Lanjutan</h3>
    </div>
    <table id="asuhan_gizi_lanjutan" class="table table-bordered table-centered">
        <thead>
            <tr>
                <th colspan="5" class="text-center">Antropometri</th>
            </tr>
            <tr>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
                <th>LILA</th>
                <th>Tinggi Lutut</th>
                <th>IMT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $screening->antropometri->berat_badan }} kg</td>
                <td>{{ $screening->antropometri->tinggi_badan }} cm</td>
                <td>{{ $screening->antropometri->lila }} cm</td>
                <td>{{ $screening->antropometri->tinggilutut }} cm</td>
                <td>{{ $screening->antropometri->imt }} kg/m2</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table id="asuhan_gizi_lanjutan" class="table table-bordered table-centered">
        <thead>
            <tr>
                <th colspan="9" class="text-center">Biokimia</th>
            </tr>
            <tr>
                <th>HB</th>
                <th>GDS</th>
                <th>Kolesterol</th>
                <th>Trigliserit</th>
                <th>SGOT</th>
                <th>SGPT</th>
                <th>Albumin</th>
                <th>Ureum</th>
                <th>Kreatinin</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->hb }} g/dL</p>
                                                    @endif</td>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->gds }} mm3</p>
                                                    @endif</td>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->kolesterol }} mg/dL</p>
                                                    @endif</td>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->trigliserit }} mg/dL</p>
                                                    @endif</td>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->sgot }} mg/dL</p>
                                                    @endif</td>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->sgpt }} mg/dL</p>
                                                    @endif</td>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->albumin }} mg/dL</p>
                                                    @endif</td>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->ureum }} mg/dL</p>
                                                    @endif</td>
                <td>@if($screening->biokimia == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Biokimia tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->biokimia->kreatinin }} mg/dL</p>
                                                    @endif</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table id="asuhan_gizi_lanjutan" class="table table-bordered table-centered">
        <thead>
            <tr>
                <th colspan="6" class="text-center">Fisik</th>
            </tr>
            <tr>
                <th>Klinis</th>
                <th>Gangguan Gastrointestinal</th>
                <th>Tekanan Darah</th>
                <th>Respirasi</th>
                <th>Nadi</th>
                <th>Suhu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>@if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Klinis tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->klinis }}</p>
                                                    @endif</td>
                <td>@if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Gangguan Gastrointestinal tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->gangguan_gastrointestinal }}</p>
                                                    @endif</td>
                <td>@if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->tekanan_darah }}/ mmHg</p>
                                                    @endif</td>
                <td>@if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->respirasi }}/ menit</p>
                                                    @endif</td>
                <td>@if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->nadi }}/ menit</p>
                                                    @endif</td>
                <td>@if($screening->fisik == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Fisik tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->fisik->suhu }}/ °C</p>
                                                    @endif</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table id="asuhan_gizi_lanjutan" class="table table-bordered table-centered">
        <thead>
            <tr>
                <th colspan="8" class="text-center">Riwayat Gizi</th>
            </tr>
            <tr>
                <th>Pola Makan</th>
                <th>Kebiasaan Minum</th>
                <th>Konsumsi Makanan Selingan</th>
                <th>Diit yang sudah dijalankan SMRS</th>
                <th>Penggunaan BTM</th>
                <th>Penggunaan suplemen</th>
                <th>Aktifitas Fisik</th>
                <th>Konseling Gizi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>@if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Riwayat Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->pola_makan }}</p>
                                                    @endif</td>
                <td>@if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Riwayat Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->kebiasaan_minum }}</p>
                                                    @endif</td>
                <td>@if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Riwayat Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->makanan_selingan }}</p>
                                                    @endif</td>
                <td>@if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Riwayat Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->diit_smrs }}</p>
                                                    @endif</td>
                <td>@if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Riwayat Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->btm }}</p>
                                                    @endif</td>
                <td>@if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Riwayat Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->suplemen }}</p>
                                                    @endif</td>
                <td>@if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Riwayat Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->aktivitas_fisik }}</p>
                                                    @endif</td>
                <td>@if($screening->gizi == null)
                                                    <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Riwayat Gizi tidak diisi</p>
                                                    @else
                                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->gizi->konseling_gizi }}</p>
                                                    @endif</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table id="asuhan_gizi_lanjutan" class="table table-bordered table-centered">
        <thead>
            <tr>
                <th>Riwayat Personal</th>
                <th>Diagnosis Gizi</th>
                <th>Intervensi Gizi</th>
                <th>Rencana Monitoring dan Evaluasi Gizi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>@if($screening->riwayat_personal == null)
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
                                                        @endif</td>
                <td>@if($screening->diagnosis_gizi == null)
                                                            <p class="text-xs font-weight-bold opacity-7 mb-0">Diagnosis Gizi tidak diisi</p>
                                                        @else
                                                            <p class="text-xs font-weight-bold mb-0">{{ $screening->diagnosis_gizi }}</p>
                                                        @endif</td>
                <td>@if($screening->intervensi_gizi == null)
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
                                                        @endif</td>
                <td>@if($screening->rencana_monitoring == null)
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
                                                        @endif</td>
            </tr>
        </tbody>
    </table>

    @endif
<br>
    <section class="section-break">
        <table class="table-centered">
            <thead>
                <tr>
                    <th class="text-right">{{ $screening->created_at }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-right">
                        <br>
                        <img src="/var/www/html/SIRS-Project/public/assets/img/ttd.png" alt="Signature Image" style="max-width: 200px;">
                        <p class="text-right">{{ $screening->ahligizi->nama }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</section>


</body>
</html>