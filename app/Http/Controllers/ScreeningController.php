<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Screening;
use App\Models\AhliGizi;
use App\Models\Antropometri;
use App\Models\Biokimia;
use App\Models\Gizi;
use PDF;
use Illuminate\Support\Str;
use App\Models\Fisik;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ScreeningController extends Controller
{
    public function screeningData()
    {
        $dataScreening = Screening::paginate(10);
        return view('screening.index', compact('dataScreening'));
    }

    public function detailScreening($id)
    {
        $screening = Screening::findOrFail($id);
        return view('screening.show', compact('screening'));
    }

    public function searchScreening(Request $request)
    {
        $screening = $request->input('screening');

        $dataScreening = Screening::whereHas('pasien', function ($query) use ($screening) {
            $query->where('nama', 'like', "%$screening%");
        })->paginate(10); // Sesuaikan dengan jumlah item per halaman yang diinginkan

        return view('screening.search', compact('dataScreening'));
    }



    public function create()
    {
        $dataPasien = Pasien::all();
        $dataAhliGizi = AhliGizi::all();

        return view('screening.create', compact('dataPasien', 'dataAhliGizi'));
    }
    public function store(Request $request)
    {
        // dd ($request->all());
        try {
            $validatedData = $request->validate([
                'risiko' => 'required|in:Risiko Ringan,Risiko sedang,Risiko Tinggi',
                'id_pasien' => 'required|exists:pasien,id',
                'id_ahligizi' => 'required|exists:ahli_gizi,id_ahligizi',
                'difabel' => 'required|in:Ya,Tidak',
                'alergi' => 'array',
                'alergi.*' => 'nullable|string',
                'alergi_lainnya' => 'nullable|string',
                'diet' => 'in:biasa,khusus',
                'dietKhusus' => 'nullable|required_if:diet,khusus|string',  
                'tindak_lanjut' => 'required|in:Belum Perlu,Perlu',
                'riwayat_personal' => 'nullable|string',
                'diagnosis_gizi' => 'nullable|string',
                'intervensi_gizi' => 'nullable|string',
                'rencana_monitoring' => 'nullable|string',

                'berat_badan' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'tinggi_badan' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'lila' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'imt' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'tinggilutut' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',

                'hb' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'gds' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'kolesterol' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'trigliserit' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'sgot' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'sgpt' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'albumin' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'ureum' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'kreatinin' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',

                'klinis' => 'array|required_if:tindak_lanjut,Perlu',
                'klinis.*' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'gangguan_gastrointestinal' => 'array|required_if:tindak_lanjut,Perlu',
                'gangguan_gastrointestinal.*' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'tekanan_darah' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'respirasi' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'nadi' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'suhu' => 'nullable|string|required_if:tindak_lanjut,Perlu',

                'pola_makan' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'kebiasaan_minum' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'makanan_selingan' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'diit_smrs' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'btm' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'suplemen' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                // 'btm' => 'nullable|in:tidak,ya|required_if:tindak_lanjut,Perlu',
                // 'btmYa' => 'nullable|required_if:btm,ya|string|required_if:tindak_lanjut,Perlu',
                // 'suplemen' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                // 'suplemenYa' => 'nullable|required_if:suplemen,ya|string|required_if:tindak_lanjut,Perlu',
                'aktivitas_fisik' => 'nullable|in:Bed Rest,Ringan,Sedang,Berat|required_if:tindak_lanjut,Perlu',
                'konseling_gizi' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                // 'konseling_gizi' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                // 'konseling_giziPernah' => 'nullable|required_if:konseling_gizi,pernah|string|required_if:tindak_lanjut,Perlu',
            ], [
                'difabel.required' => 'Bidang difabel harus diisi.'
            ]);
    
            // dd($validatedData);

            $screening = new Screening($validatedData);
            $screening->risiko = $validatedData['risiko'];
            $screening->id_pasien = $request->input('id_pasien');
            $screening->id_ahligizi = $validatedData['id_ahligizi'];
            $screening->difabel = $validatedData['difabel'] == 'Ya' ? true : false;
    
            $alergiMakanan = implode(', ', $validatedData['alergi']);
    
            if (!empty($validatedData['alergi_lainnya'])) {
                $alergiMakanan .= (!empty($alergiMakanan) ? ': ' : '') . $validatedData['alergi_lainnya'];
            }
    
            $screening->alergi_makanan = $alergiMakanan;
    
            if ($validatedData['diet'] === 'khusus') {
                $screening->preskripsi_diet = $validatedData['dietKhusus'];
            } else {
                $screening->preskripsi_diet = 'Diet biasa';
            }
    
            $screening->tindak_lanjut = $validatedData['tindak_lanjut'];
    
            if ($validatedData['tindak_lanjut'] === 'Perlu') {
                $antropometriData = [
                    'berat_badan' => $request->input('berat_badan'),
                    'tinggi_badan' => $request->input('tinggi_badan'),
                    'lila' => $request->input('lila'),
                    'imt' => $request->input('imt'),
                    'tinggilutut' => $request->input('tinggilutut'),
                    'id_pasien' => $screening->id_pasien,
                ];
                $antropometri = Antropometri::create($antropometriData);
                $screening->id_antropometri = $antropometri->id;
    
                // $screening->id_antropometri = $antropometri->id;
        
                // $antropometri = new Antropometri($antropometriData);
                // $antropometri->save();

                $biokimiaData = [
                    'hb' => $request->input('hb'),
                    'gds' => $request->input('gds'),
                    'kolesterol' => $request->input('kolesterol'),
                    'trigliserit' => $request->input('trigliserit'),
                    'sgot' => $request->input('sgot'),
                    'sgpt' => $request->input('sgpt'),
                    'albumin' => $request->input('albumin'),
                    'ureum' => $request->input('ureum'),
                    'kreatinin' => $request->input('kreatinin'),
                    'id_pasien' => $screening->id_pasien,
                ];
                $biokimia = Biokimia::create($biokimiaData);
                $screening->id_biokimia = $biokimia->id;

                // $biokimia = new Biokimia($biokimiaData);
                // $biokimia->save();

                $fisikData = [
                    'klinis' => implode(', ', $request->input('klinis')),
                    'gangguan_gastrointestinal' => implode(', ', $request->input('gangguan_gastrointestinal')),
                    'tekanan_darah' => $request->input('tekanan_darah'),
                    'respirasi' => $request->input('respirasi'),
                    'nadi' => $request->input('nadi'),
                    'suhu' => $request->input('suhu'),
                    'id_pasien' => $screening->id_pasien,
                ];
                $fisik = Fisik::create($fisikData);
                $screening->id_fisik = $fisik->id;

                $giziData = [
                    'pola_makan' => $request->input('pola_makan'),
                    'kebiasaan_minum' => $request->input('kebiasaan_minum'),
                    'makanan_selingan' => $request->input('makanan_selingan'),
                    'diit_smrs' => $request->input('diit_smrs'),
                    'btm' => $request->input('btm'),
                    'suplemen' => $request->input('suplemen'),
                    'konseling_gizi' => $request->input('konseling_gizi'),
                    'id_pasien' => $screening->id_pasien,
                ];

                
                if ($request->input('aktivitas_fisik') === 'Bed Rest') {
                    $giziData['aktivitas_fisik'] = 'Bed Rest';
                } else {
                    $giziData['aktivitas_fisik'] = $request->input('aktivitas_fisik');
                }

                $gizi = Gizi::create($giziData);
                $screening->id_gizi = $gizi->id;

                // riwayat personal
                $screening->riwayat_personal = $request->input('riwayat_personal');

                // diagnosis gizi
                $screening->diagnosis_gizi = $request->input('diagnosis_gizi');

                // intervensi gizi
                $screening->intervensi_gizi = $request->input('intervensi_gizi');

                // rencana monitoring
                $screening->rencana_monitoring = $request->input('rencana_monitoring');

                // $fisik = new Fisik($fisikData);
                // $fisik->save();

                // // if ($request->input('btm') === 'ya') {
                // //     $giziData['btm'] = $request->input('btmYa');
                // // } else {
                // //     $giziData['btm'] = 'tidak';
                // // }

                // // if ($request->input('btm') === 'ya') {
                // //     $giziData['btm'] = 'ya';
                // // } else {
                // //     $giziData['btm'] = $request->input('btm');
                // // }
            

                // // // dd($giziData);
                
                // $gizi = new Gizi($giziData);
                // $gizi->save();

                // $screening->id_fisik = $fisik->id;
                // $screening->id_gizi = $gizi->id;
                // $screening->id_biokimia = $biokimia->id;
                // $screening->id_antropometri = $antropometri->id;
            }
    
            $screening->save();

            return redirect()->route('screening.detail', ['id' => $screening->id_screening])->with('success', 'Data berhasil disimpan');
        } catch (ValidationException $e) {
            $errorMessages = $e->validator->errors()->messages();
    
            return redirect()->back()->withErrors($errorMessages)->withInput();
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }

    }

    public function edit($id)
    {
        $screening = Screening::findOrFail($id);
        $dataPasien = Pasien::all();
        $dataAhliGizi = AhliGizi::all();

        $screening->alergi = explode(', ', $screening->alergi_makanan);

        if (Str::contains($screening->preskripsi_diet, 'Diet Khusus')) {
            // $screening->preskripsi_diet = 'Diet Khusus';
            $screening->dietKhusus = Str::after($screening->preskripsi_diet, ':');
        } else {
            $screening->preskripsi_diet = 'Diet Biasa';
        }

        if ($screening->fisik) {
            $screening->klinisValues = explode(', ', $screening->fisik->klinis);
            $screening->gangguanGastrointestinalValues = explode(', ', $screening->fisik->gangguan_gastrointestinal);
        } else {
            $screening->klinisValues = [];
            $screening->gangguanGastrointestinalValues = [];
        }
        return view('screening.edit', compact('screening', 'dataPasien', 'dataAhliGizi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'risiko' => 'nullable|in:Risiko Ringan,Risiko Sedang,Risiko Tinggi',
                'id_pasien' => 'nullable|exists:pasien,id',
                'id_ahligizi' => 'nullable|exists:ahli_gizi,id_ahligizi',
                'difabel' => 'nullable|in:Ya,Tidak',
                'alergi' => 'array',
                'alergi.*' => 'nullable|string',
                'alergi_lainnya' => 'nullable|string',
                'preskripsi_diet' => 'nullable|in:Diet Biasa,Diet Khusus',
                'dietKhusus' => 'nullable|required_if:preskripsi_diet,Diet Khusus|string',
                'tindak_lanjut' => 'nullable|in:Belum Perlu,Perlu',
                'riwayat_personal' => 'nullable|string',
                'diagnosis_gizi' => 'nullable|string',
                'intervensi_gizi' => 'nullable|string',
                'rencana_monitoring' => 'nullable|string',

                'berat_badan' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'tinggi_badan' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'lila' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'imt' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'tinggilutut' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',

                'hb' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'gds' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'kolesterol' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'trigliserit' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'sgot' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'sgpt' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'albumin' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'ureum' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',
                'kreatinin' => 'nullable|numeric|required_if:tindak_lanjut,Perlu',

                'klinis' => 'array|required_if:tindak_lanjut,Perlu',
                'klinis.*' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'gangguan_gastrointestinal' => 'array|required_if:tindak_lanjut,Perlu',
                'gangguan_gastrointestinal.*' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'tekanan_darah' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'respirasi' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'nadi' => 'nullable|string|required_if:tindak_lanjut,Perlu',
                'suhu' => 'nullable|string|required_if:tindak_lanjut,Perlu',

                'pola_makan' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'kebiasaan_minum' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'makanan_selingan' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'diit_smrs' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'btm' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'suplemen' => 'nullable|required_if:tindak_lanjut,Perlu|string',
                'aktivitas_fisik' => 'nullable|in:Bed Rest,Ringan,Sedang,Berat|required_if:tindak_lanjut,Perlu',
                'konseling_gizi' => 'nullable|required_if:tindak_lanjut,Perlu|string',
            ]);

            $screening = Screening::findOrFail($id);
            $screening->risiko = $validatedData['risiko'];

            unset($validatedData['nama_pasien']);
            unset($validatedData['no_rm']);

            $id_pasien = $request->input('id_pasien');
            $pasien = Pasien::find($id_pasien);

            if ($request->has('id_pasien')) {
                $id_pasien = $request->input('id_pasien');
                $pasien = Pasien::find($id_pasien);
    
                if (!$pasien) {
                    return redirect()->back()->with('error', 'Pasien tidak ditemukan.');
                }
    
                $screening->id_pasien = $id_pasien;
            }
            $screening->id_ahligizi = $validatedData['id_ahligizi'];

            $screening->difabel = $validatedData['difabel'] == 'Ya' ? true : false;

            $alergiMakanan = implode(', ', $validatedData['alergi']);

            if (!empty($validatedData['alergi_lainnya'])) {
                $alergiMakanan .= (!empty($alergiMakanan) ? ': ' : '') . $validatedData['alergi_lainnya'];
            }
            
            $screening->alergi_makanan = $alergiMakanan;

            if ($validatedData['preskripsi_diet'] === 'Diet Khusus') {
                $screening->preskripsi_diet = 'Diet Khusus: ' . $validatedData['dietKhusus'];
            } else {
                $screening->preskripsi_diet = $validatedData['preskripsi_diet'];
            }

            $screening->tindak_lanjut = $validatedData['tindak_lanjut'];

            if ($validatedData['tindak_lanjut'] === 'Perlu') {
                $antropometriData = [
                    'berat_badan' => $validatedData['berat_badan'],
                    'lila' => $validatedData['lila'],
                    'tinggilutut' => $validatedData['tinggilutut'],
                    'tinggi_badan' => $validatedData['tinggi_badan'],
                    'imt' => $validatedData['imt'],
                ];
                
                if ($screening->antropometri) {
                    $screening->antropometri->update($antropometriData);
                } else {
                    $antropometriData['id_pasien'] = $screening->id_pasien;
                    $antropometri = Antropometri::create($antropometriData);

                    $screening->antropometri()->associate($antropometri);
                }

                $biokimiaData = [
                    'hb' => $validatedData['hb'],
                    'gds' => $validatedData['gds'],
                    'kolesterol' => $validatedData['kolesterol'],
                    'trigliserit' => $validatedData['trigliserit'],
                    'sgot' => $validatedData['sgot'],
                    'sgpt' => $validatedData['sgpt'],
                    'albumin' => $validatedData['albumin'],
                    'ureum' => $validatedData['ureum'],
                    'kreatinin' => $validatedData['kreatinin'],
                ];

                if ($screening->biokimia) {
                    $screening->biokimia->update($biokimiaData);
                } else {
                    $biokimiaData['id_pasien'] = $screening->id_pasien;
                    $biokimia = Biokimia::create($biokimiaData);

                    $screening->biokimia()->associate($biokimia);
                }

                $fisikData = [
                    'klinis' => implode(', ', $validatedData['klinis']),
                    'gangguan_gastrointestinal' => implode(', ', $validatedData['gangguan_gastrointestinal']),
                    'tekanan_darah' => $validatedData['tekanan_darah'],
                    'respirasi' => $validatedData['respirasi'],
                    'nadi' => $validatedData['nadi'],
                    'suhu' => $validatedData['suhu'],
                ];

                if ($screening->fisik) {
                    $screening->fisik->update($fisikData);
                } else {
                    $fisikData['id_pasien'] = $screening->id_pasien;
                    $fisik = Fisik::create($fisikData);

                    $screening->fisik()->associate($fisik);
                }

                $giziData = [
                    'pola_makan' => $validatedData['pola_makan'],
                    'kebiasaan_minum' => $validatedData['kebiasaan_minum'],
                    'makanan_selingan' => $validatedData['makanan_selingan'],
                    'diit_smrs' => $validatedData['diit_smrs'],
                    'btm' => $validatedData['btm'],
                    'suplemen' => $validatedData['suplemen'],
                    'konseling_gizi' => $validatedData['konseling_gizi'],
                ];

                if ($request->input('aktivitas_fisik') === 'Bed Rest') {
                    $giziData['aktivitas_fisik'] = 'Bed Rest';
                } else {
                    $giziData['aktivitas_fisik'] = $validatedData['aktivitas_fisik'];
                }

                if ($screening->gizi) {
                    $screening->gizi->update($giziData);
                } else {
                    $giziData['id_pasien'] = $screening->id_pasien;
                    $gizi = Gizi::create($giziData);

                    $screening->gizi()->associate($gizi);
                }

                $screening->riwayat_personal = $validatedData['riwayat_personal'];
                $screening->diagnosis_gizi = $validatedData['diagnosis_gizi'];
                $screening->intervensi_gizi = $validatedData['intervensi_gizi'];
                $screening->rencana_monitoring = $validatedData['rencana_monitoring'];
            } else {
                if ($screening->antropometri) {
                    $screening->antropometri->delete();
                }
                if ($screening->biokimia) {
                    $screening->biokimia->delete();
                }
                if ($screening->fisik) {
                    $screening->fisik->delete();
                }
                if ($screening->gizi) {
                    $screening->gizi->delete();
                }
                $screening->riwayat_personal = null;
                $screening->diagnosis_gizi = null;
                $screening->intervensi_gizi = null;
                $screening->rencana_monitoring = null;
            }

            $screening->save();

            return redirect()->route('screening.detail', ['id' => $screening->id_screening])->with('success', 'Data berhasil diperbarui');
        } catch (ValidationException $e) {
            $errorMessages = $e->validator->errors()->messages();
            return redirect()->back()->withErrors($errorMessages)->withInput();
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.');
        }
    }

    public function generatePDF($id)
{
    $screening = Screening::findOrFail($id);
    $pdf = PDF::loadView('screening.cetak', compact('screening'));

    $namaPasien = $screening->pasien->nama;

    $namaDokumen = "Hasil Skrining {$namaPasien}.pdf";

    return $pdf->stream($namaDokumen);
}

    public function destroy($id)
    {
        $screening = Screening::findOrFail($id);
        $screening->delete();

        return redirect()->route('screening.index')->with('delete', 'Skrining berhasil dihapus');
    }


}