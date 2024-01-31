<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Screening;
use App\Models\Distributor;
use App\Models\Kitchen;
use App\Models\Antropometri;

class DistributorController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function distributorHome()
    {
        $pasienCount = Pasien::count();
        $screeningCount = Screening::count();  // Corrected: Use Screening model instead of Pasien model
        $prosesCount = Screening::where('statusPengantaran', 0)->where('statusMakanan', 1)->count();
        $selesaiCount = Screening::where('statusPengantaran', 1)->where('statusMakanan', 1)->count();
        return view('distributor.index', compact('pasienCount', 'screeningCount','prosesCount','selesaiCount')); // Pass both variables
    }

    public function distributorTables()
    {
        return view('distributor.tables');
    }
    
    public function distributorPengiriman()
    {
        return view('distributor.pengiriman');
    }
    
    public function pasienData()
    {
        $dataPasien = Pasien::all();
        return view('pengantaran.index', compact('dataPasien'));
    }

    public function detailPasien($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pengantaran.detail', compact('pasien'));
    }

    public function dataScreening()
    {
        $dataScreening = Screening::all();
        return view('distributor.screening', compact('dataScreening'));
    }

    public function detailScreening($id_screening)
    {
        $screening = Screening::where('id_screening', $id_screening)->first();
        
        if ($screening === null) {
        abort(404, 'Data screening tidak ditemukan');
        }
        
        return view('distributor.screeningDetail', compact('screening'));
    }

    public function makananSelesai()
    {
        $makananSelesai = Screening::all();
        return view('distributor.makanSelesai', compact('makananSelesai'));
    }

    public function makananProses()
    {
        $makananProses = Screening::all();
        return view('distributor.makananProses', compact('makananProses'));
    }

    public function detailMakananProses($id)
    {
        $makananProsesdetail = Screening::where('id_screening', $id)->firstOrFail();
        return view('distributor.makananProsesDetail', compact('makananProsesdetail'));
    }
    
    public function updateMakananProses(Request $request)
    {
        Screening::whereNull('id_screening')
            ->update([
                'statusPengantaran' => $request->status
            ]);
            Screening::where('id_screening', $request->id)
            ->update([
                'statusPengantaran' => $request->status
            ]);
        return redirect()->route('distributor.makananProses');
    }

    public function detailMakananSelesai($id)
    {
        $makananSelesaidetail = Screening::where('id_screening', $id)->firstOrFail();
        return view('distributor.makanSelesaiDetail', compact('makananSelesaidetail'));
    }

    public function updateMakananSelesai(Request $request)
    {
        Screening::whereNull('id_screening')
            ->update([
                'statusPengantaran' => $request->status
            ]);
            Screening::where('id_screening', $request->id)
            ->update([
                'statusPengantaran' => $request->status
            ]);
        return redirect()->route('distributor.makananSelesai');
    }

}
